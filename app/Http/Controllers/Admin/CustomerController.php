<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Http\Requests\AdminFormRequest;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = User::role('customer')->get();

        return (view('admin.customer.index', compact('customers')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return (view('admin.customer.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminFormRequest $request)
    {

        $data = [
            'name' => request()->name,
            'username' => request()->username,
            'password' => bcrypt(request()->password),
            'email' => request()->email,
            'address' => request()->address,
            'phone' => request()->phone,
            'gender' => request()->gender,

        ];

        $customer = User::create($data);
        $customer->assignRole('customer');

        $message = 'Berhasil menambahkan Pelanggan baru';
        Session::flash('customer', $message);

        return redirect(route('admin.customer.index'));
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
    public function edit(User $customer)
    {

        return view('admin.customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $customer)
    {




        if ($request->password == '') {
            $password = $customer->password;
        } else {
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

        $customer->update($data);

        $message = 'Berhasil Mengubah Pelanggan';

        Session::flash('customer', $message);

        return redirect(route('admin.customer.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $customer)
    {
        $customer->delete();

        $message = 'Berhasil Menghapus Pelanggan';

        Session::flash('customer', $message);

        return redirect()->back();
        return redirect(route('admin.customer.index'));
    }

    public function delete(){
        $a = request()->id;

        $customer = User::find($a);
        $customer->delete();

        $customers = User::role('customer')->get();
        $rs['content'] = View::make('admin.customer.partial.content')
            ->with('customers', $customers)
            ->render();

        return response($rs);
    }
}   
