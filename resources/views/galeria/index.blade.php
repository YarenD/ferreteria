@extends('layouts.app')
@section('content')
<div class="container">
    <div class='row'>
            @if($images->count())
                @foreach($images as $image)
                <div class='column'>
                    <img class="ml-2" alt="" width="220" height="190" src="/storage/productos_fotos/{{ $image->foto }}" />
                    <div class='text-center'>
                        <small class='text-muted'>{{ $image->nombre }}</small>
                    </div>
                </div>
                @endforeach
            @endif
    </div>
    </div>
@endsection
