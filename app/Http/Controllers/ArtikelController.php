<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Kategori;
use App\Models\Tag;
use App\Models\Banner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
 
class ArtikelController extends Controller
{
    public function index ()
    {
        $banner = Banner::select('slug','sampul','judul')->latest()->get();
        

     request()->session()->forget('search');
        if (request()->search) {
            $artikel = Post::select('sampul', 'judul', 'slug', 'created_at')->where('judul', 'LIKE', '%'. request()->search .'%')->latest()->paginate(6);

            if (count($artikel) == 0) {
                request()->session()->flash('search', 'Post yang anda cari tidak ada');
            }
            $search = request()->search;
        } else {
            $artikel = Post::select('sampul', 'judul', 'slug', 'created_at')->latest()->paginate(6);
            $search = '';
        }

        $kategori = Kategori::select('slug', 'nama')->orderBy('nama', 'asc')->get();
        $home = true;
        $author = User::select('id', 'name')->orderBy('name', 'asc')->get();
        return view ('artikel/index', compact('artikel','kategori','banner','home','author','search'));
    }

    public function artikel($slug)
    {
        $artikel = Post::select('id', 'judul', 'konten', 'id_kategori', 'created_at','sampul','id_user')->where('slug', $slug)->firstOrFail();
        $kategori = Kategori::select('slug', 'nama')->orderBy('nama', 'asc')->get();
        $author = User::select('id', 'name')->orderBy('name', 'asc')->get();
        return view ('artikel/artikel', compact('artikel','kategori','author'));
    }

    public function kategori($slug)
    {
        $banner = Banner::select('slug','sampul','judul')->latest()->get();
        $kategori = Kategori::select('id')->where('slug', $slug)->firstOrFail();
        
        request()->session()->forget('search');
        if (request()->search) {
            $artikel = Post::select('sampul', 'judul', 'slug', 'created_at')->where('id_kategori', $kategori->id)->where('judul', 'LIKE', '%' . request()->search . '%')->latest()->paginate(6);
            if (count($artikel) == 0) {
                request()->session()->flash('search', 'Post yang anda cari tidak ada');
            }
            $search = request()->search;
        } else {
            $artikel = Post::select('sampul', 'judul', 'slug', 'created_at')->where('id_kategori', $kategori->id)->latest()->paginate(6);
            $search = '';
        }
        $kategori = Kategori::select('slug', 'nama')->orderBy('nama', 'asc')->get();
        $kategori_dipilih = Kategori::select('slug', 'nama')->where('slug', $slug)->firstOrFail();
        $author = User::select('id', 'name')->orderBy('name', 'asc')->get();

        return view ('artikel/index', compact('artikel','kategori','banner','kategori_dipilih','author','search'));
    }

    public function tag($slug)
    {
        
        $banner = Banner::select('slug','sampul','judul')->latest()->get();
        $artikel = Tag::select('id')->where('slug', $slug)->latest()->firstOrFail();
        $artikel = $this->paginate($artikel->post);

        $search = '';
        request()->session()->forget('search');
        if (request()->search) {
            $search = request()->search;
            $filter = $artikel->filter(function($item) use ($search){
                if (stripos($item->judul, $search) !== false) {
                    return true;
                }
            });
            $artikel = $this->paginate($filter);

            if (count($artikel) == 0) {
                request()->session()->flash('search', 'Post yang anda cari tidak ada');
            }
        }

        $artikel->withPath(request()->url());
        $kategori = Kategori::select('slug', 'nama')->orderBy('nama', 'asc')->get();
        $tag_dipilih = Tag::select('nama')->where('slug', $slug)->firstOrFail();
        $author = User::select('id', 'name')->orderBy('name', 'asc')->get();
        
        return view ('artikel/index', compact('artikel','kategori','banner','tag_dipilih','author','search'));
    }

    public function paginate($items, $perPage = 6, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function banner($slug)
    {
        
        $banner = Banner::select('id', 'judul', 'konten','created_at','sampul')->where('slug', $slug)->firstOrFail();
        $kategori = Kategori::select('slug', 'nama')->orderBy('nama', 'asc')->get();
        $author = User::select('id', 'name')->orderBy('name', 'asc')->get();

        return view ('artikel/banner', compact('banner','kategori','banner','author'));
    }

    public function tentang()
    {
        $kategori = Kategori::select('slug', 'nama')->orderBy('nama', 'asc')->get();
        
        return view('artikel/tentang', compact('kategori'));
    }

    public function tim()
    {
        $kategori = Kategori::select('slug', 'nama')->orderBy('nama', 'asc')->get();
        return view('artikel/tim', compact('kategori'));       
    }

}
