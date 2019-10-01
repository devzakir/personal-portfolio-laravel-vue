@extends('layouts.admin')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between align-items-center">
          <h2>All Product List</h2>
          <a href="{{ route('product.create') }}" class="btn btn-primary">Create Product</a>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-striped">
            <thead class="thead-dark">
              <tr>
                <th>Id</th>
                <th>Image</th>
                <th>Title</th>
                <th>Category Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($products as $p)
              <tr>
                <td>{{$p->id}}</td>
                <td>
                  <div style="max-height:60px; max-width:60px; overflow:hidden">
                    <img src="{{ asset($p->image) }}" alt="" class="img-fluid">
                  </div>
                </td>
                <td>{{$p->title}}</td>
                <td>{{$p->category->name }}</td>
                <td>
                    <a href="{{ route('product.edit', ['id' => $p->id]) }}" class="btn btn-success btn-sm"> <span class="mdi mdi-square-edit-outline"></span> </a>
                    <a href="{{ route('product.show', ['id' => $p->id]) }}" class="btn btn-primary btn-sm"> <span class="mdi mdi-eye"></span> </a>
                    <a href="{{ route('product.destroy', ['id' => $p->id]) }}" class="btn btn-danger btn-sm"> <span class="mdi mdi-delete"></span> </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="card-footer text-center">
          {{$products->links()}}
        </div>
      </div>
    </div>
  </div>
@endsection