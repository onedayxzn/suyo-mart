<?php

namespace App\Http\Controllers\autentikasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;


class autentikasiController extends Controller
{
    public function index()
    {
        return view('autentikasi.login');
    }

    public function login(Request $request)
    {
        // dd($request->all());
        // $data = User::where('email', $request->email)->firstOrFail();
        // if ($data) {
        //     if (Hash::check($request->password, $data->password)) {
        //         session(['berhasil_login' => true]);
        //         return redirect('/dashboard');
        //     }
        // }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('produk');
        }
        //-
        return redirect('autentikasi.login')->with('message', 'Email atau Password salah');
    }

    public function logout(Request $request)
    {
        // $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }

    public function registerView()
    {
        return view('autentikasi.Register');
    }

    public function register(Request $request)
    {

        $cek_email = User::where('email', $request->email)->first();
        if (!$cek_email) {
            $validate = $request->validate([
                'password' => 'required|min:6|max:12'
            ]);
            $user = new User;
            $user->name = $request->nama;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->alamat = $request->alamat;
            $user->no_telepon = $request->no_telepon;
            $user->save();
            return redirect()->route('login')->with('status', 'Register Success');
        }
        return redirect()->route('Register')->with('message', 'email sudah digunakan silahkan gunakan email lain');
    }
}
