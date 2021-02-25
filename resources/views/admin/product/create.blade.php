@extends('admin.layouts.app', [
'activeNav' => 'products'
])

@section('title', 'Create Product')

@section('header-content')
    @component('admin.layouts.breadcrumbs')
    <a class="navbar-brand" href="{{ route('admin.product.index') }}">{{ __('Products') }}</a>
    @endcomponent
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <form method="POST" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                {{ __('Create New Product') }}
                            </h4>
                        </div>
                        <div class="card-content">
                            <div class="form-horizontal">
                                <fieldset>
                                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                        <label class="col-sm-2 control-label">Name</label>
                                        <div class="col-sm-10">
                                            <input name="name" type="text" value="{{ old('name') }}" class="form-control" />
                                            @error('name')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="form-group {{ $errors->has('author') ? 'has-error' : '' }}">
                                        <label class="col-sm-2 control-label">Author</label>
                                        <div class="col-sm-10">
                                            <input name="author" type="text" value="{{ old('author') }}" class="form-control" />
                                            @error('author')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                                        <label class="col-sm-2 control-label">Price</label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon">₱</span>
                                                <input name="price" type="text" class="form-control" value="{{ old('price') }}">
                                            </div>
                                            @error('price')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="form-group {{ $errors->has('media') ? 'has-error' : '' }}">
                                        <label class="col-sm-2 control-label">Media</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="media" class="form-control" accept="audio/*"/>
                                            @error('media')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
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
                                <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                                    <label class="col-sm-2 control-label">Status</label>
                                    <div class="col-sm-10">
                                        <select name="status" class="form-control">
                                            <option value="">-- Choose Status --</option>
                                            <option value="public" {{ old('status') == 'public' ? 'selected' : '' }}>Public</option>
                                            <option value="private" {{ old('status') == 'private' ? 'selected' : '' }}>Private</option>
                                            <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                                        </select>
                                        @error('status')<p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                </div>
                            </fieldset>
                            <button type="submit" class="btn btn-fill btn-info ">Submit</button>
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
