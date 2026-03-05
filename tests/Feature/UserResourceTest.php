<?php


use App\Models\User;

it('can register a user via resource', function () {
    $user = User::factory()->make([
        'active' => false,
    ]);
    $this->assertDatabaseMissing('users', ['email' => $user->email]);
    $created = User::create($user->getAttributes());
    $this->assertDatabaseHas('users', ['email' => $user->email]);
    expect($created->active)->toBeFalse();
});

it('can activate a user', function () {
    $user = User::factory()->create(['active' => false]);
    $user->active = true;
    $user->save();
    $this->assertDatabaseHas('users', ['id' => $user->id, 'active' => true]);
});

it('can block (deactivate) a user', function () {
    $user = User::factory()->create(['active' => true]);
    $user->active = false;
    $user->save();
    $this->assertDatabaseHas('users', ['id' => $user->id, 'active' => false]);
});
