<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelKantor;
use App\Models\ModelUser;
use Illuminate\Support\Facades\DB;

class PenanggungController extends Controller
{
    public function index()
    {

    	$dataPT = ModelKantor::where('user_id', 0)->get();
        return view('pages.penanggung', compact('dataPT'));

    }

    public function Add(Request $request)
    {
    	$modelUser = new ModelUser;
    	$modelKantor = new ModelKantor;

    	$modelUser->nama_user = $request->nama;
    	$modelUser->username = $request->username;
    	$modelUser->password = $request->password;
    	$modelUser->save();


        $last_id = DB::getPdo()->lastInsertId();

    	$modelKantor = ModelKantor::find($request->get('option'));
    	$modelKantor->user_id = $last_id;
    	$modelKantor->save();

    	// dd($last_id);
        return redirect('/penanggung')->with('success', 'Berhasil Menambah Penanggung');
    	
    }
}
