<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $ebooks = Ebook::all();
        return view('dashboard.index', compact('ebooks'));
    }
    public function create()
    {
        return view('dashboard.create');
    }
}
