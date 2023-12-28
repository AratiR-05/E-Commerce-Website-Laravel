@extends('backend.master')

@section('body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Product</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="{{ url('admin/product') }}">Product</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Product Details</h3>
                                <a href="{{ url('admin/product/add') }}" style="float: right" class="btn btn-primary">Add
                                    New
                                    +</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Pro-id</th>
                                            <th>Category</th>
                                            <th>Name</th>
                                            <th>type</th>
                                            <th>Size</th>
                                            <th>Color</th>
                                            <th>Price</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @inject('catgName', 'App\Http\Controllers\backend\productController')
                                    @inject('typName', 'App\Http\Controllers\backend\productController')
                                    @inject('sizeName', 'App\Http\Controllers\backend\productController')
                                    @inject('clrName', 'App\Http\Controllers\backend\productController')
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($datas as $list)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $list->proid }}</td>
                                                <td>{{ $catgName::ctgshow($list->category) }}</td>
                                                <td>{{ $list->name }}</td>
                                                <td>{{ $typName::typshow($list->type) }}</td>
                                                <td>{{ $sizeName::sizeshow($list->size) }}</td>
                                                <td>{{ $clrName::clrshow($list->color) }}</td>
                                                <td>{{ $list->price }}</td>
                                                <td>{{ $list->description }}</td>
                                                <td><img src="{{ asset('storage/app') }}/{{ $list->imgpath }}"
                                                        width="20%" /></td>
                                                <td>
                                                    <a href="{{ url('admin/product/update') }}/{{ $list->id }}"
                                                        title="Edit">
                                                        <img src="{{ asset('public/backend/icon/edit.png') }}"
                                                            alt="">
                                                    </a>
                                                    &nbsp;&nbsp;

                                                    <a href="{{ url('admin/product/delete') }}/{{ $list->id }}"
                                                        title="Delete">
                                                        <img src="{{ asset('public/backend/icon/delete.png') }}"
                                                            alt="">
                                                    </a>

                                                </td>
                                            </tr>
                                            @php
                                                $i++;
                                            @endphp
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('public/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('public/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush
@push('js')
    <!-- Bootstrap 4 -->
    <script src="{{ asset('public/backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('public/backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('public/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('public/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('public/backend/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('public/backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('public/backend/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('public/backend/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('public/backend/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('public/backend/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('public/backend/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('public/backend/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>



    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush
