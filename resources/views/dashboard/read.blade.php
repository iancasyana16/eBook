<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $ebook->title }}</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
    <style>
        body {
            margin: 0;
            background-color: #f0f0f0;
            user-select: none;
            overflow: hidden;
        }

        canvas {
            display: block;
            margin: 0 auto;
            max-width: 100%;
        }

        #warningOverlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(255, 0, 0, 0.9);
            color: white;
            z-index: 9999;
            display: none;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 2rem;
            font-size: 1.5rem;
        }

        #watermark {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-30deg);
            font-size: 4rem;
            color: rgba(150, 150, 150, 0.2);
            pointer-events: none;
            z-index: 10;
            white-space: nowrap;
        }

        #pdfContainer {
            height: 100vh;
            overflow-y: auto;
            position: relative;
            z-index: 5;
        }
    </style>
</head>

<body oncontextmenu="return false;">
    <div id="warningOverlay">
        ⚠️ Anda tidak boleh meninggalkan tab ini saat membaca e-book!
    </div>

    <div id="watermark">{{ auth()->user()->email }}</div>

    <div id="pdfContainer"></div>

    <script>
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';

        const url = "{{ $pdfUrl }}"; // Contoh: /storage/ebooks/sample.pdf
        const container = document.getElementById('pdfContainer');
        let scale = 1.2;

        pdfjsLib.getDocument(url).promise.then(pdf => {
            for (let pageNum = 1; pageNum <= pdf.numPages; pageNum++) {
                pdf.getPage(pageNum).then(page => {
                    const viewport = page.getViewport({ scale });
                    const canvas = document.createElement('canvas');
                    const ctx = canvas.getContext('2d');

                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    const renderContext = {
                        canvasContext: ctx,
                        viewport: viewport
                    };

                    page.render(renderContext);
                    container.appendChild(canvas);
                });
            }
        });

        document.addEventListener('keydown', function (e) {
            const forbiddenKeys = ['s', 'u', 'p', 'a', 't'];
            if (
                (e.ctrlKey && forbiddenKeys.includes(e.key.toLowerCase())) || // Ctrl+S, Ctrl+U, Ctrl+P, Ctrl+A
                e.key === 'F12' ||
                (e.ctrlKey && e.shiftKey && ['i', 'j', 'c'].includes(e.key.toLowerCase()))
            ) {
                e.preventDefault();
                e.stopPropagation();
            }

            if (e.key === 'PrintScreen') {
                alert("⚠️ Screenshot tidak diperbolehkan!");
                e.preventDefault();
            }
        });

        document.addEventListener('dragstart', e => e.preventDefault());
        document.addEventListener('selectstart', e => e.preventDefault());

        let isFocusingBack = false;

        function showTabWarning() {
            if (isFocusingBack) return;
            isFocusingBack = true;

            alert("⚠️ Anda tidak diperbolehkan membuka tab baru atau berpindah tab saat membaca e-book!");
            window.focus();

            document.getElementById('warningOverlay').style.display = 'flex';
            setTimeout(() => {
                document.getElementById('warningOverlay').style.display = 'none';
                isFocusingBack = false;
            }, 5000);
        }

        document.addEventListener('visibilitychange', function () {
            if (document.hidden) {
                showTabWarning();
            }
        });

        window.addEventListener('blur', function () {
            showTabWarning();
        });
    </script>
</body>

</html>