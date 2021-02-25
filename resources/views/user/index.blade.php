@extends('user.layouts.app', [])

@section('title', 'Home')

@section('content')
<div class="section section-nude">
    <div class="container">
        <h3 class="section-title">Find what you need</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="products">
                    <div class="row">
                        @forelse ($products as $product)
                        <div class="col-md-4 col-sm-4">
                            <div class="card card-product card-plain">
                                <div class="card-image">
                                    <a href="#paper-kit">
                                        <audio controls controlsList="nodownload">
                                            <source src="{{ $product['media']->getFullUrl() }}" type="audio/ogg">
                                            Your browser does not support the audio element.
                                        </audio>
                                    </a>
                                    <div class="card-body">
                                        <div class="card-description">
                                            <h5 class="card-title">{{ $product['name'] }}</h5>
                                            <p class="card-description text-primary">
                                                {{ $product['author'] }}
                                            </p>
                                        </div>
                                        <div class="price">
                                            <h5>₱{{ number_format($product['price'],2) }}</h5>
                                        </div>
                                        @if ($cartItems->contains('product_id', $product['id']))
                                        <a class="btn btn-round btn-default add-to-cart" href="#" >
                                            <i class="nc-icon nc-cart-simple"></i> Already Added to Cart
                                        </a>
                                        @elseif (in_array($product['id'], $ownedItems))
                                        <a class="btn btn-round btn-success add-to-cart" href="#" >
                                            <i class="nc-icon nc-check-2"></i> Purchased
                                        </a>
                                        @else
                                        <a data-id="{{ $product['id'] }}" class="btn btn-round btn-danger add-to-cart" href="{{ route('addToCart', $product['id']) }}" >
                                            <i class="nc-icon nc-cart-simple"></i> Add To Cart
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <h5 class="card-title text-info text-center">
                            There are no products as of the moment. <br>
                            Contact our Admin to add products!
                        </h5>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// $(".add-to-cart").click(function(event){
//     event.preventDefault();
//     let addToCartURL =  "api/" + $(this).data("id") + "/add-to-cart"
//     axios({
//         url: addToCartURL,
//         method: 'post',
//     }).then(response => {
//         var cartCount = $("#item-count").html()
//         let total = cartCount === "" ? 0 : parseInt($('#item-count').text());
// 	    $('#item-count').html(total + 1);
//     });
// });
</script>
@endpush
