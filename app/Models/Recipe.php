<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    //
    protected $fillable = [
        'title',
        'description',
        'image',
        'user_id'
    ];

    // creating this method to connect the recipes table to ingredients table  via recipe_id
    public function ingredients(){
        return $this->hasMany(Ingredient::class, 'recipe_id');
    }

    public function user(){
        // argument 1 = Calling User model, argument 2 = user_id from clients table that is connected to users table, basically a join sql statement
        // To use this $recipes->user->name which gets the user name from users table joined by recipes table
        return $this->belongsTo(User::class, 'user_id'); 
    }
}
