@extends('layouts.app')

@section('title' , 'Bills - For Market')

@section('StyleLinks')
    <style>
        table
        {
            border-collapse: collapse;
            width: 100%;
            margin-top: 40px;
        }

        th, td
        {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #DDD;
        }

        tr:hover
        {
            background-color: #D6EEEE;
        }

        tr:nth-child(even)
        {
            background-color: #f2f2f2;
        }
        .pagination
        {
            display: inline-block;
        }

        .pagination a
        {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
        }

        .pagination a.active
        {
            background-color: #4CAF50;
            color: white;
        }

        .pagination a:hover:not(.active)
        {
            background-color: #ddd;
        }
        .flex b
        {
            padding-left: 40%;
        }

        #info
        {
            padding-left: 10%;
        }
    </style>
@endsection

@section('content')
    <div class="flex justify-content-between align-items-center">

        <div>
            <a class="btn btn-success" href="{{ route('bill.create') }}"> New Bill</a>
        
            <b id="info">
                Total Bills 
                <span class="badge bg-danger">{{ count($bills) }} </span>
            </b>
        </div>
        
    </div>

    <hr>

    

    <table>
        <thead>
            <tr>
                <th>Sr.No</th>
                <th>Bill Number</th>
                <th>Bill Date</th>
                <th>User Name</th>
                <th>Products</th>
                <th>Total Bill</th>
                <th>Actions</th>
            </tr>
        </thead>

        @php( $i = 1)
        
        @foreach ($bills as $bill )
            <tbody>
                <tr>

                    <td> {{ $i++ }}</td>
                    <td> {{ $bill->BillNumber }}</td>
                    <td> {{ Carbon\Carbon::parse($bill->created_at)->diffForHumans() }}</td>
                    <td> {{ $bill->user->name }}</td>
                    <td>
                    @foreach ( $bill->products as $product)
                        <li>{{ $product->ProductName ?? " There is no products"}}</li>
                    @endforeach
                    </td>
                    <td> {{ $bill->total }}</td>
                    <td >
                        <a href="{{ route('bill.delete' , $bill->id ) }}" onclick="return confirm('Are you sure you want to delete all Pictures !!')" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            </tbody>
        @endforeach
    </table>

@endsection
