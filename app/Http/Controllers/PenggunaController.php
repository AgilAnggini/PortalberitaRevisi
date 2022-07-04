<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;



class PenggunaController extends Controller
{
    public function index()
    {
        $pengguna = User::select('id', 'name', 'email')->latest()->paginate(4);
        return view('admin/Pengguna/index', compact('pengguna'));
    }

     public function create()
    {
        return view('admin/Pengguna/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>Hash::make($request->password),
        ]);

         $request->session()->flash('sukses','
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Berhasil Ditambahkan
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
    </div>
        ');
        return redirect('/pengguna');
    }
 
    public function edit($id)
    {
        $pengguna = User::select('id', 'name','email')->whereId($id)->first();
        return view('admin/Pengguna/edit', compact('pengguna'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        User::whereId($id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $request->session()->flash('sukses', '
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
        Data Berhasil Diubah
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
    </div>
        ');
        return redirect('/pengguna');
    }

    public function destroy(Request $request, $id)
    {
        User::whereId($id)->delete();

       $request->session()->flash('sukses', '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Berhasil Dihapus
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
        </div>
        ');
        return redirect('/pengguna');
    }

}
