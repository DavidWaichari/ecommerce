@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Products</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Products</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Products List</h3>
                        <div class="col-md-2">
                            <a href="/admin/products/create" type="button" class="btn btn-block btn-info btn-md">Add Product</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                            <thead>
                                <tr>
                                    <th class="text-center">SNO</th>
                                    <th>Name</th>
                                    <th>Part No</th>
                                    <th>Series</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Processor</th>
                                    <th>Selling Price</th>
                                    <th>Discount SP</th>
                                    <th>In Stock</th>
                                    <th>Description</th>
                                    {{-- <th>Is Featured</th> --}}
                                    <th>Is Sold</th>
                                    <th>Status</th>
                                    <th>Condition</th>
                                    <th>Updated By</th>
                                    <th>Updated At</th>
                                    <th>Link</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td class="text-center">{{ $loop->index + 1 }}</td>
                                        <td><a href="{{route('admin.products.show', $product->slug)}}">{{ $product->name }}</a></td>
                                        <td>{{ $product->part_number }}</td>
                                        <td>{{ $product->series }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->brand->name }}</td>
                                        <td>
                                            @if ($product->processor)
                                            {{ $product->processor->name }}
                                            @else
                                            No Processor
                                            @endif
                                        </td>
                                        <td>{{ $product->selling_price }}</td>
                                        <td>{{ $product->discount_price }}</td>
                                        <td>{{ $product->in_stock }}</td>
                                        <td>{{ $product->description }}</td>
                                        {{-- <td>{{ $product->is_featured == true? "Yes": "No" }}</td> --}}
                                        <td>{{ $product->is_sold == true? "Yes": "No" }}</td>
                                        <td>{{ $product->status }}</td>
                                        <td>{{ $product->condition }}</td>
                                        <td>{{ $product->updatedBy->full_name }}</td>
                                        <td>{{ $product->updated_at }}</td>
                                        <td>{{ $product->link }}</td>
                                        <td>
                                            <a href="/admin/products/{{ $product->slug }}/edit" class="btn btn-sm btn-primary">Edit</a>
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-default-{{ $product->slug }}">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>SNO</th>
                                    <th>Name</th>
                                    <th>Part No</th>
                                    <th>Series</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Processor</th>
                                    <th>Selling Price</th>
                                    <th>Discount SP</th>
                                    <th>In Stock</th>
                                    <th>Description</th>
                                    {{-- <th>Is Featured</th> --}}
                                    <th>Is Sold</th>
                                    <th>Status</th>
                                    <th>Condition</th>
                                    <th>Updated By</th>
                                    <th>Updated At</th>
                                    <th>Link</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    @foreach ($products as $product)
                        <div class="modal fade" id="modal-default-{{ $product->slug }}" tabindex="-1" role="dialog" aria-labelledby="modal-default-label-{{ $product->slug }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-default-label-{{ $product->slug }}">Delete Category</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete the product "{{ $product->name }}"? This will delete all the corresponding transanctions</p>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="/admin/products/{{ $product->slug }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- /.card-body -->
                </div>
            </div><!-- /.container-fluid -->
        </div>
    </section>
    <!-- /.content -->
@endsection

@section('scripts')
<script>
    $(function () {
        $('#example1').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
        });
    });
</script>
@endsection
