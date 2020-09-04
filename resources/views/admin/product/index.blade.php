@extends('layouts.master')

@section('title', 'Daftar Produk')

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
                <a href="{{ route('admin.product.index') }}" class="breadcrumb-item">Produk</a>
                <span class="breadcrumb-item active">Daftar Produk</span>
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
                    <div class="col-md-2">
                        <div class="text-left">
                            <a href="{{ route('admin.product.create') }}" class="btn btn-primary mt-2">Tambah</a>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                    @if(Session::has('product'))
                    <input type="hidden" id="message" value="{{ session()->get('product') }}">
                    @endif
                </div>
                <div class="header-elements text-center">

                    <h5 class="card-title">Daftar Produk</h5>
                </div>
            </div>

            <div id="content">
                <div id="child">
                    <input type="hidden" id="csrf" value="{{csrf_token()}}">
                    <input type="hidden" id="obj" value="product">
                    <input type="hidden" id="sum" value="{{ $products->count() }}">
                    <table class="table datatable-basic">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Bahan</th>
                                <th>Variasi</th>
                                <th style="width: 13%">Harga (Rp)</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $key => $product)
                            <tr id="content_{{ $product->id }}">
                                <td scope="row">{!! $loop->iteration !!} </td>
                                <td><img src="{!! asset($product->image) !!}" style="width: 50px; margin-right: 20px;" alt=""> {{ \Str::ucfirst($product->name) }} </td>
                                </td>
                                <td>{{ \Str::ucfirst($product->materials) }}</td>
                                <td>{{ \Str::ucfirst($product->varian) }}</td>
                                {{-- <td>Rp. {{ number_format($product->price,2,',','.')}}</td> --}}
                                <td class="text-right">{{ number_format($product->price)}}</td>
                
                                <td class="text-right">
                                    <a href="{{ route('admin.product.edit', [$product]) }}" class="btn btn-success">Edit</a>
                                    {{-- <button class="btn btn-danger delete-item" data-id="{{ $product->id }}" id="hapus_{{ $key }}" class="hapusya">Delete</button> --}}
                                    <input type="hidden" id="item_{{ $key }}" value="{{ $product->id }}" ></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
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