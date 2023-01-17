@extends('layouts.admin')

@section('content')
      {{-- <div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
      </div> --}}
    <h1>Edit Workflow: {{$type->workflow}}</h1>
    <div class="row bg-white">
      <div class="col-12">
          <form action="{{route('admin.types.update', $type->slug)}}" method="POST" enctype="multipart/form-data" class="p-4">
              @csrf
              @method('PUT')
                <div class="mb-3">
                  <label for="workflow" class="form-label">Workflow Name</label>
                  <input type="text" class="form-control @error('workflow') is-invalid @enderror" id="workflow" name="workflow" value="{{old('workflow', $type->workflow)}}">
                  @error('workflow')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <button type="submit" class="btn btn-success">Submit</button>
                <button type="reset" class="btn btn-primary">Reset</button>
          </form>
      </div>
  </div>
@endsection