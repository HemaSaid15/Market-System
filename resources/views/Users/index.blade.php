@extends('layouts.app')


@section('title' , 'All Users')


@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"> All Users </div>

            <table class="table">
                <thead>
                    <tr>
                        
                        <th>User Name</th>
                        <th>User E-mail</th>
                        <th>Address</th>
                        <th>Created At</th>
                        
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($users as $user) 
                        <tr>
                            <td> {{ $user->name }} </td>
                            <td>{{ $user->email }}</td>
                            <td> {{ $user->address }} </td>
                            <td> 
                                @if($user->created_at ==  NULL)
                                    <span class="text-danger"> No Date Set</span> 
                                @else
                                    {{ Carbon\Carbon::parse($user->created_at)->longAbsoluteDiffForHumans() }}
                                @endif
                            </td>
                        </tr> 
                    @endforeach   
                </tbody>
            </table>
        </div>
    </div>
     
@endsection