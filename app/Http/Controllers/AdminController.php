<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class AdminController extends Controller
{
    //
    public function index(){
        $admin = Admin::get();
        return view('layouts.data_admin', compact('admin'));
    }
    public function create(){
        
        return view('layouts.data_admin');
    }

    public function store(Request $request){
        Admin::create([
            'username' => $request->username,
            'nama_admin' => $request->nama_admin,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('data-admin.index')->with('success', 'Data Admin baru telah berhasil disimpan.');
    }

   public function update_data(Request $request, $id){
        $admin = Admin::where("username", "=", $id)->first();
        if(isset($request->password)){
            $admin->update([
                'nama_admin' => $request->nama_admin,
                'password' => bcrypt($request->password)
            ]);
        }else{+
            $admin->update([
                'nama_admin' => $request->nama_admin
            ]);
        }

        return redirect()->route('data-admin.index')->with('success', 'Data Admin berhasil diperbaharui.');
   }

   public function destroy_data($id){
        $data = Admin::find($id);
        $data->delete();
        return redirect()->route('data-admin.index')->with('success', 'Data Admin berhasil dihapus');
    }
}