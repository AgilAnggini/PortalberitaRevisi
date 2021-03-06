<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Banner;
use Carbon\Carbon;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlah_post = Post::count();
        $jumlah_kategori = Kategori::count();
        $jumlah_tag = Tag::count();
        $jumlah_user = User::count();

        $hari_ini = Carbon::today();
        $post = Post::select('id', 'judul', 'id_kategori', 'sampul','id_user')->whereDate('created_at', $hari_ini)->get();
        $banner = Banner::select('sampul', 'judul', 'slug')->whereDate('created_at', $hari_ini)->get();
        return view('admin/dashboard', compact('jumlah_post', 'jumlah_kategori', 'jumlah_tag', 'jumlah_user','banner','post'));
    }
}
