<?php

namespace App\Http\Controllers;
use App\Models\Banner;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::select('id', 'slug','judul', 'sampul')->latest()->paginate(10);
        return view('admin/banner/index', compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/banner/create');
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
            'judul' => 'required',
            'sampul' => 'required|mimes:jpg,jpeg,png,webp',
            'konten' => 'required',
        ]);

        $sampul = time() .'-' .$request->sampul->getClientOriginalName();
        $request->sampul->move('upload/banner', $sampul);

        Banner::create([
            'sampul' => $sampul,
            'judul' => $request->judul,
            'konten' => $request->konten,
            'slug' => Str::slug($request->judul, '-'),

        ]);

        $request->session()->flash('sukses','
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Berhasil Ditambahkan
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
    </div>
        ');
        return redirect('/banner');
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
        $banner = Banner::select('id', 'konten','judul', 'sampul')->whereId($id)->firstOrFail();
        return view('admin/banner/edit', compact('banner'));
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
            'judul' => 'required',
            'sampul' => 'mimes:jpg,jpeg,png,webp',
            'konten' => 'required',
        ]);

        $data = [
            'judul' => $request->judul,
            'konten' => $request->konten,
            'slug' => Str::slug($request->judul, '-'),
        ];

        $banner = Banner::select('sampul', 'id')->whereId($id)->first();
        if ($request->sampul) {
            File::delete('upload/banner/' .$banner->sampul);

            $sampul = time() . '-' . $request->sampul->getClientOriginalName();
            $request->sampul->move('upload/banner', $sampul);

            $data['sampul'] = $sampul;
        }

        Banner::whereid($id)->update($data);

        $request->session()->flash('sukses', '
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
        Data Berhasil Diubah
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
    </div>
        ');
        return redirect('/banner');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $banner = Banner::select('sampul', 'id')->whereId($id)->firstOrFail();
        File::delete('upload/banner/' . $banner->sampul);
        $banner->delete();

        $request->session()->flash('sukses', '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Berhasil Dihapus
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
        </div>
        ');

        return redirect('/banner');
    }
}
