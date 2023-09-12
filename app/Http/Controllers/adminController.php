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
use Barryvdh\DomPDF\Facade\Pdf;

class adminController extends Controller
{
    function index()
    {
        $no = 1;
        $author = User::where('role', 'author')->count();
        $admin = User::where('role', 'admin')->count();
        $artikel_confirm = artikel::where('status_artikel', 'Disetujui')->count();
        $artikel_waiting = artikel::where('status_artikel', 'Menunggu')->count();
        $tayangan_artikel = artikel::orderBy('tayangan', 'desc')->limit(3)->get();

        return view('admin.index', compact('no', 'author', 'admin', 'artikel_confirm', 'artikel_waiting', 'tayangan_artikel'));
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

    function views_akun()
    {
        $data = User::orderBy('created_at', 'desc')->get();
        $status = '';
        return view('admin.dataakun', compact('data', 'status'));
    }

    function views_akun_author()
    {
        $data = User::orderBy('created_at', 'desc')->where('role', 'author')->get();
        $status = 'Author';
        return view('admin.dataakun', compact('data', 'status'));
    }

    function views_akun_admin()
    {
        $data = User::orderBy('created_at', 'desc')->where('role', 'admin')->get();
        $status = 'Admin';
        return view('admin.dataakun', compact('data', 'status'));
    }

    function search_akun(Request $request)
    {
        $cari = $request->cari;
        $data = User::orderBy('created_at', 'desc')->where('name', 'like', "%" . $cari . "%")->get();
        $status = '';
        return view('admin.dataakun', compact('data', 'status'));
    }

    function search_akun_author(Request $request)
    {
        $cari = $request->cari;
        $data = User::orderBy('created_at', 'desc')->where('role', 'author')->where('name', 'like', "%" . $cari . "%")->get();
        $status = 'Author';
        return view('admin.dataakun', compact('data', 'status'));
    }

    function search_akun_admin(Request $request)
    {
        $cari = $request->cari;
        $data = User::orderBy('created_at', 'desc')->where('role', 'admin')->where('name', 'like', "%" . $cari . "%")->get();
        $status = 'Admin';
        return view('admin.dataakun', compact('data', 'status'));
    }

    function verifikasiakun($id)
    {
        $data = User::find($id);
        $data->update([
            'email_verified_at' => Carbon::now(),
        ]);

        $status = $data->role;
        if ($status == 'author') {
            return redirect('/dataauthor')->with('success', 'Akun Berhasil Diverifikasi!!');
        } elseif ($status == 'admin') {
            return redirect('/dataadmin')->with('success', 'Akun Berhasil Diverifikasi!!');
        }
    }

    function views_artikel()
    {
        $no = 1;
        $artikel = artikel::orderBy('created_at', 'desc')->get();
        $status = '';
        return view('admin.dataartikel', compact('artikel', 'no', 'status'));
    }

    function views_artikel_menunggu()
    {
        $no = 1;
        $artikel = artikel::orderBy('created_at', 'desc')->where('status_artikel', 'Menunggu')->get();
        $status = 'Menunggu';
        return view('admin.dataartikel', compact('artikel', 'no', 'status'));
    }

    function views_artikel_disetujui()
    {
        $no = 1;
        $artikel = artikel::orderBy('created_at', 'desc')->where('status_artikel', 'Disetujui')->get();
        $status = 'Disetujui';
        return view('admin.dataartikel', compact('artikel', 'no', 'status'));
    }

    function search_artikel(Request $request)
    {
        $cari = $request->cari;
        $no = 1;
        $artikel = artikel::orderBy('created_at', 'desc')->where('judul', 'like', "%" . $cari . "%")->get();
        $status = '';
        return view('admin.dataartikel', compact('artikel', 'no', 'status'));
    }

    function search_artikel_menunggu(Request $request)
    {
        $cari = $request->cari;
        $no = 1;
        $artikel = artikel::orderBy('created_at', 'desc')->where('judul', 'like', "%" . $cari . "%")->where('status_artikel', 'Menunggu')->get();
        $status = 'Menunggu';
        return view('admin.dataartikel', compact('artikel', 'no', 'status'));
    }

    function search_artikel_disetujui(Request $request)
    {
        $cari = $request->cari;
        $no = 1;
        $artikel = artikel::orderBy('created_at', 'desc')->where('judul', 'like', "%" . $cari . "%")->where('status_artikel', 'Disetujui')->get();
        $status = 'Disetujui';
        return view('admin.dataartikel', compact('artikel', 'no', 'status'));
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

    function laporanakun()
    {
        $data = User::get();
        $status = '';
        return view('admin.laporanakun', compact('data', 'status'));
    }

    function laporanakun_author()
    {
        $data = User::where('role', 'author')->get();
        $status = 'Author';
        return view('admin.laporanakun', compact('data', 'status'));
    }

    function laporanakun_admin()
    {
        $data = User::where('role', 'admin')->get();
        $status = 'Admin';
        return view('admin.laporanakun', compact('data', 'status'));
    }

    function generatepdf()
    {
        $data = User::all();
        $status = '';

        $pdf = Pdf::loadView('admin.laporanakun', [
            'data' => $data,
            'status' => $status,
        ]);
        $pdf->setPaper('A4', 'portrait');

        return $pdf->download('Laporan Akun - ' . now() . '.pdf');
    }

    function generatepdf_author()
    {
        $data = User::where('role', 'author')->get();
        $status = 'Author';

        $pdf = Pdf::loadView('admin.laporanakun', [
            'data' => $data,
            'status' => $status,
        ]);
        $pdf->setPaper('A4', 'portrait');

        return $pdf->download('Laporan Akun Author - ' . now() . '.pdf');
    }

    function generatepdf_admin()
    {
        $data = User::where('role', 'admin')->get();
        $status = 'Admin';

        $pdf = Pdf::loadView('admin.laporanakun', [
            'data' => $data,
            'status' => $status,
        ]);
        $pdf->setPaper('A4', 'portrait');

        return $pdf->download('Laporan Akun Admin - ' . now() . '.pdf');
    }
}
