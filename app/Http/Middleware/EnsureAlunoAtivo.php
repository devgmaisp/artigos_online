<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureAlunoAtivo
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        if (!$user || !$user->aluno || !$user->active) {
            abort(403, 'Acesso restrito a alunos ativos.');
        }
        return $next($request);
    }
}
