@extends('layouts.admin')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between align-items-center">
          <h2>All Product Category List</h2>
          <a href="{{ route('product.category.create') }}" class="btn btn-primary">Create a Category</a>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-striped">
            <thead class="thead-dark">
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($categories as $category)
              <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>
                    <a href="{{ route('product.category.edit', ['id' => $category->id]) }}" class="btn btn-success btn-sm"> <span class="mdi mdi-square-edit-outline"></span> </a>
                    <a href="#" class="btn btn-primary btn-sm"> <span class="mdi mdi-eye"></span> </a>
                    <a href="{{ route('product.category.destroy', ['id' => $category->id]) }}" class="btn btn-danger btn-sm"> <span class="mdi mdi-delete"></span> </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection