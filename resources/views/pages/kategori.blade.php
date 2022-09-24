@extends('layout.master')

@section('content')

	<p align="center" class="p1">
         {{ $nowDay }} {{ $text_bulan}},  {{ $nowYear }}
        </p>  

        <p class="p6">
          {{ $dataKategori->nama_kategori }}
        </p>

        @foreach($data as $row)

        <?php 

            $ex = explode("-", $row->jatuh_tempo);
            $tahunInt = (int)$ex[0];
            $bulanInt = (int)$ex[1];
            $hariInt = (int)$ex[2];

            $tahun = $tahunInt - $nowYear;
            $bulan = $bulanInt - $nowMonth;
            $hari = $hariInt - $nowDay;


            $bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
            $text_bulan = $bulan[$bulanInt-1];

         ?>

            <div class="content">
              <div class="circle"></div>
                <span class="span1">
                    {{ $row->nama_berkas }}
                </span>
                <span class="span2">
                    {{ $hari }} hari lagi
                </span>
                <br>
                <p class="p3">
                    {{ $hariInt }} {{ $text_bulan }} {{ $tahunInt }}
                </p>
            </div> 
        @endforeach

@endsection