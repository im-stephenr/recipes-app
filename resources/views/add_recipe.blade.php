{{-- @extends('layouts.main')
 --}}
 {{-- We are no longer using the @extends layouts here since we are using the component class named AppLayout  --}}
 @props(['title' => 'Add Recipe'])
<x-app-layout :title="$title">
  <form action="{{ route('add-recipe-check') }}" enctype="multipart/form-data" method="POST">
      @csrf
      @method('POST')
      <div class="container w-50 " style="padding:50px;">
          @if($errors->any())
          <div class="alert alert-danger">
            <h4>Error Occured</h4>
            <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
            <div class="mb-3 row">
              <label for="staticEmail" class="col-sm-2 col-form-label">Title</label>
              <div class="col-sm-10">
                <input type="text" id="staticEmail" class="form-control" name="title" value="{{ old('title') }}">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="inputGroupFile01" class="col-sm-2 col-form-label">Image</label>
              <div class="col-sm-10">
                <div class="mb-3">
                  <input class="form-control" name="photo" type="file" id="formFile">
                </div>
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">Description</label>
              <div class="col-sm-10">
                <textarea class="form-control" rows="20" name="description">{{ old('description') }}</textarea>
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">
                Ingredients
                <button type="button" class="btn btn-success btn-xs" id="add_ingredient"><i class="bi bi-plus"></i></button>
              </label>
              <div class="col-sm-6">
                <input type="text" class="form-control ingredient mb-2 d-inline" style="width:80%;" name="ingredient[]" value="">
              </div>
            </div>
            <div class="mb-3 row">
              <div class="col-md-2"></div>
              <div class="col-md-3">
                <button type="submit" class="btn btn-primary">Add</button>
              </div>
            </div>
      </div>
  </form>
</x-app-layout>