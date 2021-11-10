<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;

class LandingPage extends Component
{
    public function render()
    {
        return view('livewire.home.landing-page')
            ->extends('layouts.app');
    }
}
