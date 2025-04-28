@props(['title' => 'Search Result'])
<x-app-layout :title="$title">
    <x-search-form />
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if ($recipes->isNotEmpty())
    <div class="alert alert-success">Result(s) found <b>{{ $recipes->count() }}</b> in keyword <b>'{{ $search_keyword }}'</b></div>
    <x-list-container>
        @foreach ($recipes as $recipe)
           <x-card :recipe="$recipe" />     
        @endforeach
    </x-list-container>
    @else
        <h1>WALA</h1>
    @endif
</x-app-layout>