<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.guest')] class extends Component {
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>
<div>
    <div class="flex justify-end">
        <x-theme-toggle class="btn btn-circle btn-ghost" />
    </div>
    <div class="md:w-96 mx-auto mt-20">

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />


        <h1 class="text-3xl font-bold text-center mb-4">Login</h1>
        <x-form wire:submit="login">
            <x-input label="E-mail" wire:model="form.email" icon="o-envelope" inline />

            <x-input label="Password" wire:model="form.password" type="password" icon="o-key" inline />
            @if (Route::has('password.request'))
                <a class="underline text-sm text-right text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('password.request') }}" wire:navigate>
                    {{ __('Forgot your password?') }}
                </a>
            @endif
            <x-checkbox label="Remember me" wire:model="form.remember" />


            <x-slot:actions>

                <x-button label="Create an account" class="btn-ghost" link="/register" />
                <x-button label="Login" type="submit" icon="o-paper-airplane" class="btn-primary" spinner="login" />
            </x-slot:actions>
        </x-form>


    </div>
</div>
