<?php

namespace App\Http\Controllers;

use App\Models\Artigos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PainelAlunoController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $artigos = Artigos::where('user_id', $user->id)->get();
        return view('painel.aluno', compact('user', 'artigos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'conteudo' => 'required|string',
        ]);
        $artigo = Artigos::create([
            'titulo' => $request->titulo,
            'conteudo' => $request->conteudo,
            'user_id' => Auth::id(),
            'active' => true,
            'status' => 'rascunho',
        ]);
        return redirect()->route('painel.aluno')->with('success', 'Artigo criado!');
    }
}
