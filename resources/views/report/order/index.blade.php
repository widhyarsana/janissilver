@extends('layouts.master')

@section('title', 'Laporan Pesanan')

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
                    <span class="breadcrumb-item">Laporan</span>
                    <span class="breadcrumb-item active">Laporan Pesanan</span>
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

     <div class="card">
          <div class="card-header text-center">
               <h1 class="card-title">LAPORAN PESANAN</h1>
               <hr style="width: 150px; border: solid red 1px;" class="round">
          </div>

          <div class="card-body">
               <form action="{{ route('report.order.store') }}" method="post">
                    {{-- <form> --}}
                    @csrf
                    <input type="hidden" id="csrf" value="{{csrf_token()}}">
                    <div class="row">
                         <div class="col-md-2">
                              <div class="form-group">
                                   <label for="">Tanggal Awal</label>
                                   <input id="start" name="start" type="date" class="form-control">
                              </div>
                         </div>
                         <div class="col-md-2">
                              <div class="form-group">
                                   <label for="">Tanggal Akhir</label>
                                   <input id="end" name="end" type="date" class="form-control">
                              </div>
                         </div>
                         <div class="col-md-2">
                              <div class="form-group">
                                   <label for="">Pelanggan</label>
                                   <select name="customer" id="customer" class="form-control">
                                        <option value="">Pilih Pelanggan</option>
                                        @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ \Str::ucfirst($customer->name) }}
                                        </option>
                                        @endforeach
                                   </select>
                              </div>
                         </div>
                         <div class="col-md-2">
                              <div class="form-group">
                                   <label for="">Status</label>
                                   <select name="status" id="status" class="form-control">
                                        <option value="">Pilih Status</option>
                                        <option value="0">Dipesan</option>
                                        <option value="1">Diproses</option>
                                        <option value="2">Dikirim</option>
                                   </select>
                              </div>
                         </div>
                         <div class="col-md-4 text-right px-5 pt-3">
                              <div class="form-group">
                                   <input type="button" onclick="search()" class="btn btn-primary" value="Cari"
                                        name="cari">
                                   <input type="submit" class="btn btn-primary" value="Cetak" name="cetak">
                              </div>
                         </div>
                    </div>
               </form>
          </div>

          <div id="order-content">
               <div class="table-responsive">
                    <table class="table">
                         <thead>
                              <tr class="bg-blue">
                                   <th>No</th>
                                   <th>No Pesanan</th>
                                   <th>Tanggal</th>
                                   <th>Pelanggan</th>
                                   <th>Jumlah Produk</th>
                                   <th>Total Harga</th>
               
                              </tr>
                         </thead>
                         <tbody>
                              @php($totalq = 0)
                              @php($totalp = 0)
                              @foreach ($orders as $order)
                              <tr>
                                   <td>{!! $loop->iteration !!}</td>
                                   <td>{{ $order->code }}</td>
                                   <td>{{ date('d F Y', strtotime($order->date))  }}</td>
                                   <td>{{ $order->customer->name }}</td>
                                   <td>
               
                                        @php($qty = 0)
                                        @foreach ($order->products as $product)
                                        @php($qty = $qty + $product->pivot->qty)
                                        @endforeach
                                        {{ number_format($qty) }}
                                   </td>
                                   <td>
               
                                        @php($price = 0)
                                        @foreach ($order->products as $product)
                                        @php($price = $price + $product->pivot->price)
                                        @endforeach
                                        Rp. {{ number_format($price,2,',','.')}}
                                   </td>
                              </tr>
                              @php($totalq = $totalq + $qty)
                              @php($totalp = $totalp + $price)
                              @endforeach
                         <tfoot>
                              <tr>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                   <td><h6><b>Total</b></h6></td>
                                   <td ><h6><b>{{ number_format($totalq) }}</b></h6></td>
                                   <td><h6><b>Rp. {{ number_format($totalp,2,',','.')}}</b></h6></td>
                              </tr>
                         </tfoot>
                         </tbody>
                    </table>
               </div>
          </div>
     </div>



</div>


<!--/content area -->
@endsection

@section('script')
<script>
     function search() {
          
          var start = $('#start').val();
          var end = $('#end').val();
          var customer = $('#customer').val();
          var status = $('#status').val();

          var data = {
               'start':  start,
               'end': end,
               'customer': customer,
               'status': status
          };

          $.ajax({
               url:"{{ route('report.order.store') }}",
               headers: {
                    'X-CSRF-TOKEN': $('#csrf').val(),
                    Accept: "application/json"
               },
               type: 'post',
               data: data
          }).done( function(response) {
               $('#order-content').html(response['content']);
               $('#message').html(response['message']);
          });
     }
</script>

@endsection