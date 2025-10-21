<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EbookController extends Controller
{
    public function store(Request $request)
    {
        $validate = $request->validate(
            [
                'title' => 'required|string|max:100',
                'file' => 'required|file|mimes:pdf'
            ]
        );
        $filePath = $request->file('file')->store('ebook', 'public');
        Ebook::create(
            [
                'title' => $validate['title'],
                'file_path' => $filePath,
            ]
        );
        return redirect()->route('dashboard.create')->with('success', 'book added');
    }
    public function show(Ebook $ebook)
    {
        return view('dashboard.read', [
            'ebook' => $ebook,
            'pdfUrl' => asset('storage/' . $ebook->file_path),
        ]);
    }
    public function destroy(Ebook $ebook)
    {
        Storage::disk('public')->delete($ebook->file_path);
        $ebook->delete();
        return redirect()->route('dashboard.index')->with('success', 'Ebook deleted.');
    }
}
