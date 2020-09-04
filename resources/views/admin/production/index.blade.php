@extends('layouts.master')

@section('title', 'Daftar Produksi')

@section('style')
<!-- Theme JS files -->
<script src="/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script src="/global_assets/js/plugins/forms/selects/select2.min.js"></script>

<script src="/assets/js/app.js"></script>
<script src="/global_assets/js/demo_pages/datatables_basic.js"></script>

<script src="/global_assets/js/plugins/notifications/sweet_alert.min.js"></script>
<script src="/global_assets/js/demo_pages/alert.js"></script>
<!-- /theme JS files -->

@endsection

@section('header')
<!-- Page header -->
<div class="page-header page-header-light">


    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <a href="{{ route('admin.production.index') }}" class="breadcrumb-item">Produksi</a>
                <span class="breadcrumb-item active">Daftar Produksi</span>
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

        <!-- Basic datatable -->
        <div class="card">

            <div class="card-header">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-2"></div>
                    @if(Session::has('production'))
                    <input type="hidden" id="message" value="{{ session()->get('production') }}">
                    @endif
                </div>
                <div class="header-elements text-center">

                    <h5 class="card-title">Daftar Produksi</h5>
                </div>
            </div>

            <table class="table datatable-basic">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Produksi</th>
                        <th>No Pesanan</th>
                        <th>Pelanggan</th>
                        <th>Tanggal</th>
                        <th style="width: 5%">Total Product</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($productions as $production)
                    <tr>
                        <td scope="row">{!! $loop->iteration !!}</td>
                        <td>{{ $production->code }}</td>
                        <td><a href="{{ route('admin.order.show', [$production->order]) }}">{{ $production->order->code }}</a></td>
                        <td>{{ $production->order->customer->name }}</td>
                        <td>{{ date('d F Y', strtotime($production->date))  }}</td>
                        <td>
                            
                            @php($qty = 0)
                            @foreach ($production->order->products as $product)
                                @php($qty = $qty + $product->pivot->qty)
                            @endforeach
                            {{ number_format($qty) }}
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /basic datatable -->



    </div>

</div>
<!--/content area -->
@endsection

@section('script')
<script>
    function hapus(id) {
            var yakin = confirm('Yakin Hapus?');
            if(yakin) {
                window.location = "{{ url('/') }}" + "/admin/product/delete/" + id;

            }else{
                window.location = "{{ route('admin.product.index') }}";
            }
        }

</script>

@endsection