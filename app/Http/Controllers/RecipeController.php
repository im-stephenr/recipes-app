<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    // index
    public function myRecipes(){
        $recipes = [];
        $recipes = Recipe::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get(); // get specific data or list of recipes from logged in user (laravel's built in)
        // $recipes = Auth::user()->userSpecificRecipes()->latest()->get(); // get specific data or list of recipes from logged in user using custom method from User model
        return view('welcome', ['recipes' => $recipes]);
    }

    // explore page
    public function index(){
        $recipes = Recipe::latest()->get(); // Get all recipes latest
        return view('explore', ['recipes' => $recipes]);
    }

    // add
    public function add(){
        return view('add_recipe');
    }

    // add check
    public function addCheck(Recipe $recipe, Request $request){
        $incomingFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $ingredientField = $request->validate([
            'ingredient' => 'array|min:1',
            'ingredient.*' => 'required|string' // ensure each ingredient is a stirng
        ]);
       
        if($request->hasFile('photo')){
            // upload photo
            $photo = $request->file('photo');
            $fileName = time() . '_' . $photo->getClientOriginalName();
            $filePath = $photo->move(public_path('uploads'), $fileName); // this will upload the file under storage/app/public/uploads folder
            $incomingFields['image'] = $fileName;
        }

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['user_id'] = Auth::id();

        $saved_data = Recipe::create($incomingFields);

        // Add ingredients
        $recipe_id = $saved_data->id;
        
        for($i=0;$i<count($ingredientField['ingredient']);$i++){
            Ingredient::create(['ingredient' => $ingredientField['ingredient'][$i], 'recipe_id' => $recipe_id]);
        }


        return redirect('/')->with('success', 'Recipe Added Successfully');
    }

    public function viewRecipe(Recipe $recipe){
        $recipe->load('ingredients'); // loading the ingdredients method from Recipe model which is linked to ingredients table via recipe_id
        return view('view_recipe', ['recipe' => $recipe]);
    }

    // edit
    public function edit(Recipe $recipe){
        $recipe->load('ingredients');
        return view('edit_recipe', ['recipe' => $recipe]);
    }

    // edit check
    public function editCheck(Recipe $recipe, Ingredient $ingredient, Request $request){
        // dd($request->ingredient);
        $incomingFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
       
        if($request->hasFile('photo')){
            // upload photo
            $photo = $request->file('photo');
            $fileName = time() . '_' . $photo->getClientOriginalName();
            $filePath = $photo->move(public_path('uploads'), $fileName); // this will upload the file under storage/app/public/uploads folder
            $incomingFields['image'] = $fileName;
        }

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['user_id'] = Auth::id();

        $recipe->update($incomingFields);

        // Add ingredients
        $ingredientField = $request->validate([
            'ingredient' => 'array|min:1',
            'ingredient.*' => 'required|string' // ensure each ingredient is a stirng
        ]);
     
        foreach($request->ingredient as $id => $value){
            $ingredient->updateOrCreate(['id' => $id,'recipe_id' => $recipe->id ],['ingredient' => $value]);
        }

     
        

        return redirect(route('edit', ['recipe' => $recipe]))->with('success', 'Recipe Updated Successfully'); // ->with basically saying you are passing a session named success
    }

    // Delete
    public function delete(Recipe $recipe){
        $recipe->ingredients()->delete($recipe); // deleting ingredients table that is related to recipe
        $recipe->delete(); // deleting from the recipes table
        return redirect(route('my-recipes'))->with('success', 'Deleted Successfully');
    }

    // search
    public function search(Request $request){
        $incomingFields = $request->validate(['search' => 'required', 'min:4']);
        return redirect(route('search-result', ['search' => $incomingFields["search"]]));
    }

    public function searchResult(Request $request){
        $search_keyword = $request->query('search'); // getting the data passed from url named search
        $recipes = Recipe::where('title', 'like', '%'.$search_keyword.'%')->get();

        return view('search_result', ['recipes' => $recipes, 'search_keyword' => $search_keyword]);
    }

    // NOT USED SINCE nested FORM is not possible, might consider using javascript
    public function deleteIngredient(Ingredient $ingredient){
        // Get recipe data
        $recipe = Recipe::where('id', '=', $ingredient->recipe_id)->firstOrFail(); // using firstOrFail to retrieve single recipe model instead of collection since get() wont work for routing
        $ingredient->delete($ingredient);
        return redirect(route('edit', ['recipe' => $recipe]))->with("success", "Ingredient Deleted Successfully!");
    }
}
