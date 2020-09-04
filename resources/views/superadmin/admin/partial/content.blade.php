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
                         <a href="{{ route('superadmin.admin.edit', [$admin]) }}" class="btn btn-success">Edit</a>
                         {{-- <a href="{{ route('superadmin.admin.delete', [$admin]) }}" class="btn
                         btn-danger">Hapus</a> --}}
                         <button class="btn btn-danger delete-item" id="hapus_{{ $key }}"
                              data-id="{{ $admin->id }}">Delete</button>
                         <input type="hidden" id="item_{{ $key }}" value="{{ $admin->id }}"></td>
               </tr>
               @endforeach
          </tbody>
     </table>
</div>