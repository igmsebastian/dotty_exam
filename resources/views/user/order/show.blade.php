@extends('user.layouts.app', [])

@section('title', 'My Order Items')

@section('content')
<div class="section section-nude">
    <div class="container">
        <h3 class="section-title">My Order Items</h3>

        <div class="row">
            <div class="col-md-12 ml-auto mr-auto">
                <h4 class="title"><small>Order Items</small></h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">Name</th>
                                <th>Author</th>
                                <th>Price</th>
                                <th  class="text-center text-danger" colspan="2">* Downloadable Once Admin Completed the Order *</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($order->items as $item)
                            <tr>
                                <td class="text-center">{{ $item->product->name }}</td>
                                <td>{{ $item->product->author }}</td>
                                <td>₱{{ number_format($item->product->price,2) }}</td>
                                <td></td>
                                <td class="td-actions text-center">
                                    @if ($item->order->status == \App\Enums\OrderStatus::COMPLETED)
                                    <form method="POST" action="{{ route('order.item.download', ['order' => $order, 'product' => $item->product]) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                        Download
                                    </button>
                                    </form>
                                    @else
                                    <audio controls controlsList="nodownload">
                                        <source src="{{ $item->product->getFirstMedia(\App\Enums\MediaGroup::PRODUCTS)->getFullUrl() }}">
                                        Your browser does not support the audio element.
                                    </audio>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <h5 class="card-title text-danger text-center">
                                There are no orders as of the moment.
                            </h5>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
@endpush
