<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data = User::query()->orderBy('created_at', 'desc');;

      //seaarching data
      //jika kosong dia ngak di proses
      //strlen itu string len mengetahui isinya ada tau tidak
      if (request()->has('search') && strlen(request()->query("search"))>=1) {
          $data->where(
              "name", "like", "%" . request()->query("search") . "%"
          );
      }

      $pagination = 5;
      $data = $data->paginate($pagination);

      //mengheandle perpindahan page
      $number = 1;

      if (request()->has('page') && request()->get('page') > 1) {
          $number += (request()->get('page') - 1) * $pagination;
      }

      return view('admin.users.index', compact('data','number'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required',
        'phone'=> 'required|numeric',
      ]);

      $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
        'password' => Bcrypt($request->password),
        'phone'=> $request->phone,
      ]);

      Session::flash('message', 'Sukses Menambahkan Akun');
      return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $data = User::find($id);
      return view('admin.users.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email',
        'phone'=> 'required|numeric',
        'role'=> 'required'
      ]);

      $data = User::find($id);
      $data->name = $request->name;
      $data->email = $request->email;
      $data->phone = $request->phone;
      $data->role = $request->role;
      $data->save();

      if($data) {
          Session::flash('message','Berhasil mengupdate data');
      }
      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $data = User::find($id);
      $data->delete();
      if($data) {
          Session::flash('message','Berhasil menghapus data');
      }
      return redirect()->back();
    }
}
