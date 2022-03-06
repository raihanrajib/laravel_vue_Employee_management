@extends('layouts.main')

@section('content')

 <div class="row">
    <div class="card mx-auto">            
        <div class="card-header">
            @if(session('message'))
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{session('message')}}
                </div>
            @endif
            <div class="row">
                <div class="col-8">
                    <form method="GET" action="{{ route('cities.index') }}">
                        <div class="form-row align-items-center">
                            <div class="col">
                                <input type="search" name="search" class="form-control mb-2" id="inlineFormInput"
                                    placeholder="State name">
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">
                                <i class="fas fa-search"></i>
                            </button>                       
                        </div>
                    </form>
                </div>
                <div class="col-4">
                    <a href="{{ route('cities.create') }}" class="btn btn-primary mb-2  float-right">Add new</a>
                </div>
            </div>

            
        </div>
        <div class="card-body">            
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">State</th>
                    <th scope="col">City</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($cities as $city)
                <tr>
                    <td>{{ $city->id }}</td>
                    <td>{{ $city->state->name }}</td>
                    <td>{{ $city->name }}</td>
                    <td class="d-flex">
                        <a href="{{ route('cities.edit', $city->id) }}" class="btn btn-success mr-2">Edit</a>
                        <form method="POST" action="{{ route('cities.destroy',$city->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                {{ __('Delete') }}
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                
                </tbody>
            </table>    
        </div>   
    </div>
 </div>
@endsection

