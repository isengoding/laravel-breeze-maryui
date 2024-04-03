<?php

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.guest')] class extends Component {
    public string $email = '';

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink($this->only('email'));

        if ($status != Password::RESET_LINK_SENT) {
            $this->addError('email', __($status));

            return;
        }

        $this->reset('email');

        session()->flash('status', __($status));
    }
}; ?>
<div>
    <div class="flex justify-end">
        <x-theme-toggle class="btn btn-circle btn-ghost" />
    </div>
    <div class="md:w-96 mx-auto mt-20">
        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <x-form wire:submit="sendPasswordResetLink">
            <x-input label="E-mail" wire:model="email" icon="o-envelope" inline autofocus />

            <x-slot:actions>

                <x-button label="Cancel" class="btn-ghost" link="/login" />
                <x-button label="Email Password Reset Link" type="submit" icon="o-paper-airplane" class="btn-primary"
                    spinner="sendPasswordResetLink" />
            </x-slot:actions>
        </x-form>
    </div>
</div>
