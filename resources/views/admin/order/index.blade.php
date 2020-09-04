@extends('layouts.master')

@section('title', 'Daftar Pesanan')

@section('style')
<!-- Theme JS files -->
<script src="/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script src="/global_assets/js/plugins/forms/selects/select2.min.js"></script>

<script src="/assets/js/app.js"></script>
<script src="/global_assets/js/demo_pages/datatables_basic.js"></script>
<!-- /theme JS files -->

@endsection

@section('header')
<!-- Page header -->
<div class="page-header page-header-light">


     <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
          <div class="d-flex">
               <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('superadmin.admin.index') }}" class="breadcrumb-item">Pesanan</a>
                    <span class="breadcrumb-item active">Daftar Pesanan</span>
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

          <div class="row">
               <div class="col-md-2">
               </div>
               <div class="col-md-4"></div>
               @if(Session::has('product'))
               <div class="col-md-6">
                    <div class="text-left">
                         <div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                              <span class="font-weight-semibold">{{ Session('product') }} </span>
                         </div>
                    </div>
               </div>
               @endif
          </div>
          <!-- Basic datatable -->
          <div class="card">
               <div class="card-header">
                    <div class="header-elements text-center">

                         <h5 class="card-title">Daftar Pesanan Baru</h5>
                    </div>
               </div>

               <table class="table datatable-basic">
                    <thead>
                         <tr>
                              <th>No</th>
                              <th>No Pesanan</th>
                              <th>Pelanggan</th>
                              <th>Detail Produk</th>
                              <th>Harga (Rp)</th>
                              <th>status</th>
                              <th class="text-center">Actions</th>
                         </tr>
                    </thead>
                    <tbody>
                         @foreach($orderNews as $order)
                         <tr>
                              <td scope="row">{!! $loop->iteration !!}</td>
                              <td><a href="{{ route('admin.order.show', [$order]) }}">{{ $order->code }}</a>
                              <td>{{ $order->customer->name }}</td>
                              <td>
                                   @php($price = 0)
                                   @foreach ($order->products as $product)
                                   @php($price = $price + $product->pivot->price)
                                   {{ $product->name }} - <span class="text-muted">{{ $product->pivot->qty }} pcs</span> <br>
                                   @endforeach
                              </td>
                              <td class="text-right">{{ number_format($price)}}</td>
                              <td>@if($order->status == 0) Dipesan @elseif($order->status == 1) Di Konfirmasi @else Dikirim @endif</td>

                              <td style="width: 20%">
                                   
                                        <a href="{{ route('admin.production.create', [$order]) }}" class="btn btn-success">Proses Produksi &rarr;</a>
                                  
                              </td>
                         </tr>
                         @endforeach
                    </tbody>
               </table>
          </div>

          <div class="card">
               <div class="card-header">
                    <div class="header-elements text-center">
          
                         <h5 class="card-title">Daftar Pesanan Diproses</h5>
                    </div>
               </div>
          
               <table class="table datatable-basic">
                    <thead>
                         <tr>
                              <th>No</th>
                              <th>No Pesanan</th>
                              <th>Pelanggan</th>
                              <th>Detail Produk</th>
                              <th>Harga (Rp)</th>
                              <th>status</th>
                              <th class="text-center">Actions</th>
                         </tr>
                    </thead>
                    <tbody>
                         @foreach($orderProccess as $order)
                         <tr>
                              <td scope="row">{!! $loop->iteration !!}</td>
                              <td><a href="{{ route('admin.order.show', [$order]) }}">{{ $order->code }}</a>
                              <td>{{ $order->customer->name }}</td>
                              <td>
                                   @php($price = 0)
                                   @foreach ($order->products as $product)
                                   @php($price = $price + $product->pivot->price)
                                   {{ $product->name }} - <span class="text-muted">{{ $product->pivot->qty }} pcs</span> <br>
                                   @endforeach
                              </td>
                              <td class="text-right">{{ number_format($price)}}</td>
                              <td>@if($order->status == 0) Dipesan @elseif($order->status == 1) Di Konfirmasi @else Dikirim @endif
                              </td>
          
                              <td style="width: 20%">
                                   
                                   <a href="{{ route('admin.shipment.create', [$order]) }}" class="btn btn-success">Proses Pengiriman
                                        &rarr;</a>
                                 
                              </td>
                         </tr>
                         @endforeach
                    </tbody>
               </table>
          </div>
          <!-- /basic datatable -->
<div class="card">
     <div class="card-header">
          <div class="header-elements text-center">

               <h5 class="card-title">Daftar Pesanan Dikirim</h5>
          </div>
     </div>

     <table class="table datatable-basic">
          <thead>
               <tr>
                    <th>No</th>
                    <th>No Pesanan</th>
                    <th>Pelanggan</th>
                    <th>Detail Produk</th>
                    <th>Harga (Rp)</th>
                    <th>status</th>
               </tr>
          </thead>
          <tbody>
               @foreach($orderSend as $order)
               <tr>
                    <td scope="row">{!! $loop->iteration !!}</td>
                    <td><a href="{{ route('admin.order.show', [$order]) }}">{{ $order->code }}</a>
                    </td>
                    <td>{{ $order->customer->name }}</td>
                    <td>
                         @php($price = 0)
                         @foreach ($order->products as $product)
                         @php($price = $price + $product->pivot->price)
                         {{ $product->name }} - <span class="text-muted">{{ $product->pivot->qty }} pcs</span> <br>
                         @endforeach
                    </td>
                    <td class="text-right">{{ number_format($price)}}</td>
                    <td>@if($order->status == 0) Dipesan @elseif($order->status == 1) Di Konfirmasi @else Dikirim @endif
                    </td>
                    
               </tr>
               @endforeach
          </tbody>
     </table>
</div>


     </div>

</div>
<!--/content area -->
@endsection

@section('script')
<script>
     function hapus(id) {
            var yakin = confirm('Yakin Hapus?');
            if(yakin) {
                window.location = 'http://karin.io/admin/product/delete/' + id;

            }else{
                window.location = 'http://karin.io/admin/product';
            }
        }

</script>

@endsection