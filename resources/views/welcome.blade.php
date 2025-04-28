{{-- @extends('layouts.main') <--- REMOVED AND USED AppLayout class component
 --}}
 {{-- We are no longer using the @extends layouts here since we are using the component class named AppLayout  --}}
 @props(['title' => 'Your Recipes'])
<x-app-layout :title="$title"> 
@if(session()->has('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="container mb-5" >
    <a href="{{url('add-recipe')}}" class="btn btn-sm btn-primary"><i class="bi bi-plus"></i>Add Recipe</a>
</div>
<x-list-container>
    @foreach ($recipes as $recipe)
      <x-card :recipe="$recipe" />
    @endforeach
</div>
</x-list-container>
</x-app-layout>