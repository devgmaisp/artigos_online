<?php


use App\Models\Artigos;
use App\Models\User;

it('can create an artigo', function () {
    $user = User::factory()->create();
    $artigo = Artigos::create([
        'titulo' => 'Novo Artigo',
        'conteudo' => 'Conteúdo do artigo',
        'user_id' => $user->id,
        'active' => true,
        'status' => 'rascunho',
    ]);
    $this->assertDatabaseHas('artigos', ['titulo' => 'Novo Artigo']);
});

it('can activate and deactivate artigo', function () {
    $user = User::factory()->create();
    $artigo = Artigos::create([
        'titulo' => 'Ativar Artigo',
        'conteudo' => '...',
        'user_id' => $user->id,
        'active' => false,
        'status' => 'rascunho',
    ]);
    $artigo->active = true;
    $artigo->save();
    $this->assertDatabaseHas('artigos', ['id' => $artigo->id, 'active' => true]);
    $artigo->active = false;
    $artigo->save();
    $this->assertDatabaseHas('artigos', ['id' => $artigo->id, 'active' => false]);
});

it('can filter artigos by status', function () {
    $user = User::factory()->create();
    Artigos::create([
        'titulo' => 'Publicado',
        'conteudo' => '...',
        'user_id' => $user->id,
        'active' => true,
        'status' => 'publicado',
    ]);
    $publicados = Artigos::where('status', 'publicado')->get();
    expect($publicados)->not()->toBeEmpty();
});
