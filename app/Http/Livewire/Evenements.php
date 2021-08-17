<?php

namespace App\Http\Livewire;

use App\Models\Image;
use App\Models\Salle;
use Livewire\Component;
use App\Models\Evenement;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Type_evenement;

class Evenements extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = "bootstrap";

    public $newEvenement = [];
    public $editEvent = [];
    public $photo;
    public $evenement;

    public $currentPage = PAGELIST;

    public string $search = '';

    protected $queryString = [
        'search' => ['except' => '']

    ];

    public function render()
    {
        return view('livewire.evenements.index',[
            "evenements" => Evenement::where('nom',  'LIKE', "%{$this->search}%" )->paginate(10)
        ],
        [
            "salles" => Salle::all(),
            "type_evenements" => Type_evenement::all(),
        ])
            ->extends("layouts.master")
            ->section("contenu");;
    }

    protected $rules = [

        'newEvenement.nom' =>'required|unique:evenements,nom',
        'newEvenement.adresse' =>'required',
        'newEvenement.description' =>'required|max:255',
        'newEvenement.nombre_place' =>'required|numeric',
        'newEvenement.datedebut' =>'required|date',
        'newEvenement.datefin' => 'required|date',
        'newEvenement.heuredebut' => 'required',
        'newEvenement.heurefin' => 'required',
        'newEvenement.salle_id' => 'required',
        'newEvenement.type_evenement_id' => 'required',

    ];

    public function goToAddEvent()
    {
        $this->currentPage = PAGECREATEFORM;

    }

    public function goToEditEvent($id)
    {
        $this->editEvent = Evenement::find($id)->toArray();

        $this->currentPage = PAGEEDITFORM;
    }

    public function AddEvent()
    {

       $validationAttributes =  $this->validate();


      $evenement =  Evenement::create($validationAttributes["newEvenement"]);


           $this->photo = $this->photo->store('photos','public');

      // $this->photo = json_encode($this->photo);


      $filename = $this->photo;
      $image = new Image();

       $image->path = $filename;

       $evenement->images()->save($image);

        $this->newEvenement = [];

       $this->dispatchBrowserEvent("ShowSuccessMessage",
        ["message" =>"événement ajouté avec succès!!"]);

    }

    public function goToListEvent()
    {
        $this->currentPage = PAGELIST;
        $this->editEvent = [];

    }


    public function confirmDelete($name, $id)
    {
        $this->dispatchBrowserEvent("ShowConfirmMessage",["message"=>
        ["text" =>"Vous êtes sur le point de supprimer $name de la liste. Voulez-vous continuer?",
          "title" => "Êtes-vous sur de continuer?",
          "type" => "warning",
          "data" => [
              "event_id" => $id
          ]
        ]]);
    }

    public function deleteEvent($id)
    {
        Evenement::destroy($id);
        $this->dispatchBrowserEvent("ShowSuccessMessage",
        ["message" =>"Evénement supprimé avec succès!!"]);

    }

}
