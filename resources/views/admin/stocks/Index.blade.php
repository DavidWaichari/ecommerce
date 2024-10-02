@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Stocks</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Stocks</li>
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
                        <h3 class="card-title">Stock List</h3>
                        <div class="col-md-2">
                            <a href="/admin/stocks/create" type="button" class="btn btn-block btn-info btn-md">Add Stock</a>
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
                                    <th>Date</th>
                                    <th>Total Amount</th>
                                    <th>Status</th>
                                    <th>Receipt</th>
                                    <th>Supplier</th>
                                    <th>Updated By</th>
                                    <th>Updated At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($stocks as $stock)
                                    <tr>
                                        <td class="text-center">{{ $loop->index + 1 }}</td>
                                        <td>{{ $stock->stock_date }}</td>
                                        <td>{{ $stock->total_amount }}</td>
                                        <td>{{ $stock->status }}</td>
                                        <td>
                                            @if($stock->receipt)
                                                <a href="/admin/stocks/{{$stock->id }}/download-receipt" class="btn btn-sm btn-success">Download Receipt</a>
                                            @else
                                                <span>Unavailable</span>
                                            @endif
                                        </td>
                                        <td>{{ $stock->supplier ? $stock->supplier->name : 'No Supplier' }}</td>
                                        <td>{{ $stock->updatedBy ? $stock->updatedBy->full_name : 'N/A' }}</td>
                                        <td>{{ $stock->updated_at }}</td>
                                        <td>
                                            <a href="/admin/stocks/{{ $stock->id }}" class="btn btn-sm btn-primary">Manage</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>SNO</th>
                                    <th>Date</th>
                                    <th>Total Amount</th>
                                    <th>Status</th>
                                    <th>Receipt</th>
                                    <th>Supplier</th>
                                    <th>Updated By</th>
                                    <th>Updated At</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
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
