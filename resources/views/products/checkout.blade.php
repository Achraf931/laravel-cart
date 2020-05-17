@extends('layouts.app')

@section('content')
    <div class="container wrapper">
        <div class="row cart-body">
            <form class="form-horizontal" method="post" action="/checkout">
                @csrf
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                    <!--REVIEW ORDER-->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Review Order <div class="pull-right"><small><a class="afix-1" href="{{url('/cart')}}">Edit Cart</a></small></div>
                        </div>
                        <div class="panel-body">
                            @foreach(session('cart') as $id => $details)
                                <div class="form-group">
                                    <div class="col-sm-3 col-xs-3">
                                        <img class="img-responsive" src="{{$details['image']}}" />
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="col-xs-12">{{$details['title']}}</div>
                                        <div class="col-xs-12"><small>Quantity:<span>{{$details['quantity']}}</span></small></div>
                                    </div>
                                    <div class="col-sm-3 col-xs-3 text-right">
                                        <h6>{{'Total of quantity: ' . $details['price'] * $details['quantity']}}<span>€</span></h6>
                                    </div>
                                </div>
                            @endforeach
                            <div class="form-group"><hr /></div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Order Total</strong>
                                    <div class="pull-right"><span>{{$details['price'] * $details['quantity']}}</span><span>€</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--REVIEW ORDER END-->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-heading">Address</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-6 col-xs-12">
                                    <strong>Name:</strong>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Address:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Additional info:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="additional" class="form-control" value="{{ old('additional') }}"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>City:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" value="{{ old('city') }}"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Zip / Postal Code:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="zipcode" class="form-control @error('zipcode') is-invalid @enderror" value="{{ old('zipcode') }}"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Email:</strong></div>
                                <div class="col-md-12"><input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"/></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Password:</strong></div>
                                <div class="col-md-12"><input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}"/></div>
                            </div>
                        </div>
                    </div>
                    <!--SHIPPING METHOD END-->
                    <!--CREDIT CART PAYMENT-->
                    <div class="panel panel-info">
                        <div class="panel-heading"><span><i class="glyphicon glyphicon-lock"></i></span> Secure Payment</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12"><strong>Credit Card Number:</strong></div>
                                <div class="col-md-12"><input type="text" name="cardNumber" class="form-control @error('cardNumber') is-invalid @enderror" value="{{ old('cardNumber') }}"/></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Card CVV:</strong></div>
                                <div class="col-md-12"><input type="password" class="form-control @error('codeCvv') is-invalid @enderror" value="{{ old('codeCvv') }}" name="codeCvv"/></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <strong>Expiration Date</strong>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control @error('month') is-invalid @enderror" name="month">
                                        <option value="">Month</option>
                                        @for($i = 0; $i < 13; $i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control @error('year') is-invalid @enderror" name="year">
                                        <option value="">Year</option>
                                        @for($i = 2015; $i < 2026; $i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <span>Pay secure using your credit card.</span>
                                </div>
                                <div class="col-md-12">
                                    <ul class="cards">
                                        <li class="visa hand">Visa</li>
                                        <li class="mastercard hand">MasterCard</li>
                                        <li class="amex hand">Amex</li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <button type="submit" class="btn btn-primary btn-submit-fix">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--CREDIT CART PAYMENT END-->
                </div>

            </form>
        </div>
        <div class="row cart-footer">

        </div>
    </div>
@endsection
