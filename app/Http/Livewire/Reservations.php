<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Reservation;
use Livewire\WithPagination;

class Reservations extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    
    public function render()
    {
        return view('livewire.reservations.index',
        [
            "bookings" => Reservation::latest()->paginate(6),
            "users" => User::all(),
        ])
        ->extends("layouts.master")
        ->section("contenu");
    }
}
