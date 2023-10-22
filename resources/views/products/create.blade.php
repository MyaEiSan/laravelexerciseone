@extends('layouts.app')

@section('title','Create Page')

@section('content')
<h1>Create Page</h1>
{{-- <form action="/products" method="POST" enctype="multipart/form-data"> --}}
<form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">

    {{-- csrf = Cross-site request forgery --}}

    {{-- {{ csrf_field() }} --}}

   {{-- <input type="hidden" name="_token" value="{{csrf_token()}}" /> --}}

   @csrf
   @method("POST")

    <div class="row">
        <div class="col-md-6 form-group mb-3">
            <label for="name">Product Name</label>
            <input type="text" name="name" id="name" class="form-control form-control-sm rounded-0" placeholder="Ener Product name" /> 
        </div>
        <div class="col-md-6 form-group mb-3">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control form-control-sm rounded-0" placeholder="Ener price" /> 
        </div>
        <div class="col-md-6 form-group mb-3">
            <label for="image">Product Photo</label>
            <input type="file" name="image" id="image" class="form-control form-control-sm rounded-0" /> 
        </div>
        <div class="col-md-12">
            <div class="d-flex justify-content-end">
                <a href="{{route('products.index')}}" class="btn btn-secondary btn-sm rounded-0">Cancel</a>
                <button type="submit" class="btn btn-primary btn-sm rounded-0 ms-3">Submit</button>
            </div>
        </div>
    </div>

</form>
@endsection