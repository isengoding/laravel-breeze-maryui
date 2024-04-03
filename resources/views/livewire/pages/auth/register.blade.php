<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.guest')] class extends Component {
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div>
    <div class="flex justify-end">
        <x-theme-toggle class="btn btn-circle btn-ghost" />

    </div>
    <div class="md:w-96 mx-auto mt-20">
        <h1 class="text-3xl font-bold text-center mb-4">Register</h1>
        <x-form wire:submit="register">
            <x-input label="Name" wire:model="name" icon="o-user" inline />
            <x-input label="E-mail" wire:model="email" icon="o-envelope" inline />
            <x-input label="Password" wire:model="password" type="password" icon="o-key" inline />
            <x-input label="Confirm Password" wire:model="password_confirmation" type="password" icon="o-key"
                inline />

            <x-slot:actions>
                <x-button label="Already registered?" class="btn-ghost" link="/login" />
                <x-button label="Register" type="submit" icon="o-paper-airplane" class="btn-primary"
                    spinner="register" />
            </x-slot:actions>
        </x-form>

    </div>
</div>
