@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-header">{{$title}}</div>
        @if($products)

        <div class="card-columns" style="margin-top: 20px">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

                @foreach($products as $product)
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{$product->image}}" alt="{{$product->title}}">
                        <div class="card-body">
                            <h5 class="card-title">{{$product->title}}</h5>
                            <p class="card-text">{{$product->description}}</p>
                            <a href="/product/{{$product->id}}" class="btn btn-primary">Voir</a>
                        </div>
                    </div>
                @endforeach
        </div>
            {{ $products->links() }}
        @endif
    </div>
@endsection
