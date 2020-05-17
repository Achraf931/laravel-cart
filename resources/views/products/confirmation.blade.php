@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Récapitulatif de votre commande</h3>
        @if($user)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Nom: {{$user->name}}</h5>
                    <p class="card-text">{{$user->email}}</p>
                    <p class="card-text">Adresse: {{$user->address}} {{$user->city}} {{$user->zipcode}}</p>
                </div>
            </div>

            @if($products)
            <div class="card" style="width: 18rem;">
                @foreach($products as $product)
                <div class="card-body">
                    <h5 class="card-title">Nom du produit: {{$product['title']}}</h5>
                    <p class="card-text">Quantité: {{$product['quantity']}}</p>
                    <p class="card-text">Couleur: Noir</p>
                    <p class="card-text">Prix: {{$product['price']}}</p>
                </div>
                @endforeach
            </div>
            @endif
        @endif
    </div>
@endsection
