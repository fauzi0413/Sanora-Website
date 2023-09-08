<?php

namespace App\Http\Controllers;

use App\Models\artikel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Laravel\Ui\Presets\React;

class adminController extends Controller
{
    function index()
    {
        return view('admin.index');
    }

    function infoakun()
    {
        return view('admin.infoakun');
    }

    function pengaturan()
    {
        return view('admin.pengaturanakun');
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

        return redirect('/pengaturan-admin')->with('success', 'Data Berhasil Diubah!!');
    }

    function pengaturanpassword()
    {
        return view('admin.pengaturansandi');
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

        return redirect('/pengaturan-admin')->with('success', 'Profile berhasil diubah!!');
    }

    function views_akun_author()
    {
        $data = User::where('role', 'author')->get();
        $status = 'Author';
        return view('admin.dataakun', compact('data', 'status'));
    }

    function views_akun_admin()
    {
        $data = User::where('role', 'admin')->get();
        $status = 'Admin';
        return view('admin.dataakun', compact('data', 'status'));
    }

    function views_artikel()
    {
        $no = 1;
        $artikel = artikel::orderBy('updated_at', 'desc')->get();
        return view('admin.dataartikel', compact('artikel', 'no'));
    }

    function detail_artikel($id)
    {
        $data = artikel::join('users', 'artikels.id_author', '=', 'users.id')->select('artikels.*', 'users.name')->where('artikels.id', $id)->get();
        return view('admin.detailartikel', compact('data'));
    }


    function hapus_artikel($id)
    {
        $data = artikel::find($id);
        //delete old image
        Storage::delete('public/posts/' . $data->gambar_artikel);

        $data->delete();

        return redirect('/dataartikel')->with('success', 'Artikel Berhasil Dihapus!!');
    }

    function createakun_views()
    {
        return view('admin.createakun');
    }

    function createakun(Request $request)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required',
                'email' => 'required|unique:users|email:dns',
                'password' => 'required|min:5|confirmed',
                'role' => 'required',
            ]
        );

        // $validatedData['password'] = bcrypt($validatedData['password']);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        $status = $request->role;
        if ($status == 'author') {
            return redirect('/dataauthor')->with('success', 'Data Berhasil Ditambahkan!!');
        } elseif ($status == 'admin') {
            return redirect('/dataadmin')->with('success', 'Data Berhasil Ditambahkan!!');
        }
    }

    function editakun_views($id)
    {
        $data = User::where('id', $id)->first();
        $status = $data->role;
        return view('admin.editakun', compact('data', 'status'));
    }

    function editakun(Request $request, $id)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required|min:1',
                'role' => 'required',
            ]
        );

        User::where('id', $id)->update([
            'name' => $request->name,
            'role' => $request->role,
        ]);

        $status = $request->status;
        if ($status == 'author') {
            return redirect('/dataauthor')->with('success', 'Data Berhasil Diubah!!');
        } elseif ($status == 'admin') {
            return redirect('/dataadmin')->with('success', 'Data Berhasil Diubah!!');
        }
    }

    function hapusakun($id)
    {
        $data = User::find($id);

        //delete old image
        Storage::delete('public/profile/' . $data->profile);

        $data->delete();

        $status = $data->role;
        if ($status == 'author') {
            return redirect('/dataauthor')->with('success', 'Data Berhasil Dihapus!!');
        } elseif ($status == 'admin') {
            return redirect('/dataadmin')->with('success', 'Data Berhasil Dihapus!!');
        }
    }

    function submitartikel($id)
    {
        $data = artikel::find($id);

        $data->update([
            'status_artikel' => 'Disetujui',
        ]);

        return redirect('/dataartikel')->with('success', 'Artikel Tersebut Berhasil Dipublish!!');
    }

    function kirimcatatan(Request $request, $id)
    {
        switch ($request->input('submit')) {
            case 'simpan':
                $data = artikel::find($id);

                $data->update([
                    'catatan' => $request->catatan,
                ]);

                return redirect('/dataartikel')->with('success', 'Catatan Berhasil Disimpan!!');
                break;

            case 'submit':
                $id = $request->id;
                $data = artikel::find($id);

                $data->update([
                    'catatan' => $request->catatan,
                    'status_artikel' => 'Ditolak',
                ]);

                return redirect('/dataartikel')->with('success', 'Catatan Berhasil Diberikan!!');
                break;
        }
    }
}
