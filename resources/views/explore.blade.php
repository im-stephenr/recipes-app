@props(['title' => 'Explore'])
<x-app-layout :title="$title">
@if(session()->has('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<p >Year: <b>{{$year }}</b></p> <!-- DATA FROM Providers/AppServiceProvider, shares to all views -->
<x-search-form />
<x-list-container>
    @foreach ($recipes as $recipe)
        <!-- A syntax to call component file should start 'x-filename' if it is in another folder inside component, then it should be @<x - foldername.filename /> -->
        {{-- To pass the data $recipe inside card component, we use :recipe as an attribute --}}
        {{-- Other usage, < x - card:variableName>VariableData</x - card:variableName /> and under card component you can use it as variable $variableName --}}
        <x-card :recipe="$recipe" />
    @endforeach
</x-list-container>
</x-app-layout>