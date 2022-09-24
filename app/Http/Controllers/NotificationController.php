<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ModelBerkas;
use Carbon\Carbon;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $member_kode = session()->get('member_kode');
    	if(session()->get('member_tingkat') == "pertama"){
            $getAllBerkas = DB::select('SELECT tbl_berkas.*, tbl_user.nama_user, tbl_kantor.user_id 
                                        FROM ( (tbl_berkas INNER JOIN tbl_kantor ON tbl_berkas.pt_id = tbl_kantor.id ) 
                                        INNER JOIN tbl_user ON tbl_kantor.user_id = tbl_user.id) WHERE jatuh_tempo BETWEEN DATE(NOW() + INTERVAL 0 DAY) AND DATE(NOW() + INTERVAL 7 DAY)');
        }else{

            $getAllBerkas = DB::select('SELECT tbl_berkas.*, tbl_user.nama_user, tbl_kantor.user_id 
                                        FROM ( (tbl_berkas INNER JOIN tbl_kantor ON tbl_berkas.pt_id = tbl_kantor.id ) 
                                        INNER JOIN tbl_user ON tbl_kantor.user_id = tbl_user.id) WHERE jatuh_tempo BETWEEN DATE(NOW() + INTERVAL 0 DAY) AND DATE(NOW() + INTERVAL 7 DAY) 
                                        AND tbl_kantor.user_id = '.$member_kode.'
                                         ');
        }


        $count = 0;
        foreach($getAllBerkas as $row)
        {
            $count+=1;
        }
        return json_encode($count);

    }
    function Notif() {
        $content      = array(
            "en" => 'Ada Pembayaran Yang Harus Dibayar Dalam Waktu 7 Hari'
        );
        $heading      = array(
            "en" => 'English Title'
        );
        $fields = array(
            'app_id' => "a674eb35-f2f8-42a1-be7e-5d79276763be",
            'included_segments' => array(
                'Subscribed Users'
            ),
            'contents' => $content,
            'heading' => $heading
        );
        
        $fields = json_encode($fields);
        print("\nJSON sent:\n");
        print($fields);
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=utf-8',
            'Authorization: Basic MjQ4NWQ5YjktN2EwNy00ODk1LThjMDYtN2RjMTAxNGIwMzg2'
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
        

        // $response = sendMessage();
        // $return["allresponses"] = $response;
        // $return = json_encode($return);

        // $data = json_decode($response, true);
        // print_r($data);
        // $id = $data['id'];
        // print_r($id);

        // print("\n\nJSON received:\n");
        // print($return);
        // print("\n");

    }

    
}
