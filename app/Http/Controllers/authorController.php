<?php

namespace App\Http\Controllers;

use App\Models\artikel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use PDO;

class authorController extends Controller
{
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
        return view('author.pengaturanakun');
    }

    function editpengaturan(Request $request)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required|min:1',
            ]
        );

        Auth::user()->update([
            'name' => $request->name,
        ]);

        return redirect('/pengaturan')->with('success', 'Data Berhasil Diubah!!');
    }

    function pengaturanpassword()
    {
        return view('author.pengaturansandi');
    }

    function editpassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:5|confirmed',
        ]);

        if (Hash::check($request->current_password, Auth::user()->password)) {
            Auth::user()->update([
                'password' => bcrypt($request->password),
            ]);
            return back()->with('success', 'Password anda berhasil diubah!');
        }
        throw ValidationException::withMessages([
            'current_password' => 'Password anda tidak sesuai',
        ]);
    }

    function editprofile(Request $request)
    {
        $validatedData = $request->validate(
            [
                'profile' => 'image|mimes:png,jpg,jpeg|max:2048',
            ]
        );

        //upload image
        $image = $request->file('profile');
        $imageName = $image->hashName();
        $image->storeAs('public/profile', $imageName);

        Storage::delete('public/profile/' . Auth::user()->profile);

        Auth::user()->update([
            'profile' => $imageName,
        ]);

        return redirect('/pengaturan')->with('success', 'Profile berhasil diubah!!');
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
        $imageName = $image->hashName();
        $image->storeAs('public/posts', $imageName);

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

    function ubah_tulisan($id)
    {
        $data = artikel::where('id', $id)->first();

        return view('author.ubahTulisan')->with('data', $data);
    }

    function edittulisan(Request $request, $id)
    {
        $validatedData = $request->validate(
            [
                'judul' => 'required|min:1|max:50',
                'cuplikan' => 'required|min:1|max:70',
                'gambar' => 'image|mimes:png,jpg,jpeg|max:2048',
                'isi' => 'required',
            ]
        );

        switch ($request->input('submit')) {
            case 'simpan':
                if ($request->hasFile('gambar')) {
                    $data = artikel::findOrFail($id);

                    $image = $request->file('gambar');
                    $imageName = $image->hashName();
                    $image->storeAs('public/posts', $imageName);

                    Storage::delete('public/posts/' . $data->gambar_artikel);

                    $data->update([
                        'judul' => $request->judul,
                        'cuplikan' => $request->cuplikan,
                        'gambar_artikel' => $image->hashName(),
                        'isi_artikel' => $request->isi,
                    ]);
                } else {
                    $data = artikel::find($id);
                    $data->update([
                        'judul' => $request->judul,
                        'cuplikan' => $request->cuplikan,
                        'isi_artikel' => $request->isi,
                    ]);
                }

                return redirect('/draft')->with('success', 'Data Berhasil Diubah!!');
                break;

            case 'submit':
                if ($request->hasFile('gambar')) {
                    $data = artikel::findOrFail($id);

                    $image = $request->file('gambar');
                    $imageName = $image->hashName();
                    $image->storeAs('public/posts', $imageName);

                    Storage::delete('public/posts/' . $data->gambar_artikel);

                    $data->update([
                        'judul' => $request->judul,
                        'cuplikan' => $request->cuplikan,
                        'gambar_artikel' => $image->hashName(),
                        'isi_artikel' => $request->isi,
                        'status_artikel' => 'Menunggu',
                    ]);
                } else {
                    $data = artikel::find($id);
                    $data->update([
                        'judul' => $request->judul,
                        'cuplikan' => $request->cuplikan,
                        'isi_artikel' => $request->isi,
                        'status_artikel' => 'Menunggu',
                    ]);
                }

                return redirect('/draft')->with('success', 'Data Berhasil Diubah!!');
                break;
        }
    }

    function hapustulisan($id)
    {
        $data = artikel::find($id);
        //delete old image
        Storage::delete('public/posts/' . $data->gambar_artikel);

        $data->delete();


        return redirect('/status')->with('success', 'Data Berhasil Dihapus!!');
    }

    function draft()
    {
        $id = Auth::user()->id;
        $data = artikel::where('id_author', $id)->where('status_artikel', 'Disimpan')->get();
        $draft = $data->sortBy([
            ['tgl_artikel', 'desc'],
        ]);

        return view('author.draft', compact('draft'));
    }

    function status()
    {
        $id = Auth::user()->id;
        $data = artikel::where('id_author', $id)->get();
        $status = $data->sortBy([
            ['tgl_artikel', 'desc'],
        ]);

        return view('author.status', compact('status'));
    }

    function pointku()
    {
        return view('author.pointku');
    }
}
