<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title . ' - ' . config('app.name') : config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen font-sans antialiased bg-base-200">

    {{-- NAVBAR mobile only --}}
    <x-nav sticky class="lg:hidden">
        <x-slot:brand>
            <div class="font-bold text-2xl text-center">App</div>
        </x-slot:brand>
        <x-slot:actions>
            <label for="main-drawer" class="lg:hidden mr-3">
                <x-icon name="o-bars-3" class="cursor-pointer" />
            </label>
        </x-slot:actions>
    </x-nav>

    {{-- MAIN --}}
    <x-main full-width>
        {{-- SIDEBAR --}}
        <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-100 lg:bg-inherit">

            {{-- BRAND --}}
            <!-- HEADER -->
            <x-header title="App" separator class="mt-5 px-2">

            </x-header>
            {{-- <x-app-brand class="p-5 pt-3" /> --}}

            {{-- MENU --}}
            <x-menu activate-by-route class="-mt-9">

                {{-- User --}}
                @if ($user = auth()->user())
                    {{-- <x-menu-separator /> --}}

                    <x-list-item :item="$user" no-separator no-hover class="-mx-2 !-my-2 rounded">
                        <x-slot:value>
                            <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name"
                                x-on:profile-updated.window="name = $event.detail.name">
                            </div>
                        </x-slot:value>
                        <x-slot:sub-value>
                            <div x-data="{{ json_encode(['email' => auth()->user()->email]) }}" x-text="email"
                                x-on:profile-updated.window="email = $event.detail.email"></div>
                        </x-slot:sub-value>
                        <x-slot:actions>
                            <x-button icon="o-power" class="btn-circle btn-ghost btn-xs" tooltip-left="logoff"
                                no-wire-navigate link="/logout" />
                        </x-slot:actions>
                    </x-list-item>

                    <x-menu-separator />
                @endif

                <x-menu-item title="Dashboard" icon="o-home" link="/dashboard" />
                <x-menu-item title="My Profile" icon="o-user-circle" link="/profile" />

                <x-menu-sub title="Settings" icon="o-cog-6-tooth">
                    <x-menu-item title="Wifi" icon="o-wifi" link="####" />
                    <x-menu-item title="Archives" icon="o-archive-box" link="####" />
                </x-menu-sub>
                <x-menu-separator />
                <x-menu-item title="Theme" icon="o-swatch" @click="$dispatch('mary-toggle-theme')" />

            </x-menu>
        </x-slot:sidebar>

        {{-- The `$slot` goes here --}}
        <x-slot:content>
            {{ $slot }}

        </x-slot:content>
    </x-main>

    {{--  TOAST area --}}
    <x-toast />

    <x-theme-toggle class="hidden" />
</body>

</html>
