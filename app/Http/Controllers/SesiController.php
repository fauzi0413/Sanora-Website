<?php

namespace App\Http\Controllers;

use App\Models\artikel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{

    function index()
    {
        $artikel = artikel::where('status_artikel', 'Disetujui')->get();
        return view('index', compact('artikel'));
    }

    function loginview()
    {
        return view('login');
    }

    function registerview()
    {
        return view('register');
    }

    function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email:dns',
                'password' => 'required',
            ]
        );

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            if (Auth::user()->role == 'author') {
                return redirect('/author');
            } else if (Auth::user()->role == 'admin') {
                return redirect('/admin');
            }
        } else {
            return redirect('/login')->withErrors('Username atau password yang dimasukkan tidak sesuai')->withInput();
        }
    }

    function register(Request $request)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required',
                'email' => 'required|unique:users|email:dns',
                'password' => 'required|min:5|confirmed',
            ]
        );

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect('/login')->with('success', 'Registrasi berhasil, silahkan login!');
    }

    function logout()
    {
        Auth::logout();
        return redirect('');
    }

    function iklan()
    {
        return view('iklan');
    }

    function detail_artikel($id)
    {
        $data = artikel::join('users', 'artikels.id_author', '=', 'users.id')->select('artikels.*', 'users.name')->first();;

        return view('detailartikel', compact('data'));
    }
}
