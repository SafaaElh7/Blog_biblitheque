<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;
    protected $table = "reserves";
    protected $fillable = [
        'id', 'user_cin',  'nom_livre', 'statut', 'duree'
    ];
}
