<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisateur extends Model
{
    use HasFactory;
    protected $guard = [];

    /** 3
     * un organisateur peut organiser  un ou plusieurs événements.
     */
    public function evenements()
    {
        return $this->belongsToMany(Evenement::class,"evenement_organisateur","evenement_id","organisateur_id");
    }
}
