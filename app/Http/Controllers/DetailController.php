<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetailController extends Controller
{

    public function detailBerkas($id)
    {
    	$data = DB::table('tbl_berkas')
    				->where('id', $id)
    				->first();
    	if($data->jumlah_tunggakan > $data->total_cicilan)
    	{
    		$getKondisi = 'belum_lunas';
    	}else{
    		$getKondisi = 'lunas';
    	}

    	$dataCicilan = DB::table('tbl_pembayaran')
    					->where('berkas_id', $data->id)->get();

    	return view('pages.detail', compact('data', 'dataCicilan', 'getKondisi'));
    }
}
