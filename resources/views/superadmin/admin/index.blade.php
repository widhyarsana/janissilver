@extends('layouts.master')

@section('title', 'Daftar Admin')

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
                <a href="{{ route('superadmin.admin.index') }}" class="breadcrumb-item">Admin</a>
                <span class="breadcrumb-item active">Daftar Admin</span>
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
                            <a href="{{ route('superadmin.admin.create') }}" class="btn btn-primary mt-2">Tambah</a>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                    @if(Session::has('admin'))
                    <input type="hidden" id="message" value="{{ session()->get('admin') }}">
                    @endif
                </div>
                <div class="header-elements text-center">

                    <h5 class="card-title">Daftar Admin</h5>
                </div>
            </div>

            <div id="content">
                <div id="child">
                    <input type="hidden" id="csrf" value="{{csrf_token()}}">
                    <input type="hidden" id="obj" value="admin">
                    <input type="hidden" id="sum" value="{{ $admins->count() }}">
                    <table class="table datatable-basic">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>E-Mail</th>
                                <th>Alamat</th>
                                <th>Jenis Kelamin</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($admins as $key => $admin)
                            <tr>
                                <td scope="row">{!! $loop->iteration !!}</td>
                                <td>{{ \Str::ucfirst($admin->name) }}</>
                                </td>
                                <td>{{ \Str::ucfirst($admin->email) }}</td>
                                <td>{{ \Str::ucfirst($admin->address) }}</td>
                                <td>{{ $admin->gender == 1 ? 'Laki-Laki': 'Perempuan' }}</td>

                                <td style="width: 20%">
                                    <a href="{{ route('superadmin.admin.edit', [$admin]) }}"
                                        class="btn btn-success">Edit</a>
                                    {{-- <a href="{{ route('superadmin.admin.delete', [$admin]) }}" class="btn
                                    btn-danger">Hapus</a> --}}
                                    <button class="btn btn-danger delete-item" id="hapus_{{ $key }}"
                                        data-id="{{ $admin->id }}" >Delete</button>
                                    <input type="hidden" id="item_{{ $key }}" value="{{ $admin->id }}"></td>
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
                window.location = "{{ url('/') }}" + "/superadmin/admin/delete/" + id;

            }else{
                window.location = "{{ route('superadmin.admin.index') }}";
            }
        }
</script>

@endsection