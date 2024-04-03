<?php

use function Livewire\Volt\{state};

//

?>

<div>
    <!-- HEADER -->
    <x-header title="Dashboard" separator progress-indicator>

    </x-header>

    <div class="grid lg:grid-cols-4 gap-5 lg:gap-8">
        <x-card shadow class="bg-primary-content  dark:bg-base-100">
            <div class="flex items-center gap-3">
                <x-icon name="o-users" class="text-primary w-9 h-9" />
                <div>
                    <div class="text-sm text-gray-400 whitespace-nowrap">Gros</div>
                    <div class="font-black text-xl">Rp. 12.000.000</div>
                </div>
            </div>
        </x-card>
        <x-card shadow>
            <div class="flex items-center gap-3">
                <x-icon name="o-users" class="text-primary w-9 h-9" />
                <div>
                    <div class="text-sm text-gray-400 whitespace-nowrap">Gros</div>
                    <div class="font-black text-xl">Rp. 12.000.000</div>
                </div>
            </div>
        </x-card>
        <x-card class="border-primary" shadow>
            <div class="flex items-center gap-3">
                <x-icon name="o-users" class="text-primary w-9 h-9" />
                <div>
                    <div class="text-sm text-gray-400 whitespace-nowrap">Gros</div>
                    <div class="font-black text-xl">Rp. 12.000.000</div>
                </div>
            </div>
        </x-card>
        <x-card shadow>
            <div class="flex items-center gap-3">
                <x-icon name="o-users" class="text-primary w-9 h-9" />
                <div>
                    <div class="text-sm text-gray-400 whitespace-nowrap">Gros</div>
                    <div class="font-black text-xl">Rp. 12.000.000</div>
                </div>
            </div>
        </x-card>
    </div>
</div>
