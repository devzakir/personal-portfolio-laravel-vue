@extends('layouts.admin')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between align-items-center">
          <h2>SEO Details</h2>
          {{-- <a href="{{ route('portfolio.category.create') }}" class="btn btn-primary"> Create SEO </a> --}}
        </div>
        <div class="card-body">
          <table class="table table-bordered table-striped">
            <thead class="thead-dark">
              <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Keyword</th>
                <th>Description</th>
                <th>OG Image</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @if($data->count() > 0)
              @foreach($data as $c)
              <tr>
                <td>{{$c->id}}</td>
                <td>{{$c->name}}</td>
                <td>{{$c->keyword}}</td>
                <td>{{$c->description}}</td>
                <td>
                  <div style="height:50px;width:50px;overflow:hidden">
                    <img src="{{$c->image}}" alt="" class="img-fluid">
                  </div>
                </td>
                <td>
                    <a href="{{ route('seo.edit', $c->id) }}" class="btn btn-success btn-sm"> <span class="mdi mdi-square-edit-outline"></span> </a>
                    <a href="#" class="btn btn-primary btn-sm"> <span class="mdi mdi-eye"></span> </a>
                    <a href="{{ route('seo.destroy', $c->id) }}" class="btn btn-danger btn-sm"> <span class="mdi mdi-delete"></span> </a>
                </td>
              </tr>
              @endforeach
              @else 
                <tr>
                  <td colspan="6"><h5 class="text-center">No Categories Found</h5></td>
                </tr>
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection