@extends('layouts.admin')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between align-items-center">
          <h2>Edit About Info</h2>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-6 offset-3">
              <form action="{{ route('about.update', ['id' => $about->id]) }}" method="post">
                @csrf 
                <div class="form-group">
                  <label for="">Name</label>  
                  <input type="text" name="name" value="{{ $about->name }}" class="form-control" placeholder="Your Name">
                </div>  
                <div class="form-group">
                  <label for="">Greeting</label>
                  <input type="text" name="gretting" value="{{ $about->greeting }}" class="form-control" placeholder="Greeting Title">
                </div>
                <div class="form-group">
                  <label for="">Banner Title</label>
                  <input type="text" name="banner_title" value="{{ $about->banner_title }}" class="form-control" placeholder="Banner Title">
                </div>
                <div class="form-group">
                  <label for="">Greeting Note</label>
                  <input type="text" name="greeting_note" value="{{ $about->greeting_note }}" class="form-control" placeholder="Greeting Note">
                </div>
                <div class="form-group">
                  <label for="">Description</label>
                  <textarea type="text" name="description" rows="3" class="form-control" placeholder="Description">{{ $about->description }}</textarea>
                </div>
                <div class="form-group text-center"><button class="btn btn-success">Update About Info</button></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection