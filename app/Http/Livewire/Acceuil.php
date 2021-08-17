<?php

namespace App\Http\Livewire;

use App\Mail\bookingMail;
use App\Mail\BookingTest;
use App\Models\Image;
use Livewire\Component;
use App\Models\Evenement;
use App\Models\Reservation;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Mail;

class Acceuil extends Component
{

    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public string $searchev = '';
    protected $queryString = [
        'searchev' => ['except' => '']

    ];

    public function render()
    {
        return view('livewire.acceuils.index',[
            "images" => Image::latest()->paginate(9),
        ],
        [
          "evenements" => Evenement::where('nom', 'LIKE', "%{$this->searchev}%"),
        ],)
        ->extends("layouts.master")
        ->section("contenu");
    }

    //envoi de mail après que la personne ait à reserver une place pour un événement
    public function index()
    {
        $user = ['email'=>'augusthihea@gmail.com',
                 'name' =>'Auth::user()->name' ,
        ];
        Mail::to($user['email'])->send(new BookingTest($user));
        return ;
    }


    public function booking($evenement, $user)
    {
        Reservation::create(["libelle_r"=>"Reservation",
                             "evenement_id" =>$evenement,
                              "user_id"=>$user,
        ]);

        $this->dispatchBrowserEvent("ShowSuccessMessage",
        ["message" =>"Vous venez de reserver une place pour cet événement!! Consulter votre mail"]);

        $this->index();

    }
}
