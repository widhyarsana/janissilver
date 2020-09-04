@extends('layouts.master')

@section('title', 'Daftar Pelanggan')

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
                <a href="{{ route('admin.customer.index') }}" class="breadcrumb-item">Pelanggan</a>
                <span class="breadcrumb-item active">Daftar Pelanggan</span>
            </div>
        </div>
    </div>
</div>
<!-- /page header -->
@endsection

@section('content')
<!--Content area -->
<div class="content">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-2">
                    <div class="text-left">
                        <a href="{{ route('admin.customer.create') }}" class="btn btn-primary mt-2">Tambah</a>
                    </div>
                </div>
                <div class="col-md-4"></div>
                @if(Session::has('customer'))
                <input type="hidden" id="message" value="{{ session()->get('customer') }}">
                @endif
            </div>
            <div class="header-elements text-center">

                <h5 class="card-title">Daftar pelanggan</h5>
            </div>
        </div>
        <div id="content">
            <div id="child">
                <input type="hidden" id="csrf" value="{{csrf_token()}}">
                <input type="hidden" id="obj" value="customer">
                <input type="hidden" id="sum" value="{{ $customers->count() }}">
                <table class="table datatable-basic">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>E-Mail</th>
                            <th>Alamat</th>
                            <th>No. Telp</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $key => $customer)
                        <tr id="content_{{ $key }}">
                            <td scope="row">{!! $loop->iteration !!}</td>
                            <td>{{ \Str::ucfirst($customer->name) }}</>
                            </td>
                            <td>{{ \Str::ucfirst($customer->email) }}</td>
                            <td>{{ \Str::ucfirst($customer->address) }}</td>
                            <td>{{ $customer->phone}}</td>

                            <td class="text-center">
                                <a href="{{ route('admin.customer.edit', [$customer]) }}"
                                    class="btn btn-success">Edit</a>
                                {{-- <button class="btn btn-danger" onclick="hapus({{$customer->id}})">Delete</button>
                                --}}
                                {{-- <button class="btn btn-danger delete-item" id="hapus_{{ $key }}" data-id="{{ $customer->id }}" >Delete</button> --}}
                                <input type="hidden" id="item_{{ $key }}" value="{{ $customer->id }}">
                            </td>
                        </tr>
                        @endforeach

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
    function hapus(id) {
            
            var yakin = confirm('Yakin Hapus?');
            if(yakin) {
                window.location = "{{ url('/') }}" + "/admin/customer/delete/" + id;
            }else{
                window.location = "{{ route('admin.customer.index') }}";

            }
        }
</script>

@endsection