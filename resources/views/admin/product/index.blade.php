@extends('admin.layouts.app', [
    'activeNav' => 'products'
])

@section('title', 'Products')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4 class="title">List of Products</h4>

                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('admin.product.create') }}" class="btn btn-wd btn-success">
                            <span class="btn-label">
                                <i class="ti-plus"></i>
                            </span>
                            Create New
                        </a>
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
                                        <th>Product ID</th>
                                        <th>Name</th>
                                        <th>Author</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                    <tr>
                                        <td>{{ str_pad($product->id, 8, "0", STR_PAD_LEFT) }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->author }}</td>
                                        <td>{{ $product->status }}</td>
                                        <td>
                                            @component('admin.layouts.tables.icons', ['route' => 'admin.product', 'model' => $product])
                                            <!-- PUT OTHER ICONS HERE IF ANY-->
                                            @endcomponent
                                        </td>
                                    </tr>
                                    @endforeach
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
<script type="text/javascript">
    $(document).ready(function() {
	        $('#datatable-orders').DataTable({
	            "pagingType": "full_numbers",
	            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                ordering: false,
	            responsive: true,
	            language: {
	            search: "_INPUT_",
		            searchPlaceholder: "Search records",
		        }
	        });
	    });
</script>
@endpush
