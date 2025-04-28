<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    //
    protected $fillable = [
        'ingredient',
        'recipe_id',
    ];

     // creating this method to connect the ingredients table to recipes table
    public function recipe(){
        $this->belongsTo(Recipe::class, 'recipe_id');
    }
}
