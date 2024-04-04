<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.guest')] class extends Component {
    public string $password = '';

    /**
     * Confirm the current user's password.
     */
    public function confirmPassword(): void
    {
        $this->validate([
            'password' => ['required', 'string'],
        ]);

        if (
            !Auth::guard('web')->validate([
                'email' => Auth::user()->email,
                'password' => $this->password,
            ])
        ) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }

        session(['auth.password_confirmed_at' => time()]);

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>
<div>
    <div class="flex justify-end">
        <x-theme-toggle class="btn btn-circle btn-ghost" />
    </div>
    <div class="md:w-96 mx-auto mt-20">
        <div class="mb-4 text-sm">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <x-form wire:submit="confirmPassword">

            <x-input label="Password" wire:model="password" type="password" icon="o-key" inline />

            <x-slot:actions>

                <x-button label="Confirm" type="submit" class="btn-primary" spinner="confirmPassword" />
            </x-slot:actions>
        </x-form>
    </div>

</div>
