<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ModelBerkas;
use Carbon\Carbon;

class IndexController extends Controller
{
    // public function __construct()
    // {
    //     if(session()->get('member_logged_in'))
    //     {
    //         redirect('/');
    //     }
    // }
    public function index()
    {
        $date = Carbon::now();
        $member_kode = session()->get('member_kode');

        if(session()->get('member_tingkat') == "pertama"){
            $getAllBerkas = ModelBerkas::all();
        }else{
            $getAllBerkas = DB::select('SELECT tbl_berkas.*, tbl_user.nama_user, tbl_kantor.user_id 
                                        FROM ( (tbl_berkas INNER JOIN tbl_kantor ON tbl_berkas.pt_id = tbl_kantor.id ) 
                                        INNER JOIN tbl_user ON tbl_kantor.user_id = tbl_user.id) WHERE jatuh_tempo BETWEEN DATE(NOW() + INTERVAL 0 DAY) AND DATE(NOW() + INTERVAL 7 DAY) 
                                        AND tbl_kantor.user_id = '.$member_kode.'
                                         ');
        }

        $date = Carbon::now();

        $nowYear = (int)$date->format('Y');
        $nowMonth = (int)$date->format('m');
        $nowDay = (int)$date->format('d');

        $bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
        $text_bulan = $bulan[$nowMonth-1];
            
        return view('pages.index', compact('getAllBerkas', 'nowYear', 'nowMonth', 'nowDay', 'text_bulan'));
        // dd($getAllBerkas);
    }
}
