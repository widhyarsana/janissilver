@extends('layouts.master')

@section('title', 'Dashboard')

@section('style')
<!-- Theme JS files -->
<script src="/global_assets/js/plugins/visualization/d3/d3.min.js"></script>
<script src="/global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
<script src="/global_assets/js/plugins/forms/styling/switchery.min.js"></script>
<script src="/global_assets/js/plugins/ui/moment/moment.min.js"></script>
<script src="/global_assets/js/plugins/pickers/daterangepicker.js"></script>

<script src="/assets/js/app.js"></script>
<script src="/global_assets/js/demo_pages/dashboard.js"></script>
<script src="/global_assets/js/demo_charts/pages/dashboard/light/streamgraph.js"></script>
<script src="/global_assets/js/demo_charts/pages/dashboard/light/sparklines.js"></script>
<script src="/global_assets/js/demo_charts/pages/dashboard/light/lines.js"></script>
<script src="/global_assets/js/demo_charts/pages/dashboard/light/areas.js"></script>
<script src="/global_assets/js/demo_charts/pages/dashboard/light/donuts.js"></script>
<script src="/global_assets/js/demo_charts/pages/dashboard/light/bars.js"></script>
<script src="/global_assets/js/demo_charts/pages/dashboard/light/progress.js"></script>
<script src="/global_assets/js/demo_charts/pages/dashboard/light/heatmaps.js"></script>
<script src="/global_assets/js/demo_charts/pages/dashboard/light/pies.js"></script>
<script src="/global_assets/js/demo_charts/pages/dashboard/light/bullets.js"></script>
<!-- /theme JS files -->

@endsection

@section('header')
<!-- Page header -->
<div class="page-header page-header-light">


	<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
		<div class="d-flex">
			<div class="breadcrumb">
				<a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
				<span class="breadcrumb-item active">Dashboard</span>
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

	@role('admin')

	<div class="row ">
		<div class="col-md-6 ">
			<!-- My messages -->
			<div class="card " style="height: 560px">
				<div class="card-header header-elements-inline">
					<h6 class="card-title">Daftar Pesanan</h6>
					<div class="header-elements">
						{{-- <span><i class="icon-history text-warning mr-2"></i> Jul 7, 10:30</span> --}}
					</div>
				</div>

				<!-- Numbers -->
				<div class="card-body py-0">
					<div class="row text-center">
						<div class="col-4">
							<div class="mb-3">
								<h5 class="font-weight-semibold mb-0">{{ number_format($ordersTodayCount) }}
								</h5>
								<span class="text-muted font-size-sm">Hari Ini</span>
							</div>
						</div>

						<div class="col-4">
							<div class="mb-3">
								<h5 class="font-weight-semibold mb-0">{{ number_format($thisWeekCount) }}</h5>
								<span class="text-muted font-size-sm">Minggu Ini</span>
							</div>
						</div>

						<div class="col-4">
							<div class="mb-3">
								<h5 class="font-weight-semibold mb-0">{{ number_format($thisMonthCount) }}</h5>
								<span class="text-muted font-size-sm">Bulan Ini</span>
							</div>
						</div>
					</div>
				</div>
				<!-- /numbers -->


				<!-- Area chart -->
				<div id="messages-stats"></div>
				<!-- /area chart -->


				<!-- Tabs -->
				<ul
					class="nav nav-tabs nav-tabs-solid nav-justified bg-indigo-400 border-x-0 border-bottom-0 border-top-indigo-300 mb-0">
					<li class="nav-item">
						<a href="#messages-tue" class="nav-link font-size-sm text-uppercase active"
							data-toggle="tab">
							Hari Ini
						</a>
					</li>

					<li class="nav-item">
						<a href="#messages-mon" class="nav-link font-size-sm text-uppercase" data-toggle="tab">
							Minggu Ini
						</a>
					</li>

					<li class="nav-item">
						<a href="#messages-fri" class="nav-link font-size-sm text-uppercase" data-toggle="tab">
							Bulan Ini
						</a>
					</li>
				</ul>
				<!-- /tabs -->


				<!-- Tabs content -->
				<div class="tab-content card-body">
					<div class="tab-pane active fade show" id="messages-tue">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr class="bg-blue">
										<th>No</th>
										<th>No Pesanan</th>
										<th>Tanggal</th>
										<th>Pelanggan</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($ordersToday6 as $order)
									<tr>
										<td>{!! $loop->iteration !!}</td>
										<td>{{ $order->code }}</td>
										<td>{{ date('d F Y', strtotime($order->date))  }}</td>
										<td>{{ $order->customer->name }}</td>

									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>

					<div class="tab-pane fade" id="messages-mon">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr class="bg-blue">
										<th>No</th>
										<th>No Pesanan</th>
										<th>Tanggal</th>
										<th>Pelanggan</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($thisWeek6 as $order)
									<tr>
										<td>{!! $loop->iteration !!}</td>
										<td>{{ $order->code }}</td>
										<td>{{ date('d F Y', strtotime($order->date))  }}</td>
										<td>{{ $order->customer->name }}</td>

									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>

					<div class="tab-pane fade" id="messages-fri">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr class="bg-blue">
										<th>No</th>
										<th>No Pesanan</th>
										<th>Tanggal</th>
										<th>Pelanggan</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($thisMonth6 as $order)
									<tr>
										<td>{!! $loop->iteration !!}</td>
										<td>{{ $order->code }}</td>
										<td>{{ date('d F Y', strtotime($order->date))  }}</td>
										<td>{{ $order->customer->name }}</td>

									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- /tabs content -->

			</div>
			<!-- /my messages -->
		</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-6">
					<div class="card bg-indigo-400">
						<div class="card-body" style="height: 120px;">
							<div class="d-flex">
								<h3 class="font-weight-semibold mb-0"><i
										class="icon-users mr-2"></i>{{ number_format($customerCount) }}</h3>
							</div>
						</div>
						<div class="container-fluid">
							<h1>Total Pelanggan</h1>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card bg-success-400">
						<div class="card-body" style="height: 100px;">
							<div class="d-flex">
								<h3 class="font-weight-semibold mb-0"><i
										class="icon-percent mr-2"></i>{{ number_format($productCount) }}</h3>
							</div>
						</div>
						<div class="container-fluid">
							<h1>Total Produk</h1>

						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4">

					<!-- Members online -->
					<div class="card bg-teal-400" style="height: 200px;">
						<div class="card-body p-4">
							<div class="d-flex">
								<h3 class="font-weight-semibold mb-0">{{ number_format($ordersInCount) }}</h3>
							</div>

							<div>
								Pesanan Diterima
							</div>
						</div>

						<div class="container-fluid">
						</div>
					</div>
					<!-- /members online -->

				</div>

				<div class="col-lg-4">

					<!-- Members online -->
					<div class="card bg-pink-400" style="height: 200px;">
						<div class="card-body p-4">
							<div class="d-flex">
								<h3 class="font-weight-semibold mb-0">{{ number_format($ordersProccessCount) }}
								</h3>
							</div>

							<div>
								Pesanan Diproses
							</div>
						</div>

						<div class="container-fluid">
						</div>
					</div>
					<!-- /members online -->

				</div>

				<div class="col-lg-4">
					<!-- Members online -->
					<div class="card bg-blue-400" style="height: 200px;">
						<div class="card-body p-4">
							<div class="d-flex">
								<h3 class="font-weight-semibold mb-0">{{ number_format($ordersOutCount) }}</h3>
							</div>

							<div>
								Pesanan Dikirim
							</div>
						</div>

						<div class="container-fluid">
						</div>
					</div>
					<!-- /members online -->

				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card text-center">
						<div class="card-body bg-violet-400" style="height: 120px;">
							<h3>{{ number_format($ordersCount) }}</h3>
							<span>Total Semua Pesanan</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endrole

	@role('kepala-bidang')

	<div class="row ">
		<div class="col-md-6 ">
			<!-- My messages -->
			<div class="card " style="height: 560px">
				<div class="card-header header-elements-inline">
					<h6 class="card-title">Daftar Pesanan</h6>
					<div class="header-elements">
						{{-- <span><i class="icon-history text-warning mr-2"></i> Jul 7, 10:30</span> --}}
					</div>
				</div>

				<!-- Numbers -->
				<div class="card-body py-0">
					<div class="row text-center">
						<div class="col-4">
							<div class="mb-3">
								<h5 class="font-weight-semibold mb-0">{{ number_format($ordersTodayCount) }}
								</h5>
								<span class="text-muted font-size-sm">Hari Ini</span>
							</div>
						</div>

						<div class="col-4">
							<div class="mb-3">
								<h5 class="font-weight-semibold mb-0">{{ number_format($thisWeekCount) }}</h5>
								<span class="text-muted font-size-sm">Minggu Ini</span>
							</div>
						</div>

						<div class="col-4">
							<div class="mb-3">
								<h5 class="font-weight-semibold mb-0">{{ number_format($thisMonthCount) }}</h5>
								<span class="text-muted font-size-sm">Bulan Ini</span>
							</div>
						</div>
					</div>
				</div>
				<!-- /numbers -->


				<!-- Area chart -->
				<div id="messages-stats"></div>
				<!-- /area chart -->


				<!-- Tabs -->
				<ul
					class="nav nav-tabs nav-tabs-solid nav-justified bg-indigo-400 border-x-0 border-bottom-0 border-top-indigo-300 mb-0">
					<li class="nav-item">
						<a href="#messages-tue" class="nav-link font-size-sm text-uppercase active"
							data-toggle="tab">
							Hari Ini
						</a>
					</li>

					<li class="nav-item">
						<a href="#messages-mon" class="nav-link font-size-sm text-uppercase" data-toggle="tab">
							Minggu Ini
						</a>
					</li>

					<li class="nav-item">
						<a href="#messages-fri" class="nav-link font-size-sm text-uppercase" data-toggle="tab">
							Bulan Ini
						</a>
					</li>
				</ul>
				<!-- /tabs -->


				<!-- Tabs content -->
				<div class="tab-content card-body">
					<div class="tab-pane active fade show" id="messages-tue">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr class="bg-blue">
										<th>No</th>
										<th>No Pesanan</th>
										<th>Tanggal</th>
										<th>Pelanggan</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($ordersToday6 as $order)
									<tr>
										<td>{!! $loop->iteration !!}</td>
										<td>{{ $order->code }}</td>
										<td>{{ date('d F Y', strtotime($order->date))  }}</td>
										<td>{{ $order->customer->name }}</td>

									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>

					<div class="tab-pane fade" id="messages-mon">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr class="bg-blue">
										<th>No</th>
										<th>No Pesanan</th>
										<th>Tanggal</th>
										<th>Pelanggan</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($thisWeek6 as $order)
									<tr>
										<td>{!! $loop->iteration !!}</td>
										<td>{{ $order->code }}</td>
										<td>{{ date('d F Y', strtotime($order->date))  }}</td>
										<td>{{ $order->customer->name }}</td>

									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>

					<div class="tab-pane fade" id="messages-fri">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr class="bg-blue">
										<th>No</th>
										<th>No Pesanan</th>
										<th>Tanggal</th>
										<th>Pelanggan</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($thisMonth6 as $order)
									<tr>
										<td>{!! $loop->iteration !!}</td>
										<td>{{ $order->code }}</td>
										<td>{{ date('d F Y', strtotime($order->date))  }}</td>
										<td>{{ $order->customer->name }}</td>

									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- /tabs content -->

			</div>
			<!-- /my messages -->
		</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-6">
					<div class="card bg-indigo-400">
						<div class="card-body" style="height: 120px;">
							<div class="d-flex">
								<h3 class="font-weight-semibold mb-0"><i
										class="icon-users mr-2"></i>{{ number_format($customerCount) }}</h3>
							</div>
						</div>
						<div class="container-fluid">
							<h1>Total Pelanggan</h1>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card bg-success-400">
						<div class="card-body" style="height: 100px;">
							<div class="d-flex">
								<h3 class="font-weight-semibold mb-0"><i
										class="icon-percent mr-2"></i>{{ number_format($productCount) }}</h3>
							</div>
						</div>
						<div class="container-fluid">
							<h1>Total Produk</h1>

						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4">

					<!-- Members online -->
					<div class="card bg-teal-400" style="height: 200px;">
						<div class="card-body p-4">
							<div class="d-flex">
								<h3 class="font-weight-semibold mb-0">{{ number_format($ordersInCount) }}</h3>
							</div>

							<div>
								Pesanan Diterima
							</div>
						</div>

						<div class="container-fluid">
						</div>
					</div>
					<!-- /members online -->

				</div>

				<div class="col-lg-4">

					<!-- Members online -->
					<div class="card bg-pink-400" style="height: 200px;">
						<div class="card-body p-4">
							<div class="d-flex">
								<h3 class="font-weight-semibold mb-0">{{ number_format($ordersProccessCount) }}
								</h3>
							</div>

							<div>
								Pesanan Diproses
							</div>
						</div>

						<div class="container-fluid">
						</div>
					</div>
					<!-- /members online -->

				</div>

				<div class="col-lg-4">
					<!-- Members online -->
					<div class="card bg-blue-400" style="height: 200px;">
						<div class="card-body p-4">
							<div class="d-flex">
								<h3 class="font-weight-semibold mb-0">{{ number_format($ordersOutCount) }}</h3>
							</div>

							<div>
								Pesanan Dikirim
							</div>
						</div>

						<div class="container-fluid">
						</div>
					</div>
					<!-- /members online -->

				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card text-center">
						<div class="card-body bg-violet-400" style="height: 120px;">
							<h3>{{ number_format($ordersCount) }}</h3>
							<span>Total Semua Pesanan</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endrole

	@role('customer')
	<div class="container">
		<div class="content">
			<div class="card">
				<div class="card-body bg-white">
					<div class="row mb-5">
						<div class="col-md-3"></div>
						<div class="col-md-6">
							<div class="card" style="height: 400px;">
								<div>
									<img src="{!! asset('/storage/images/silver.png') !!}" class="card-img" alt="">
								</div>
							</div>
						</div>
					</div>
					<br> <br>
					<div class="row mt-3">
						<div class="col-md-3">
							<div class="card" style="height: 150px;">
								<img src="{!! asset('/storage/images/silver1.jpg') !!}" class="card-img" alt="">
							</div>
						</div>
						<div class="col-md-3">
							<div class="card" style="height: 150px;">
								<img src="{!! asset('/storage/images/silver2.jpg') !!}" class="card-img" alt="">
							</div>
						</div>
						<div class="col-md-3">
							<div class="card" style="height: 150px;">
								<img src="{!! asset('/storage/images/silver3.jpg') !!}" class="card-img" alt="">
							</div>
						</div>
						<div class="col-md-3">
							<div class="card" style="height: 150px;">
								<img src="{!! asset('/storage/images/silver4.jpg') !!}" class="card-img" style="height: 150px" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endrole

</div>
<!--/content area -->
@endsection