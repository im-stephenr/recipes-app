<div class="col-md-12">
    <form  action="{{url('search')}}" method="POST">
        @csrf
        @method('POST')
        <div class="form-group mb-5 d-flex flex-wrap justify-content-center">
            <div class="row">
                <div class="col-md-8">
                    {{-- request('search') is from the url ?search= --}}
                    <input type="text" name="search" class="form-control" value="{{ request('search') ?? ''  }}" />
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-search"></i> Search</button>
                </div>
            </div>
        </div>
    </form>
</div>