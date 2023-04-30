<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use HasFactory;
    protected $table = "categories";
    protected $fillable = [
        'titre', 'id'
    ];
    public function getRouteKeyName()
    {
        return "id";
    }
    public function livres()
    {
        return $this->hasMany(Livre::class);
    }
}
