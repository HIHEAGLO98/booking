<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class Utilisateurs extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
   // public $isBtnAddClicked = false;

    public $currentPage = PAGELIST;

    public $newUser =  [];
    public $editUser = [];

  /*  protected $rules = [
        'newUser.name' =>'required',
        'newUser.email' =>'required|email|unique:users,email',
        'newUser.adresse' =>'required',
        'newUser.contact' =>'required|numeric|unique:users,contact',
        'newUser.sexe' =>'required',
        'newUser.ville' =>'required',
        'newUser.pays' => 'required',


    ];

*/

public string $search = '';

protected $queryString = [
    'search' => ['except' => '']
 
];

    public function render()
    {
        return view('livewire.utilisateurs.index' , [
            "users" => User::where('name', 'LIKE', "%{$this->search}%")->paginate(10)
        ])
        ->extends("layouts.master")
        ->section("contenu");
    }

    public function rules()
    {
        if( $this->currentPage == PAGEEDITFORM)
        {
            return [
                'editUser.name' =>'required',
                'editUser.email' =>['required','email', Rule::unique("users", "email")->ignore($this->editUser["id"])],

                'editUser.adresse' =>'required',
                'editUser.contact' => ['required','numeric', Rule::unique("users", "email")->ignore($this->editUser["id"])],
                'editUser.sexe' =>'required',
                'editUser.ville' =>'required',
                'editUser.pays' => 'required',

            ];
        }

        return [
            'newUser.name' =>'required',
            'newUser.email' =>'required|email|unique:users,email',
            'newUser.adresse' =>'required',
            'newUser.contact' =>'required|numeric|unique:users,contact',
            'newUser.sexe' =>'required',
            'newUser.ville' =>'required',
            'newUser.pays' => 'required',


        ];
    }


    public function goToAddUser()
    {

        $this->currentPage = PAGECREATEFORM;
    }

    public function goToEditUser($id)
    {
        $this->editUser = User::find($id)->toArray();

        $this->currentPage = PAGEEDITFORM;
    }

    public function goToListUser()
    {
        $this->currentPage = PAGELIST;
        $this->editUser = [];
    }


    public function addUser()
    {

       $validationAttributes =  $this->validate();
       $validationAttributes["newUser"] ["password"] = "password";

       User::create($validationAttributes["newUser"]);

       $this->newUser = [];

       $this->dispatchBrowserEvent("ShowSuccessMessage",
        ["message" =>"Utilisateur cr???? avec succ??s!!"]);

    }


    public function updateUser()
    {
        $validationAttributes = $this->validate();

        User::find($this->editUser["id"])->update($validationAttributes["editUser"]);

        $this->dispatchBrowserEvent("ShowSuccessMessage",
        ["message" =>"Utilisateur mis ?? jour avec succ??s!!"]);


    }


    public function confirmDelete($name, $id)
    {
        $this->dispatchBrowserEvent("ShowConfirmMessage",["message"=>
        ["text" =>"Vous ??tes sur le point de supprimer $name de la liste. Voulez-vous continuer?",
          "title" => "??tes-vous sur de continuer?",
          "type" => "warning",
          "data" => [
              "user_id" => $id
          ]
        ]]);
    }


    public function deleteUser($id)
    {
        User::destroy($id);
        $this->dispatchBrowserEvent("ShowSuccessMessage",
        ["message" =>"Utilisateur supprim?? avec succ??s!!"]);

    }


}
