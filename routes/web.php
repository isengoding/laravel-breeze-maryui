<?php

use Livewire\Volt\Volt;

require __DIR__ . '/auth.php';

Volt::route('/', 'users.index');
