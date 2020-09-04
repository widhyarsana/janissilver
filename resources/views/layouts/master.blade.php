<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>@yield('title')</title>

	@include('layouts.partials._asset')

	@yield('style')

</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark bg-indigo navbar-static">
		<div class="navbar-brand">
			<a href="{{ route('home') }}" class="d-inline-block">
				<img src="{!! asset('/storage/images/logo1.png') !!}" class="card-img" style="width: 200px; height:30px;" alt="">
				@role('super-admin')
				{{-- <h1>Super Admin</h1> --}}
				<input type="hidden" id="sub" value="superadmin">
				@endrole

				@role('admin')
				{{-- <h1>Admin</h1> --}}
				<input type="hidden" id="sub" value="admin">
				@endrole

				@role('customer')
				{{-- <h1>Customer</h1> --}}
				<input type="hidden" id="sub" value="customer">
				@endrole

			</a>
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>
			</ul>

			<span class="navbar-text ml-md-3">

				Halo, Selamat Datang {{ \Str::ucfirst(auth()->user()->name) }}
			</span>

			<ul class="navbar-nav ml-md-auto">
				@role('customer')
				<li class="nav-item">
					<a href="{{ route('customer.cart.index') }}" class="navbar-nav-link">
						<i class="icon-cart"></i>
					</a>
				</li>
				@endrole
				<li class="nav-item">
					<a  class="navbar-nav-link" id="logout-button">
						<i class="icon-switch2"></i>
						<span class="d-md-none ml-2">Logout</span>
						<form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-light sidebar-main sidebar-expand-md">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				<span class="font-weight-semibold">Navigation</span>
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">

				<!-- Main navigation -->
				@include('layouts.partials._sidebar')
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->

		</div>
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			@yield('header')
			<!-- /page header -->


			<!-- Content area -->
			@yield('content')
			<!-- /content area -->


			<!-- Footer -->
			@include('layouts.partials._footer')
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->
	@yield('script')
<script>

	function logout(){
		var yakin = confirm('Yakin Ingin Keluar?');
		if(yakin) {
			$("#logout-form").submit();
		}
	}
</script>
</body>

</html>