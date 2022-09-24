<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ModelBerkas;
use Illuminate\Support\Facades\Mail;
use App\Mail\PostMail;

class EmailController extends Controller
{
    public function sendEmail()
    {
    	 $getAllBerkas = DB::select('SELECT tbl_berkas.*, tbl_user.nama_user, tbl_user.gmail, tbl_kantor.user_id 
                                        FROM ( (tbl_berkas INNER JOIN tbl_kantor ON tbl_berkas.pt_id = tbl_kantor.id ) 
                                        INNER JOIN tbl_user ON tbl_kantor.user_id = tbl_user.id) WHERE jatuh_tempo BETWEEN DATE(NOW() + INTERVAL 0 DAY) AND DATE(NOW() + INTERVAL 7 DAY)');

    	 foreach($getAllBerkas as $row)
    	 {
    	 	Mail::to($row->gmail)->send(new PostMail);
    	 }

    	 // dd($getAllBerkas);
    }
}
