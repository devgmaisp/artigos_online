<?php

namespace App\Http\Controllers\Public;


use App\Http\Controllers\Controller;
use App\Models\Artigos;
use Illuminate\Http\Request;

class ArtigoController extends Controller
{
    public function index()
    {
        $artigos = Artigos::where('active', true)
            ->orderByDesc('created_at')
            ->get();
        return view('artigos.index', compact('artigos'));
    }

    public function show($id)
    {
        $artigo = Artigos::where('active', true)->findOrFail($id);
        return view('artigos.show', compact('artigo'));
    }
}
