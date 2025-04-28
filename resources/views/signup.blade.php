@props(['title' => 'Explore'])
<x-app-layout :title="$title">
<form action="{{ url('signup-check') }}" method="POST">
    @csrf
    @method('POST')
    <div class="container w-50 bg-light" style="padding:50px;">
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
            <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="name">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="email">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" name="password" class="form-control" id="inputPassword">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Confirm Password</label>
            <div class="col-sm-10">
              <input type="password" name="confirm_password" class="form-control" >
            </div>
          </div>
          <div class="mb-3 row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
              <button type="submit" class="btn btn-primary">Register</button>
            </div>
          </div>
    </div>
</form>
</x-app-layout>