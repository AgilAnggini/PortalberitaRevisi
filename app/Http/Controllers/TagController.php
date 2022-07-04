<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;


class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tag = Tag::select('id', 'nama', 'slug')->latest()->simplepaginate(10);
        return view('admin/tag/index', compact('tag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/tag/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        Tag::create([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama, '-')
        ]);

        $request->session()->flash('sukses','
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Berhasil Ditambahkan
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
    </div>
        ');
        return redirect('/tag');
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
        $tag = Tag::select('id', 'nama')->whereId($id)->firstOrFail();
        return view('admin/tag/edit', compact('tag'));
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
        $request->validate([
            'nama' => 'required',
        ]);

        Tag::whereId($id)->update([
            'nama' => Str::title($request->nama),
            'slug' => Str::slug($request->nama, '-')
        ]);

        $request->session()->flash('sukses', '
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
        Data Berhasil Diubah
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
    </div>
        ');
        return redirect('/tag');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::whereId($id)->delete();

        request()->session()->flash('sukses', '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Berhasil Dihapus
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
        </div>
        ');
        return redirect('/tag');
    }
}
