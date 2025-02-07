<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Resep;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $artikels = Artikel::latest()->get();
        $reseps = Resep::latest()->get();
        return view('dashboard', compact('artikels', 'reseps'));
    }
}
