<?php

//use App\Htpp\Livewire\Utlisateurs;

use App\Http\Livewire\Pay;
use App\Http\Livewire\Salles;
use App\Http\Livewire\Villes;
use App\Http\Livewire\Acceuil;
use App\Http\Livewire\Booking;
use App\Http\Livewire\Tickets;
use App\Http\Livewire\Evenements;
use App\Http\Livewire\Utilisateurs;
use App\Http\Livewire\TypeEvenement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\EventOrganisateur;
use App\Http\Livewire\Reservations;

//use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();
/*
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
->name('home')
->middleware("auth");

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])
->name('home')
->middleware("auth");*/

Route::get("/home", Acceuil::class)->name("acceuils.index")->middleware("auth");
Route::get("/", Acceuil::class)->name("acceuils.index")->middleware("auth");
Route::get('/.', '\App\Http\Livewire\Acceuil@index')->name("emails.index")->middleware("auth");
Route::get('/tickets',Tickets::class)->name("tickets.index")->middleware("auth.participant");


//groupe des routes relatives à l'admin


    Route::group([
        "middleware" => ["auth", "auth.admin"],
        'as'=>'admin.',
    ], function(){

        Route::group([
            "prefix" => "habilitations",
            "as" => 'habilitations.'

        ], function(){
            Route::get("/utilisateurs", Utilisateurs::class)->name("users.index");

        });
        Route::group([
            "prefix" =>"gestion",
            "as" => 'gestion.',

        ],function(){
            Route::get("/pays", Pay::class)->name("pays.index");

        } );

        Route::group([
            "prefix" =>"booking",
            "as" => 'booking.',

        ],function(){
            Route::get("/book", Reservations::class)->name("bookings.list");

        } );

        Route::group([
            "prefix" =>"gestion",
            "as" => 'gestion.',

        ],function(){
            Route::get("/villes", Villes::class)->name("ville.index");

        } );
        Route::group([
            "prefix" =>"gestion",
            "as" => 'gestion.',

        ],function(){
            Route::get("/salles", Salles::class)->name("salle.index");

        } );

        Route::group([
            "prefix" =>"evenement",
            "as" => 'evenement.',

        ],function(){
            Route::get("/type_evenement", TypeEvenement::class)->name("type.index");

        } );

        Route::group([
            "prefix" =>"evenement",
            "as" => 'evenement.',

        ],function(){
            Route::get("/evenement", Evenements::class)->name("evenement.index");

        } );

    });

    //reservation
    Route::group([
        "middleware" => ["auth","auth.participant"],
        'as'=>'book.',
    ], function(){
        Route::group([
            "prefix" => "booking",
            "as" => 'booking.'

        ], function(){
            Route::get("/reservation", Booking::class)->name("bookings.index");

        });

    });

    Route::group([
        "middleware" => ["auth", "auth.organisateur"],
        'as'=>'organisateur.',
    ], function(){
        Route::group([
            "prefix" => "evenement",
            "as" => 'evenement.'

        ], function(){
            Route::get("/events", EventOrganisateur::class)->name("event.index");

        });

    });

    Route::group([
        "middleware" => ["auth","auth.participant"],
        'as'=>'participant.',
    ], function(){
        Route::group([
            "prefix" => "evenement",
            "as" => 'evenement.'

        ], function(){
            Route::get("/accueil", Acceuil::class)->name("accueil.index");

        });

    });


