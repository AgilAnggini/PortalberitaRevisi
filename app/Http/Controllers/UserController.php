<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;


class UserController extends Controller
{
    public function setting()
    {
        return view('admin/user/setting');
    }

    public function ubah_password(Request $request, $id)
    {
        $request->validate([
            'password_lama' => 'required|min:8',
            'password_baru' => 'required|min:8|confirmed',
            'password_baru_confirmation' => 'required|min:8',
        ]);

        $user = User::select('id','password')->whereId($id)->firstOrFail();
        if (Hash::check($request->password_lama, $user->password)) {
            $user->update(['password' => Hash::make($request->password_baru)]);

            $request->session()->flash('sukses', '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Berhasil Diubah
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
            </div>
                ');

            return redirect('/pengguna');
        } else {
            $request->session()->flash('sukses', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Password lama anda salah
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
            </div>
            ');
            return redirect()->back();
        }
        
    }
}
