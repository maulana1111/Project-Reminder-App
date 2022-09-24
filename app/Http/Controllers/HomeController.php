<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\ModelUser;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        $member = ModelUser::where('username', $username)->first();
        $count = ModelUser::where('username', $username)->get()->count();

        if($count > 0)
        {
            if($password == $member->password)
            {
                session([
                    'member_kode' => $member->id,
                    'member_name' => $member->nama_user,
                    'member_tingkat' => $member->tingkat,
                    'member_logged_in' => TRUE
                ]);

                return redirect('/index')->with('success', 'Berhasil Login');
            }else{
                return redirect('/')->with('failed', "Password Atau Username Salah");
            }
        }else{
            return redirect('/')->with('failed', "Password Atau Username Salah");
        }

    }

    public function logout()
    {
        session()->flush();
        return redirect('/')->with('success', 'Berhasil Logout');
    }
}
