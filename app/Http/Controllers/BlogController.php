<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function index()
    {
        $session = session()->get('user');

        $blog = Blog::all();
        return view('blog.index', [
            'blog' => $blog,
            'session' => $session
        ]);
    }


    public function create()
    {
        return view('blog.create');
    }

    public function save(Request $request)
    {

        try {
            $session = session()->get('user');

            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'content' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->route('create.blog')
                    ->withErrors($validator)
                    ->withInput();
            }
            $blog = new Blog();


            $blog->title = $request->title;
            $blog->content = $request->content;
            $blog->username = $session->username;
            $blog->date = Carbon::now();
            $blog->save();

            Session::flash('sukses', "item Berhasil Ditambahkan");
            return redirect()->route('index.blog');
        } catch (\Exception $e) {

            $errorMessage = $e->getMessage();
            Session::flash('gagal', $errorMessage);

            return redirect()->back()->withInput();
            ;
        }
    }


    public function edit(Blog $blog)
    {
        $session = session()->get('user');
        if ($session->username != $blog->username) {
            Session::flash('gagal', "Bukan Post Anda");
            return redirect()->route('index.blog');
        }
        return view('blog.edit', ['blog' => $blog]);
    }


    public function update(Request $request, Blog $blog)
    {
        try {
            $session = session()->get('user');
            if ($session->username != $blog->username) {
                Session::flash('gagal', "Bukan Post Anda");
                return redirect()->route('index.blog');
            }
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'content' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->route('create.blog')
                    ->withErrors($validator)
                    ->withInput();
            }



            $blog->title = $request->title;
            $blog->content = $request->content;
            $blog->username = $session->username;
            $blog->date = Carbon::now();
            $blog->save();

            Session::flash('sukses', "item Berhasil Ditambahkan");
            return redirect()->route('index.blog');
        } catch (\Exception $e) {

            $errorMessage = $e->getMessage();
            Session::flash('gagal', $errorMessage);

            return redirect()->back()->withInput();
            ;
        }
    }

    public function destroy(Blog $blog)
    {
        try {
            $session = session()->get('user');
            if ($session->username != $blog->username) {
                Session::flash('gagal', "Bukan Post Anda");
                return redirect()->route('index.blog');
            }
            $blog->delete();

            Session::flash('sukses', "item Berhasil Dihapus");
            return redirect()->route('index,blog');
        } catch (\Exception $e) {

            $errorMessage = $e->getMessage();
            Session::flash('gagal', $errorMessage);

            return redirect()->back();
        }
    }
}
