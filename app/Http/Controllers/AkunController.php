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
                'password' => 'required|confirmed',
            ]);

            if ($validator->fails()) {
                return redirect()->route('create.akun')
                    ->withErrors($validator)
                    ->withInput();
            }
            $akun = new Akun();

            $hashedPassword = sha1('jksdhf832746aiH{}{()&(*&(*' . md5($request->password) . 'HdfevgyDDw{}{}{;;*766&*&*');

            $akun->name = $request->name;
            $akun->username = $request->username;
            $akun->password = $hashedPassword;
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


    public function edit($username)
    {
        $akun = Akun::where('username', $username)->first();

        return view('Akun.edit', ['akun' => $akun]);
    }


    public function update(Request $request, $username)
    {
        try {
            $session = session()->get('user');
            $akun = Akun::where('username', $username)->first();
            $validator = Validator::make($request->all(), [
                'username' => 'required',
                'name' => 'required',
                'password' => 'required|confirmed',
            ]);

            if ($validator->fails()) {
                return redirect()->route('create.akun')
                    ->withErrors($validator)
                    ->withInput();
            }
            $akun = new Akun();

            $hashedPassword = sha1('jksdhf832746aiH{}{()&(*&(*' . md5($request->password) . 'HdfevgyDDw{}{}{;;*766&*&*');

            $akun->name = $request->name;
            $akun->username = $request->username;
            $akun->password = $hashedPassword;
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

    public function destroy($username)
    {
        try {
            $session = session()->get('user');
            $akun = Akun::where('username', $username)->first();
         
            $akun->forceDelete();

            Session::flash('sukses', "item Berhasil Dihapus");
            return redirect()->route('index.akun');
        } catch (\Exception $e) {

            $errorMessage = $e->getMessage();
            Session::flash('gagal', $errorMessage);

            return redirect()->back();
        }
    }
}
