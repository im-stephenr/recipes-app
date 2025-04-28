<?php

use App\Http\Controllers\RecipeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;




// LOGIN
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login-check', [UserController::class, 'loginCheck']);
// LOGOUT
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// SIGN UP
Route::get('/signup', [UserController::class, 'signup'])->name('signup');

Route::post('/signup-check', [UserController::class, 'signupCheck']);

// Recipes
// SAMPLE OF GROUPED CONTROLLER ROUTES
Route::controller(RecipeController::class)->group(function(){
    Route::get('/my-recipes', 'myRecipes')->name('my-recipes');
    Route::get('/', 'index');
    Route::get('/add-recipe', 'add');
    Route::post('/add-recipe', 'addCheck')->name('add-recipe-check');
    Route::get('/edit/{recipe}', 'edit')->name('edit');
    Route::put('/edit/{recipe}', 'editCheck')->name('edit-check');
    Route::delete('/delete/{recipe}', 'delete')->name('delete');
    Route::get('/view-recipe/{recipe}', 'viewRecipe')->name('view-recipe');
    Route::post('/search', 'search')->name('search');
    Route::get('/search-result', 'searchResult')->name('search-result');
    Route::delete('/delete-ingredient/{ingredient}', 'deleteIngredient')->name('delete-ingredient');
});
// Home
// Route::get('/', [RecipeController::class, 'index']);
// Explore
// Route::get('/explore', [RecipeController::class, 'explore'])->name('explore');
// Route::get('/add-recipe', [RecipeController::class, 'add']);
// Route::post('/add-recipe', [RecipeController::class, 'addCheck'])->name('add-recipe-check');
// Route::get('/edit/{recipe}', [RecipeController::class, 'edit'])->name('edit');
// Route::put('/edit/{recipe}', [RecipeController::class, 'editCheck'])->name('edit-check');
// Route::delete('/delete/{recipe}', [RecipeController::class, 'delete'])->name('delete');
