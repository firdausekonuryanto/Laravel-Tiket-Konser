<?php

namespace App\Http\Controllers;

use App\Models\Penonton;
use App\Models\tiket;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use \App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use PHPUnit\Framework\Attributes\Ticket;

class UserloginController extends Controller
{
    public function home()
    {
        return view('userlogin.home', [
            'title' => "Halaman Home"
        ]);
    }
    public function dashboard()
    {
        $penonton = Penonton::where('id_user', '=', Auth::user()->id)->first();

        return view('userlogin.dashboard', [
            'title' => "Halaman Dasboard",
            'penonton' => $penonton
        ]);
    }

    public function transaksi()
    {
        $tiket = tiket::with('penonton')->where('id_penonton', '=', Auth::user()->id)->get(['*', 'tikets.created_at as created']);

        (!empty($tiket[0]['id_tiket'])) ? $tiketx = $tiket : $tiketx = '';

        return view('userlogin.transaksi', [
            'title' => "Halaman Pemesanan Tiket",
            'tiket' => $tiketx
        ]);
    }

    public function store_transaksi(Request $request)
    {
        $tiket = tiket::where('id_tiket', '=', $request->input_code)->first();

        $cek = (!empty($tiket['id_tiket'])) ? TRUE : FALSE;
        if ($cek == 1) {
            tiket::where('id_tiket', $request->input_code)->update([
                'id_penonton' =>  Auth::user()->id
            ]);
        }
        return Redirect::to('transaksi');
    }

    // public function semuapenonton(Request $request)
    // {
    //     $perPage = 8; // Jumlah item per halaman
    //     $currentPage = $request->input('page', 1); // Halaman saat ini
    //     $startNumber = ($currentPage - 1) * $perPage + 1; // Angka awal pada halaman saat ini

    //     // Query untuk mendapatkan data penonton dengan paginasi
    //     $penonton = Penonton::paginate($perPage);

    //     // Menambahkan nomor urut pada setiap item penonton
    //     $penonton->getCollection()->transform(function ($item, $key) use ($startNumber) {
    //         $item->number = $startNumber + $key;
    //         return $item;
    //     });

    //     return view('userlogin.semuapenonton', ['penonton' => $penonton, 'title' => 'Halaman Penonton']);
    // }

    public function semuapenonton(Request $request)
    {
        $penonton = Penonton::all();

        return view('userlogin.semuapenonton', ['penonton' => $penonton, 'title' => 'Halaman Penonton']);
    }

    public function validasitiket()
    {
        // $tiket = tiket::join('penontons', 'penontons.id_user', '=', 'tikets.id_penonton')
        //     ->get(['*', 'tikets.created_at as created']);

        $tiket = tiket::with('penonton')->whereNotNull('id_penonton')->get();

        return view('userlogin.validasitiket', ['title' => 'Halaman Validasi Tiket', 'tiket_validasi' => $tiket]);
    }

    public function check_in(Request $request)
    {
        echo $request->input_code;
        tiket::where('id_tiket', $request->input_code)->update([
            'sts_pemakaian' =>  1
        ]);
        Session::flash('message', 'Successfully Update status Check In!');
        return Redirect::to('validasitiket');
    }

    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/dashboard');
        }

        return back()->with('statusError', 'Account in corect !!!');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
