<?php

use function Livewire\Volt\{state};

//

?>

<div>
    <!-- HEADER -->
    <x-header title="Profile" separator progress-indicator>

    </x-header>
    <div class="grid lg:grid-cols-2 gap-5 lg:gap-8 mb-10">
        <livewire:profile.update-profile-information-form />


    </div>
    <div class="grid lg:grid-cols-2 gap-5 lg:gap-8 mb-10">
        <livewire:profile.update-password-form />


    </div>
    <div class="grid lg:grid-cols-2 gap-5 lg:gap-8 mb-10">
        <livewire:profile.delete-user-form />


    </div>
</div>
