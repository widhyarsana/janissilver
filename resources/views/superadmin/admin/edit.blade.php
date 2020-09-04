@extends('layouts.master')

@section('title', 'Edit Admin')

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
                            <a href="{{ route('superadmin.admin.index') }}" class="breadcrumb-item">Admin</a>
							<span class="breadcrumb-item active">Edit Admin</span>
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
                <div class="card-header text-center">

                        <h5 class="card-title">Edit Admin</h5>

                </div>

                <div class="card-body">
                    <form action="{{ route('superadmin.admin.update', [$admin]) }}" method="POST">
                       @csrf
                        <div class="form-group">
                            <label>Nama:</label>
                            <input type="text" class="form-control "  name="name" value="{{ $admin->name }}">
                        </div>
                        @error('name')
                        <div class="alert alert-warning alert-rounded alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                            {{ $message }}
                        </div>

                        @enderror

                        <div class="form-group">
                            <label>Username:</label>
                            <input type="text" class="form-control" value="{{ $admin->username }}" name="username">
                        </div>
                        @error('username')
                        <div class="alert alert-warning alert-rounded alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                            {{ $message }}
                        </div>

                        @enderror
                        <div class="form-group">
                            <label>Password:</label>
                            <input type="password" class="form-control"  name="password">
                        </div>
                        @error('password')
                        <div class="alert alert-warning alert-rounded alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                            {{ $message }}
                        </div>

                        @enderror
                        <div class="form-group">
                            <label>E-Mail:</label>
                            <input type="text" class="form-control" value="{{ $admin->email }}" name="email">
                        </div>
                        @error('email')
                        <div class="alert alert-warning alert-rounded alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                            {{ $message }}
                        </div>

                        @enderror
                        <div class="form-group">
                            <label>Telephone:</label>
                            <input type="text" class="form-control" value="{{ $admin->phone }}" name="phone" name="phone">
                        </div>
                        @error('phone')
                        <div class="alert alert-warning alert-rounded alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                            {{ $message }}
                        </div>

                        @enderror


                        <div class="form-group">
                            <label>Alamat:</label>
                            <input type="text" class="form-control" value="{{ $admin->address }}" name="address">
                        </div>
                        @error('address')
                        <div class="alert alert-warning alert-rounded alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                            {{ $message }}
                        </div>

                        @enderror
                        <div class="form-group">
                            <label class="d-block">Jenis Kelamin:</label>

                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" value="1" class="form-input-styled" name="gender" {{ $admin->gender == 1 ? 'checked':'' }} data-fouc>
                                    Laki-Laki
                                </label>
                            </div>

                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" value="0" class="form-input-styled" name="gender" {{ $admin->gender == 0 ? 'checked':'' }} data-fouc>
                                    Perempuan
                                </label>
                            </div>
                        </div>
                        @error('gender')
                        <div class="alert alert-warning alert-rounded alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                            {{ $message }}
                        </div>

                        @enderror

                        <div class="text-right">
                            <a href="{{ route('superadmin.admin.index') }}" class="btn btn-danger"><i class="icon-backward mr-2"></i>Kembali</a>
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

