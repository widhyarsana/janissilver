@extends('layouts.master')

@section('title', 'Tambah Produk')

@section('style')

    <!-- Theme JS files -->
	<script src="/global_assets/js/plugins/forms/selects/select2.min.js"></script>
	<script src="/global_assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script src="/assets/js/app.js"></script>
	<script src="/global_assets/js/demo_pages/form_layouts.js"></script>
	<!-- /theme JS files -->



@endsection

@section('header')
    <!-- Page header -->
			<div class="page-header page-header-light">


				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
                            <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                            <a href="{{ route('admin.product.index') }}" class="breadcrumb-item">Produk</a>
							<span class="breadcrumb-item active">Tambah Produk</span>
						</div>

						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

				</div>
			</div>
			<!-- /page header -->
@endsection

@section('content')
<!--Content area -->
<div class="content">

    <div class="content">

      <!-- Basic layout-->

     <div class="row">
         <div class="col-md-2"></div>
         <div class="col-md-8" >
            <div class="card">
                <div class="card-header text-center ">

                        <h5 class="card-title">Tambah Produk</h5>



                </div>

                <div class="card-body">
                    <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                       @csrf
                        <div class="form-group">
                            <label>Nama:</label>
                            <input type="text" class="form-control " placeholder="Masukan Nama" name="name" value="{{ old('name') }}">
                        </div>
                        @error('name')
                        <div class="alert alert-warning alert-rounded alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                            {{ $message }}
                        </div>

                        @enderror

                        <div class="form-group">
                            <label>Bahan:</label>
                            <input type="text" class="form-control" placeholder="Masukan Bahan" name="materials" value="{{ old('materials') }}">
                        </div>
                        @error('materials')
                        <div class="alert alert-warning alert-rounded alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                            {{ $message }}
                        </div>

                        @enderror
                        <div class="form-group">
                            <label>Variasi:</label>
                            <input type="text" class="form-control" placeholder="Masukan Variasi" name="varian" value="{{ old('varian') }}">
                        </div>
                        @error('varian')
                        <div class="alert alert-warning alert-rounded alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                            {{ $message }}
                        </div>

                        @enderror
                        <div class="form-group">
                            <label>Harga:</label>
                            <input type="number" class="form-control" placeholder="Masukan Harga" name="price" value="{{ old('price') }}">
                        </div>
                        @error('price')
                        <div class="alert alert-warning alert-rounded alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                            {{ $message }}
                        </div>
                        @enderror

                        <div class="form-group">
                            <label>Gambar:</label>
                            <input type="file" class="form-control"  name="image">
                        </div>
                        @error('a')
                        <div class="alert alert-warning alert-rounded alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                            {{ $message }}
                        </div>
                        @enderror

                        <div class="text-right">
                            <a href="{{ route('admin.product.index') }}" class="btn btn-danger"><i class="icon-backward mr-2"></i>Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan<i class="icon-paperplane ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
         </div>
     </div>
    <!-- /basic layout -->



    </div>

</div>
<!--/content area -->
@endsection

