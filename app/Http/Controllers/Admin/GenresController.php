<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Genres;
use Session;

class GenresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Genres::query()->orderBy('created_at', 'desc');;

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
        $number =1;

        if (request()->has('page') && request()->get('page') > 1) {
            $number += (request()->get('page') - 1) * $pagination;
        }

        return view('admin.genres.index', compact('data','number'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'name' => 'required | unique:genres',
        ]);
        try{
        \DB::beginTransaction();

        $data = new Genres;
        $data->name = $request->name;

        $data->save();
        \DB::commit();
        //validasi pesan berhasil
        $request->session()->flash('message','Berhasil Menambahkan Data');
        return redirect()->back();

        } catch (Exception $e) {
            report($e);
            \DB::rollBack();
            $request->session()->flash('message_gagal','Data Genre Sudah Ada');
           return redirect()->back();
        }
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
    public function edit($id)
    {
        //
        $data = Genres::find($id);
        return view('admin.genres.edit', compact('data'));
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
        //
        $this->validate($request,[
            'name' => 'required',
        ]);
        try{
          \DB::beginTransaction();
          //dd($datacustomers);
          $data = Genres::find($id);
          $data->name = $request->name;
          $data->save();
          \DB::commit();
          $request->session()->flash('message','Berhasil Update Data');
          return redirect()->back();
        }
        catch (Exception $e) {
          report($e);
          \DB::rollBack();
          $request->session()->flash('message_gagal','Data Sudah Ada');
          return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = Genres::find($id);
        $data->delete();
        if($data) {
            Session::flash('message','Berhasil menghapus');
        }
        return redirect()->back();
    }
}
