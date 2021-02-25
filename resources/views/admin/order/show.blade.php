@extends('admin.layouts.app', [
'activeNav' => 'dashboard'
])

@section('title')
Order #{{ str_pad($order->id, 8, "0", STR_PAD_LEFT) }}
@endSection

@section('header-content')
    @component('admin.layouts.breadcrumbs')
    <a class="navbar-brand" href="{{ route('admin.index') }}">{{ __('Orders') }}</a>
    @endcomponent
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4 class="title">Order #{{ str_pad($order->id, 8, "0", STR_PAD_LEFT) }}</h4>

                <div class="card">
                    <div class="card-header">
                        <form method="POST" action="{{ route('admin.order.update', $order) }}">
                        @method('PUT')
                        @csrf
                        @if ($order->status == \App\Enums\OrderStatus::PENDING)
                        <button type="submit" class="btn btn-wd btn-success">
                            <span class="btn-label">
                                <i class="ti-check"></i>
                            </span>
                             Complete Order
                        </button>
                        @else
                        <button type="button" class="btn btn-wd btn-primary">
                            <span class="btn-label">
                                <i class="ti-thumb-up"></i>
                            </span>
                             Order Completed
                        </button>
                        @endif
                        </form>
                    </div>
                    <div class="card-content">
                        <div class="toolbar">
                            <!--Here you can write extra buttons/actions for the toolbar-->
                        </div>
                        <div class="fresh-datatables">
                            <table id="datatable-orders" class="table table-striped table-no-bordered table-hover"
                                cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Author</th>
                                        <th>Price</th>
                                        <th colspan="2" class="text-center">Media</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($order->items as $item)
                                    <tr>
                                        <td>{{ $item->product->name }}</td>
                                        <td>{{ $item->product->author }}</td>
                                        <th>₱{{ number_format($item->product->price,2) }}</th>
                                        <td class="text-center">
                                            <audio controls controlsList="nodownload">
                                                <source src="{{ $item->product->getFirstMedia(\App\Enums\MediaGroup::PRODUCTS)->getFullUrl() }}">
                                                Your browser does not support the audio element.
                                            </audio>
                                        </td>
                                        <td></td>
                                    </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div><!--  end card  -->
            </div> <!-- end col-md-12 -->
        </div> <!-- end row -->
    </div>
</div>
@endsection

@push('scripts')
@endpush
