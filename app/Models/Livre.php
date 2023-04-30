<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    use HasFactory;
    protected $table = "livres";
    protected $fillable = [
        'id', 'titre',  'desc', 'inStock', 'nomcategory', 'photo', 'category_id'
    ];
    public function getRouteKeyName()
    {
        return "id";
    }
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
}
