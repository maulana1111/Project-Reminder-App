<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelPembayaran;
use App\Models\ModelBerkas;
use App\Models\ModelKantor;
use App\Models\ModelKategori;
use Illuminate\Support\Facades\DB;


class BerkasController extends Controller
{
    public function index()
    {   
        $data = ModelBerkas::orderBy('id', 'DESC')->first();
        $count = $data->id + 1;
        $kantor = ModelKantor::all();
        $kategori = ModelKategori::all();
        // dd($count);
        return view('pages.berkas', compact('count', 'kantor', 'kategori'));
    }

    public function addPembayaran(Request $request)
    {
    	$berkas_id = $request->berkas_id;
        $dataBerkas = ModelBerkas::find('id', $berkas_id)->first();

    	ModelPembayaran::insert([
    		'jumlah_bayar' => $request->uang,
    		'tgl_bayar' => $request->tanggal,
    		'berkas_id' => $berkas_id,
    		'pt_id' => $request->pt_id
    	]);

    	$data = ModelPembayaran::where('berkas_id', $berkas_id)->get();
    	$total = 0;
    	foreach($data as $row)
    	{
    		$total += $row->jumlah_bayar;
    	}
    	// dd($total);

        if($total == $dataBerkas->jumlah_tunggakan)
        {
            DB::table('tbl_berkas')->where('id', $berkas_id)->update([
                'total_cicilan' => $total,
                'kondisi' => 'lunas'
            ]);
        }else{
            DB::table('tbl_berkas')->where('id', $berkas_id)->update([
                'total_cicilan' => $total
            ]);
        }

        return redirect('/detail/'.$berkas_id)->with('success', 'Berhasil Menambah Cicilan');
    }

    public function addNewBerkas(Request $request)
    {
        $berkas = new ModelBerkas();

        $berkas->nama_berkas = $request->nama_berkas;
        $berkas->jumlah_tunggakan = $request->jumlah_tunggakan;
        $berkas->total_cicilan = 0;
        $berkas->jatuh_tempo = $request->tgl_jatuh_tempo;
        $berkas->kondisi = "belum_lunas";
        $berkas->kategori_id = $request->get('option');
        $berkas->pt_id = $request->get('option1');

        $berkas->save();

        return redirect('/index')->with('success', 'Berhasil Menambah Cicilan');

    }
}
