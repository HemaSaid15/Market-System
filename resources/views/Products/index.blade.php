@extends('layouts.app')


@section('title' , 'All Products')

@section('content')
    <div class="py-12"> 
        <div class="container">
            <div class="row">

                @if(session('success'))
                    
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"> All Products </div>
     
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>SL No</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($products as $product) 
                                    <tr>
                                        <th scope="row"> {{ $products->firstItem()+$loop->index  }} </th>
                                        <td> {{ $product->ProductName }} </td>
                                        <td>{{ $product->Price}}.LE</td>
                                        <td> 
                                            <a href="{{ route('product.edit' , $product->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ route('product.delete' , $product->id) }}" onclick="return confirm('Are you sure you want to delete all Pictures !!')" class="btn btn-danger">Delete</a>
                                        </td> 
                                    </tr> 
                                @endforeach   
                            </tbody>
                        </table>
                        {{-- For Pagination --}}
                        {{ $products->links() }}
   
                    </div>
                </div>
 

                {{-- This will appear only if user logged in --}}
                @auth
                    
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header"> Add Product </div>
                        
                        <div class="card-body">  
                            <form action="{{ route('product.store') }}" method="POST" >
                            
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Name</label>
                                    <input type="text" name="ProductName" class="form-control" id="exampleInputEmail1"  value="{{ old('ProductName') }}">
                                    <span class="text-danger">{{ $errors->first('ProductName') }}</span>
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Price</label>
                                    <input type="number" name="Price" class="form-control" id="exampleInputEmail1"  value="{{ old('Price') }}">
                                    <span class="text-danger">{{ $errors->first('Price') }}</span>
                                </div>
 
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary my-2">Add Product</button>
                                </div>
                            </form>
 
                        </div>
 
                    </div>
                </div>
                
                @endauth
            </div>
        </div> 
    </div>
@endsection