<?php

namespace App\Http\Controllers;

use App\Models\artikel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use PDO;

class authorController extends Controller
{
    function index()
    {
        return view('author');
    }

    function infoakun()
    {
        return view('author.akun');
    }

    function karyatulis()
    {
        $id = Auth::user()->id;
        $data = artikel::where('id_author', $id)->where('status_artikel', 'Menunggu')->get();
        $artikel = $data->sortBy([
            ['tgl_artikel', 'desc'],
        ]);

        return view('author.karyatulis', compact('artikel'));
    }

    function pengaturan()
    {
        return view('author.pengaturan');
    }

    function panduan_menulis()
    {
        return view('author.panduanMenulis');
    }

    function menulis()
    {
        return view('author.menulis');
    }

    function kirimtulisan(Request $request)
    {
        $validatedData = $request->validate(
            [
                'judul' => 'required|min:1|max:50',
                'cuplikan' => 'required|min:1|max:70',
                'gambar' => 'required|image|mimes:png,jpg,jpeg|max:2048',
                'isi' => 'required',
            ]
        );

        //upload image
        $image = $request->file('gambar');
        $image->storeAs('public/posts', $image->hashName());

        switch ($request->input('submit')) {
            case 'simpan':
                //create Menulis
                artikel::create([
                    'id_author' => Auth::user()->id,
                    'judul' => $request->judul,
                    'cuplikan' => $request->cuplikan,
                    'gambar_artikel' => $image->hashName(),
                    'isi_artikel' => $request->isi,
                    'status_artikel' => 'Disimpan',
                ]);
                return redirect('/karyatulis')->with('success', 'Data Berhasil Disimpan!');
                break;

            case 'submit':
                //create Menulis
                artikel::create([
                    'id_author' => Auth::user()->id,
                    'judul' => $request->judul,
                    'cuplikan' => $request->cuplikan,
                    'gambar_artikel' => $image->hashName(),
                    'isi_artikel' => $request->isi,
                    'tgl_artikel' => Carbon::now(),
                    'status_artikel' => 'Menunggu',
                ]);
                return redirect('/karyatulis')->with('success', 'Data Berhasil Disubmit!');
                break;
        }
    }

    function draft()
    {
        return view('author.draft');
    }

    function status()
    {
        return view('author.status');
    }

    function pointku()
    {
        return view('author.pointku');
    }
}
