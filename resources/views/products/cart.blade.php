@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="alert alert-success" role="alert">{{session('success')}}</div>
    @endif
    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:8%">Quantity</th>
            <th style="width:10%"></th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>

        <?php $total = 0 ?>

        @if(session('cart'))
            @foreach(session('cart') as $id => $details)

                <?php $total += $details['price'] * $details['quantity'] ?>

                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{ $details['image'] }}" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['title'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">${{ $details['price'] }}</td>
                    <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                    <form method="post" action="{{url('/updateCart/' . $id)}}">
                        @csrf
                        <td class="actions" data-th="">
                            <input type="number" name="quantity" value="{{ $details['quantity'] }}" class="form-control quantity" />
                        </td>
                        <td class="actions" data-th="">
                            <button value="patch" name="_method" class="btn btn-info btn-sm update-cart" data-id="{{ $id }}">Modifier</button>
                        </td>
                    </form>
                    <td>
                        <form method="post" action="{{url('/removeFromCart/' . $id)}}">
                            @csrf
                            <button value="delete" name="_method" class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <div class="alert alert-primary" role="alert">
                Votre panier est vide
            </div>
        @endif

        </tbody>
        <tfoot>
        <tr class="visible-xs">
            <td class="text-center"><strong>Total {{ $total }}</strong></td>
        </tr>
        <tr>
            <td><a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i>Continue Shopping</a></td>
            <td><a href="{{ url('/checkout') }}" class="btn btn-success"><i class="fa fa-angle-left"></i>Payer</a></td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total ${{ $total }}</strong></td>
        </tr>
        </tfoot>
    </table>
@endsection
