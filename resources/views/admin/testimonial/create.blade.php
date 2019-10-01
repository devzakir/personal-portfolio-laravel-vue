@extends('layouts.admin')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between align-items-center">
          <h2>Create Testimonial</h2>
          <a href="{{ route('user.index') }}" class="btn btn-primary">Go back to Testimonial List</a>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-6 offset-3">
              @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
              <form action="{{ route('testimonial.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="">Client Name</label>
                  <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Client Name">
                </div>
                <div class="form-group">
                  <label for="">Testimonial Title</label>
                  <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="Testimonial Title">
                </div>
                <div class="form-group">
                  <label for="description">Testimonial Description</label>
                  <textarea name="description" id="description" rows="3" class="form-control" placeholder="Describe yourself here..."></textarea>
                </div>
                <div class="form-group">
                  <label for="">Choose Testimonial Image</label>
                  <input type="file" name="avatar" class="form-control-file">
                </div>
                <div class="form-group text-center">
                  <button class="btn btn-success" type="submit">Create Testimonial</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection