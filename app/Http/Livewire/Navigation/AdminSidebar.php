<?php

namespace App\Http\Livewire\Navigation;

use Livewire\Component;

class AdminSidebar extends Component
{
    public function render()
    {
        return view('livewire.navigation.admin-sidebar')
            ->extends('layouts.admin');
    }
}
