@extends('user.layouts.app', [])

@section('title', 'My Orders')

@section('content')
<div class="section section-nude">
    <div class="container">
        <h3 class="section-title">My Orders</h3>

        <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
                <h4 class="title"><small>List of Orders</small></h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Total of Items</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                            <tr>
                                <td class="text-center">{{ $order->id }}</td>
                                <td>{{ $order->qty }}</td>
                                <td>₱{{ number_format($order->total,2) }}</td>
                                <td>{{ ucFirst($order->status) }}</td>
                                <td class="td-actions text-right">
                                    <a href="{{ route('order.show', $order) }}" data-toggle="tooltip" data-placement="top" title
                                        data-original-title="View Order" class="btn btn-info btn-link btn-sm">
                                        View
                                    </a>
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
