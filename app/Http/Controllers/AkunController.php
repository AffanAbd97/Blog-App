<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AkunController extends Controller
{
    public function index()
    {
        $session = session()->get('user');

        $akun = Akun::all();
        return view('Akun.index', [
            'akun' => $akun,
            'session' => $session
        ]);
    }


    public function create()
    {
        return view('Akun.create');
    }

    public function save(Request $request)
    {

        try {
            $session = session()->get('user');

            $validator = Validator::make($request->all(), [
                'username' => 'required',
                'name' => 'required',
                'password' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->route('create.akun')
                    ->withErrors($validator)
                    ->withInput();
            }
            $akun = new Akun();



            $akun->name = $session->name;
            $akun->username = $session->username;
            $akun->password = $session->password;
            $akun->role = 'Author';

            $akun->save();

            Session::flash('sukses', "item Berhasil Ditambahkan");
            return redirect()->route('index.akun');
        } catch (\Exception $e) {

            $errorMessage = $e->getMessage();
            Session::flash('gagal', $errorMessage);

            return redirect()->back()->withInput();
            ;
        }
    }


    public function edit(Akun $akun)
    {
        $session = session()->get('user');
        if ($session->username != $akun->username) {
            Session::flash('gagal', "Bukan Post Anda");
            return redirect()->route('index.akun');
        }
        return view('Akun.edit', ['Akun' => $akun]);
    }


    public function update(Request $request, Akun $akun)
    {
        try {
            $session = session()->get('user');

            $validator = Validator::make($request->all(), [
                'username' => 'required',
                'name' => 'required',
                'password' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->route('create.akun')
                    ->withErrors($validator)
                    ->withInput();
            }
            $akun = new Akun();



            $akun->name = $session->name;
            $akun->username = $session->username;
            $akun->password = $session->password;
            $akun->role = 'Author';
            $akun->save();

            Session::flash('sukses', "item Berhasil Ditambahkan");
            return redirect()->route('index.akun');
        } catch (\Exception $e) {

            $errorMessage = $e->getMessage();
            Session::flash('gagal', $errorMessage);

            return redirect()->back()->withInput();
            ;
        }
    }

    public function destroy(Akun $akun)
    {
        try {
            $session = session()->get('user');

            $akun->delete();

            Session::flash('sukses', "item Berhasil Dihapus");
            return redirect()->route('index,Akun');
        } catch (\Exception $e) {

            $errorMessage = $e->getMessage();
            Session::flash('gagal', $errorMessage);

            return redirect()->back();
        }
    }
}
