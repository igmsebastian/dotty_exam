@extends('user.layouts.app', [])

@section('title', 'Checkout')

@section('content')
<div class="section section-brown">
    <div class="container">
        <h3 class="section-title">Checkout</h3>
        <div class="row">
            <div class="col-md-12">
                <h4>Your shopping cart</h4>
            </div>
            <div class="col-md-10 col-md-offset-1">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center"></th>
                                <th></th>
                                <th class="text-right">Price</th>
                                <th class="text-right">Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <td>
                                    <audio controls controlsList="nodownload">
                                        <source src="{{ $item['media']->getFullUrl() }}" type="audio/ogg">
                                        Your browser does not support the audio element.
                                    </audio>
                                </td>
                                <td class="td-product">
                                    <strong>{{ $item['name'] }}</strong>
                                    <p>{{ $item['author'] }}</p>
                                </td>

                                <td class="td-price">
                                    <small>₱</small>{{ $item['price'] }}
                                </td>
                                <td class="td-number text-right">
                                    <small>₱</small>{{ $item['total'] }}
                                </td>
                                <td class="text-right">
                                    <button class="btn btn-danger btn-just-icon"
                                        onclick="event.preventDefault();document.getElementById('cart-delete-data-{{ $item['id'] }}').submit();">
                                        <i class="nc-icon nc-simple-remove"></i>
                                    </button>
                                    <form id="cart-delete-data-{{ $item['id'] }}" method="POST"
                                        action="{{ route('cart.destroy', $item['rowId']) }}" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="1"></td>
                                <td></td>
                                <td class="td-total">
                                    Tax
                                </td>
                                <td class="td-total">
                                    {{ \Cart::tax() }}<small>%</small>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1"></td>
                                <td></td>
                                <td class="td-total">
                                    Total
                                </td>
                                <td class="td-total">
                                    <small>₱</small>{{ \Cart::total() }}
                                </td>
                            </tr>
                            <tr class="tr-actions">
                                <td colspan="3"></td>
                                <td colspan="2" class="text-right">
                                    @auth('user')
                                    <form method="POST" action="{{ route('purchase') }}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-fill btn-lg" {{ \Cart::count() == 0 ? 'disabled' : '' }}> Complete Purchase</button>
                                    </form>
                                    @endauth
                                    @guest('user')
                                    <button type="button" class="btn btn-danger btn-fill btn-lg" data-toggle="modal" data-target="#loginModal" {{ \Cart::count() == 0 ? 'disabled' : '' }}>
                                        Complete Purchase
                                    </button>
                                    @endguest
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@guest('user')
<!-- login modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog modal-register">
        <div class="modal-content">
            <div class="modal-header no-border-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h6 class="text-muted">Welcome</h6>
                <h3 class="modal-title text-center">ECommerce</h3>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('purchase') }}">
                    @csrf
                    <a href="{{ route('register.form') }}" class="btn btn-block btn-round btn-primary"> Register an account for free!</a>
                    <p class="text-center">-OR-</p>
                    <button type="submit" class="btn btn-block btn-round btn-danger"> Checkout as Guest</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endguest
@endsection

@push('scripts')

@endpush
