{{-- Sample of props, props should always be at the top --}}
{{-- If you use props, it will automatically overwrite the attribute passed from the component, so you should also declare it inside the props --}}
@props(['recipe', 'bgColor' => 'gray']) 
{{-- @attribute() are the attributes passed from the component --}}
<div class="card m-1" style="width: 18rem;">
<img class="card-img-top" src="{{ $recipe->image ? asset('uploads/' . $recipe->image) : asset('images/default-photo.jpg') }}"  alt="Card image cap">
<div class="card-body">
    <h5 class="card-title">{{ $recipe->title }}</h5>
    <p class="card-text">{{ $recipe->description }}</p>
    <small>Added by: {{ $recipe->user->name }}</small>
    <div class="d-flex flex-row-reverse">
    @if(Auth::id() == $recipe->user->id)
    <form action="{{route('delete', ['recipe' => $recipe])}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-xs btn-danger m-1" title="Delete"><i class="bi bi-trash"></i></button>
    </form>
    <a href="{{route('edit', ['recipe' => $recipe])}}"  class="btn btn-xs btn-success m-1" title="Edit"><i class="bi bi-pencil-square"></i></a>
    @endif
    <a href="{{route('view-recipe', ['recipe' => $recipe])}}"  class="btn btn-xs btn-primary m-1 " title="View"><i class="bi bi-eye"></i></a>
    </div>
</div>
{{-- Using attribute->class acts like a class attribute --}}
<div {{$attributes->class("card-footer text-muted card-bg-$bgColor")}} class="">
    <small>Date Uploaded: {{ date('M d, Y H:i a', strtotime($recipe->created_at)) }}</small>
</div>
</div>