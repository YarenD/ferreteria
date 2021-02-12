@extends('layouts.admin')
@section('styles')
    <style>
        .wrapper-gallery {
            position: relative;
            max-width: 64em;
            height: auto;
            margin: 0 auto;
            padding: 1em 1em;
        }

        ul.gallery {
            display: flex;
            flex-flow: row wrap;
            justify-content: space-around;
            gap: 0.25em 0.5em;
            margin-top: 1.25em;
            list-style: none;
        }

        ul.gallery > li {
            position: relative;
            flex: 1 1 16em;
            background-color: #fffaf0;
        }

        ul.gallery > li::after {
            content: attr(data-caption);
            position: absolute;
            left: 0;
            bottom: 0.2em;
            padding: 0.25em 0.25em;
            border-top: 0.125em solid #fffaf0;
            border-right: 0.125em solid #fffaf0;
            border-radius: 0 0.35em 0 0;
            font-variant: small-caps;
            background-color: #dc143c;
            color: #fff;
        }

        ul.gallery li > img {
            min-width: 50%;
            max-width: 100%;
            height: auto;
        }

        label.gallery {
            margin-right: 0.5em;
            padding: 0.5em 0.75em;
            font-weight: 100;
            background-color: #6495ed;
            color: #fff;
            cursor: pointer;
        }

        input[type="radio"],
        @foreach($products as $product)
            #{{$product->clasification->nombre}}:checked ~ ul li:not(.{{$product->clasification->nombre}}),
        @endforeach
        #others:checked ~ ul li:not(.other) { display: none; }

        #shuffle:checked ~ ul li:first-child { order: 8; }
        #shuffle:checked ~ ul li:nth-child(2) { order: 3; }
        #shuffle:checked ~ ul li:nth-child(3) { order: 6; }
        #shuffle:checked ~ ul li:nth-child(4) { order: 5; }
        #shuffle:checked ~ ul li:nth-child(5) { order: 1; }
        #shuffle:checked ~ ul li:nth-child(6) { order: 7; }
        #shuffle:checked ~ ul li:nth-child(7) { order: 4; }
        #shuffle:checked ~ ul li:last-of-type { order: 2; }

        input[type="radio"]:checked + label { font-weight: 700; }

        p { margin-top: 1.25em; }
    </style>
@endsection

@section('content')
    <div class="card">
        <div class="wrapper-gallery">
            @foreach($clasifications as $key => $clasification)
                <input type="radio" name="gallery" id="{{$clasification->nombre}}" checked /> <label class="gallery" for="{{$clasification->nombre}}">{{$clasification->nombre}}</label>
            @endforeach
            <ul class="gallery">
                @foreach($products as $key => $product)
                    <li class="{{$product->clasification->nombre}}" data-caption="{{$product->nombre}}">
                        <img src="/img/products/{{$product->foto}}" width="512" height="384" alt="{{$product->nombre}}" />
                    </li>
                @endforeach
            </ul>

            </div><!--End of wrapper-->
        <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
        </ul>
        </div>
    </div>
    <!-- /.card -->
@endsection
