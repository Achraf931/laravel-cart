@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-header">{{$product->title}}</div>

        <div class="card-columns" style="margin-top: 20px">
            @if($product)
                <img class="card-img-top" src="{{$product->image}}" alt="{{$product->title}}">
                <form action="{{ url('/product/'. $product->id) }}" method="post" class="card-body">
                    @csrf
                    <h5 class="card-title">{{$product->title}}</h5>
                    <p class="card-text">{{$product->description}}</p>
                    <select name="quantity" class="browser-default custom-select">
                        <option selected>Quantity</option>
                        @for($i = 0; $i < 11; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                    <p class="btn-holder"><button type="submit" class="btn btn-warning btn-block text-center" role="button">Add to cart</button></p>
                </form>
            @endif
        </div>
        @if(session('success'))
            <div class="alert alert-success" role="alert">{{session('success')}}</div>
        @endif
    </div>
@endsection
