<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ModelBerkas;
use App\Models\ModelKategori;
use Carbon\Carbon;

class KategoriController extends Controller
{
    public function index($id)
    {
        $data = DB::table('tbl_berkas')
                                ->join('tbl_kantor', 'tbl_berkas.pt_id', '=', 'tbl_kantor.id')
                                ->join('tbl_user', 'tbl_kantor.user_id', '=', 'tbl_user.id')
                                ->where('tbl_kantor.user_id', '=', session()->get('member_kode'))
        						->where('kategori_id', '=', $id)
                                ->select('tbl_berkas.*', 'tbl_user.nama_user', 'tbl_kantor.user_id', 'tbl_kantor.nama_pt')
                                ->get();
        $dataKategori = ModelKategori::where('id', $id)->first();

        $date = Carbon::now();

        $nowYear = (int)$date->format('Y');
        $nowMonth = (int)$date->format('m');
        $nowDay = (int)$date->format('d');

        $bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
        $text_bulan = $bulan[$nowMonth-1];
         // dd($data);
        return view('pages.kategori', compact('data', 'nowYear', 'nowMonth', 'nowDay', 'text_bulan', 'dataKategori'));
    }

    public function AddKategori()
    {
    	return view('pages.tambah_kategori');
    }

    public function DoAddKategori(Request $request)
    {
    	$kategori = new ModelKategori();
    	
    	$kategori->nama_kategori = $request->kategori;
    	$kategori->save();


        return redirect('/index')->with('success', 'Berhasil Menambah Penanggung');	
    }
}
