@extends('admin.layouts.app', [
'activeNav' => 'products'
])

@section('title')
{{ ucFirst($product->name) }}
@endsection

@section('header-content')
    @component('admin.layouts.breadcrumbs')
    <a class="navbar-brand" href="{{ route('admin.product.index') }}">{{ __('Products') }}</a>
    @endcomponent
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <form>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                {{ ucFirst($product->name) }}
                            </h4>
                        </div>
                        <div class="card-content">
                            <div class="form-horizontal">
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Author</label>
                                        <div class="col-sm-10">
                                            {{ $product->author }}
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Price</label>
                                        ₱{{ number_format($product->price,2) }}
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Media</label>
                                        {{ $product->getFirstMedia(\App\Enums\MediaGroup::PRODUCTS)->file_name }}
                                        <audio controls controlsList="nodownload">
                                            <source src="{{ $product->getFirstMedia(\App\Enums\MediaGroup::PRODUCTS)->getFullUrl() }}">
                                            Your browser does not support the audio element.
                                        </audio>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div> <!-- end card -->
                </div> <!--  end col-md-6  -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-content">
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Status</label>
                                    <div class="col-sm-10">
                                        {{ ucfirst($product->status) }}
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div> <!-- end card -->
                </div> <!--  end col-md-6  -->
            </form>
        </div> <!-- end row -->
    </div>
</div>
@endsection

@push('scripts')
@endpush
