@extends('layouts.app')


@section('title' )
    Edit Product - {{ $product->ProductName }}
@endsection

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
                                    
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                
                                    <tr>
                                        
                                        <td> {{ $product->ProductName }} </td>
                                        <td>{{ $product->Price}}.LE</td>
                                        <td> 
                                            @if($product->created_at ==  NULL)
                                                <span class="text-danger"> No Date Set</span> 
                                            @else
                                                {{ Carbon\Carbon::parse($product->created_at)->longAbsoluteDiffForHumans() }}
                                            @endif
                                        </td>
                                        <td> 
                                            <a href="{{ route('product.delete' , $product->id) }}" onclick="return confirm('Are you sure to delete')" class="btn btn-danger">Delete</a>
                                        </td> 
                                    </tr> 
                                 
                            </tbody>
                        </table>
                    </div>
                </div>
 
                @auth
                       
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header"> Edit Product </div>
                        
                        <div class="card-body">  
                            <form action="{{ route('product.update' , $product->id) }}" method="POST">
                            
                                @csrf

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Name</label>
                                    <input type="text" name="ProductName" class="form-control" id="exampleInputEmail1"  value="{{ old('ProductName') ?? $product->ProductName }}">
                                    <span class="text-danger">{{ $errors->first('ProductName') }}</span>
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Price</label>
                                    <input type="number" name="Price" class="form-control" id="exampleInputEmail1"  value="{{ old('Price') ?? $product->Price }}">
                                    <span class="text-danger">{{ $errors->first('Price') }}</span>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary my-2">Edit Product</button>
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