<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Evenement;
use App\Models\Ticket;
use App\Models\Type_ticket;

class Tickets extends Component
{
    public $newTicket = [];
    public function render()
    {

        return view('livewire.tickets.index',[
            "type_tickets" => Type_ticket::all(),
            "evenements" => Evenement::all(),

        ])
        ->extends("layouts.master")
        ->section("contenu");
    }

    protected $rules = [
        "newTicket.lib_ticket" => 'required',
        "newTicket.mode_paiement" => 'required',
        "newTicket.evenement_id" => 'required',
        "newTicket.type_ticket_id" => 'required',
    ];


    public function save()
    {
        $validationAttributes =  $this->validate();
       $validationAttributes["newTicket"] ["user_id"] = "Auth::->user()->id";

       Ticket::create($validationAttributes["newTicket"]);

       $this->newTicket = [];

       $this->dispatchBrowserEvent("ShowSuccessMessage",
        ["message" =>"Ticket payée avec succès!!"]);

    }


}
