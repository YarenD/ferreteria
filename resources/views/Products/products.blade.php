@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mb-2">
        <div class="col-lg-12">
        <a href="{{ route('products.create')}}" class="btn btn-info float-right">New product</a>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <td>SKU</td>
                <td>Name</td>
                <td>Clasification</td>
                <td>Price</td>
                <td colspan="3">Acción</td>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->sku }}</td>
                <td>{{ $product->nombre }}</td>
                <td><h4><span class="badge" style="background-color: {{ $product->clasification['color'] }}">{{ $product->clasification['nombre'] }}</span></h4></td>
                <td>$ {{ $product->precio }}</td>
                <td><a href="{{ route('products.edit',$product->id) }}" class="btn btn-primary">Edit</a></td>
                <td><form action="{{ route('products.destroy',$product->id)}}" method="post">
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