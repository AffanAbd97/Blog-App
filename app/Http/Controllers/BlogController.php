<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function index()
    {
        $blog = Blog::all();
        return view('blog.index', ['blog' => $blog]);
    }


    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {

        try {

            $validator = Validator::make($request->all(), [
                'kode_lokasi' => 'required',
                'keterangan' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->route('blog.create')
                    ->withErrors($validator)
                    ->withInput();
            }
            $blog = new Blog();


            $blog->kode_lokasi = $request->kode_lokasi;
            $blog->keterangan = $request->keterangan;
            $blog->save();

            Session::flash('sukses', "item Berhasil Ditambahkan");
            return redirect()->route('blog.index');
        } catch (\Exception $e) {

            $errorMessage = $e->getMessage();
            Session::flash('gagal', $errorMessage);

            return redirect()->back()->withInput();
            ;
        }
    }


    public function show(Lokasi $blog)
    {
        //
    }

    public function edit(Lokasi $blog)
    {
        return view('blog.edit', compact('lokasi'));
    }


    public function update(Request $request, Lokasi $blog)
    {
        try {

            $validator = Validator::make($request->all(), [

                'keterangan' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }




            $blog->keterangan = $request->keterangan;
            $blog->save();

            Session::flash('sukses', "item Berhasil Ditambahkan");
            return redirect()->route('blog.index');
        } catch (\Exception $e) {

            $errorMessage = $e->getMessage();
            Session::flash('gagal', $errorMessage);

            return redirect()->back()->withInput();
            ;
        }
    }

    public function destroy(Lokasi $blog)
    {
        try {
            $blog->delete();

            Session::flash('sukses', "item Berhasil Dihapus");
            return redirect()->route('blog.index');
        } catch (\Exception $e) {

            $errorMessage = $e->getMessage();
            Session::flash('gagal', $errorMessage);

            return redirect()->back();
        }
    }
}
