<?php

namespace App\Http\Controllers\SuperAdmin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Auth\Events\Validated;
use App\Http\Requests\AdminFormRequest;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = User::role('admin')->get();

        return(view('superadmin.admin.index', compact('admins')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return(view('superadmin.admin.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminFormRequest $request)
    {
        // $request->flash();

        $data = [
            'name' => request()->name,
            'username' => request()->username,
            'password' => bcrypt(request()->password),
            'email' => request()->email,
            'address' => request()->address,
            'phone' => request()->phone,
            'gender' => request()->gender,

        ];

        $admin = User::create($data);
        $admin->assignRole('admin');

        $message = 'Berhasil menambahkan Admin baru';
        Session::flash('admin', $message);

        return redirect(route('superadmin.admin.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $admin)
    {

        return view('superadmin.admin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $admin)
    {




        if ($request->password == ''){
            $password = $admin->password;
        }else{
            $password = bcrypt($request->password);
        }

        $data = [
            'name' => request()->name,
            'username' => request()->username,
            'password' => $password,
            'email' => request()->email,
            'address' => request()->address,
            'phone' => request()->phone,
            'gender' => request()->gender,

        ];

        $admin->update($data);

        $message = 'Berhasil Mengubah Admin';

        Session::flash('admin', $message);

        return redirect(route('superadmin.admin.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $admin)
    {
        $admin->delete();

        $message = 'Berhasil Menghapus Admin';

        Session::flash('admin', $message);

        return redirect(route('superadmin.admin.index'));
    }

    public function delete()
    {
        $a = request()->id;

        $admin = User::find($a);
        $admin->delete();

        $admins = User::role('admin')->get();
        $rs['content'] = View::make('superadmin.admin.partial.content')
            ->with('admins', $admins)
            ->render();

        return response($rs);
    }
}
