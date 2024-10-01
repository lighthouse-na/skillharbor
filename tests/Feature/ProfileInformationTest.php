<?php

use App\Models\User;
use Laravel\Jetstream\Http\Livewire\UpdateProfileInformationForm;
use Livewire\Livewire;

test('current profile information is available', function () {
    $this->actingAs($user = User::factory()->create());

    $component = Livewire::test(UpdateProfileInformationForm::class);

    expect($component->state['first_name'])->toEqual($user->first_name);
    expect($component->state['last_name'])->toEqual($user->last_name);
    expect($component->state['email'])->toEqual($user->email);
});

test('profile information can be updated', function () {
    $this->actingAs($user = User::factory()->create());

    Livewire::test(UpdateProfileInformationForm::class)
        ->set('state', ['first_name' => 'Test', 'last_name' => 'Name', 'email' => 'test@example.com'])

        ->call('updateProfileInformation');

    expect($user->fresh())
        ->first_name->toEqual('Test')
        ->last_name->toEqual('Name')
        ->email->toEqual('test@example.com');
});
