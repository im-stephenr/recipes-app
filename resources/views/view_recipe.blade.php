@props(['title' => 'Explore'])
<x-app-layout :title="$title">
<div class="container">
    <div class="col-md-12" style="height:80vh;">
        <div class="row"> <!-- Another row for the columns -->
            <div class="col-md-3">
                <img class="img-thumbnail" width="250" src="{{ $recipe->image ? asset('uploads/'.$recipe->image) : asset('images/default-photo.jpg') }}" alt="">
                @if(Auth::id() == $recipe->user_id)
                <div class="d-flex flex-row">
                    <form action="{{route('delete', ['recipe' => $recipe])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-xs btn-danger m-1" title="Delete"><i class="bi bi-trash"></i></button>
                    </form>
                    <a href="{{route('edit', ['recipe' => $recipe])}}"  class="btn btn-xs btn-success m-1" title="Edit"><i class="bi bi-pencil-square"></i></a>
                </div>
                @endif
            </div>
            <div class="col-md-9">
                <h4>{{ $recipe->title; }}</h4>
                <hr>
                <div> 
                    <h4>Instructions</h4>
                    {{ $recipe->description; }}
                </div>
                <hr>
                <div>
                    <h4>Ingredients</h4>
                    @if (!empty($recipe->ingredients))
                        @foreach ($recipe->ingredients as $ingredient)
                            <li>{{ $ingredient->ingredient }}</li>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

</x-app-layout>