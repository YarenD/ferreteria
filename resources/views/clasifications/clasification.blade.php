@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mb-2">
        <div class="col-lg-12">
        <a href="{{ route('clasifications.create')}}" class="btn btn-info float-right">New clasification</a>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <td>Name</td>
                <td>Description</td>
                <td>Color</td>
                <td>Products</td>
                <td colspan="3">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($clasifications as $clasification)
            <tr>
                <td>{{ $clasification->nombre }}</td>
                <td>{{ $clasification->descripcion }}</td>
                <td><h4><span class="badge" style="background-color: {{ $clasification->color }}">{{ $clasification->color }}</span></h4></td>
                <td>{{ $clasification->products->count() }}</td>
                <td><a href="{{ route('clasification.edit',$clasification->id) }}" class="btn btn-primary">Edit</a></td>
                <td><form action="{{ route('clasification.destroy',$clasification->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="col-sm-12">

    @if(session()->get('success'))
        <div class="alert alert-success">
        {{ session()->get('success') }}
        </div>
    @endif
    </div>
</div>
@endsection