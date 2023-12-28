@extends('backend.master')
@section('body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-1">
                    <div class="col-sm-12">
                        <h1>Product</h1>
                    </div>
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="{{ url('admin/product') }}">Product</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Product</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('addproduct') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    {{-- Product Id
                                    <div class="form-group">
                                        <label for="Product-Id">Product Id</label>
                                        <input type="text" class="form-control" name="proid" id="Product id"
                                            placeholder="Product ID">
                                    </div> --}}

                                    {{-- Category --}}
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control" name="category">
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Name --}}
                                    <div class="form-group">
                                        <label for="Product-name">Name</label>
                                        <input type="text" class="form-control" name="name" id="Product Name"
                                            placeholder=" Product Name">
                                        @error('name')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Type --}}
                                    <div class="form-group">
                                        <label>Type</label>
                                        <select class="form-control" name="type">
                                            <option value="">Select Type</option>
                                            @foreach ($types as $type)
                                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('type')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Size --}}
                                    <div class="form-group">
                                        <label>Size</label>
                                        <select class="form-control" name="size">
                                            <option value="">Select Size</option>
                                            @foreach ($sizes as $size)
                                                <option value="{{ $size->id }}">{{ $size->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('size')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Color --}}
                                    <div class="form-group">
                                        <label>Color</label>
                                        <select class="form-control" name="color">
                                            <option value="">Select Color</option>
                                            @foreach ($colors as $color)
                                                <option value="{{ $color->id }}">{{ $color->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('color')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Price --}}
                                    <div class="form-group">
                                        <label for="Price">Price</label>
                                        <input type="text" class="form-control" name="price" id="price"
                                            placeholder="Enter Price">
                                        @error('price')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Description --}}
                                    <div class="form-group">
                                        <label for="Description">Description</label> <br>
                                        <textarea name="description" id="description" class="form-control"></textarea>
                                        @error('description')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Image Path --}}
                                    <div class="form-group">
                                        <label for="imgpath">Image</label>
                                        <input type="file" class="form-control" name="imgpath" id="imgpath"
                                            placeholder="Image">

                                    </div>

                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
