@props(['title' => 'Explore'])
<x-app-layout :title="$title">
<form action="{{ url('login-check') }}" method="POST">
    @csrf
    @method('POST')
    <div class="container w-50 bg-light" style="margin-top:100px;padding:50px;">
      @if ($errors->any())
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
            <div class="col-md-2"></div>
            <div class="col-md-10">
              <button type="submit" class="btn btn-primary">Login</button>
            </div>
          </div>
    </div>
</form>
</x-app-layout>