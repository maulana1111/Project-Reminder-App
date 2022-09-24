@extends('layout.master')

@section('content')

<p align="center" class="p1">
         {{ $nowDay }} {{ $text_bulan}},  {{ $nowYear }}
        </p>  

        <p style="" class="p2">
          Jatuh Tempo
        </p>

        <?php $i=0; ?>@foreach($getAllBerkas as $row)

          <?php
            $ex = explode("-", $row->jatuh_tempo);
            $tahunInt = (int)$ex[0];
            $bulanInt = (int)$ex[1];
            $hariInt = (int)$ex[2];

            $tahun = $tahunInt - $nowYear;
            $bulan = $bulanInt - $nowMonth;
            $hari = $hariInt - $nowDay;

            $txtbulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
            $textbulan = $txtbulan[$bulanInt-1];

                  ?>

                  <div class="content">
                    <div class="circle"></div>
                      <a href="/detail/{{ $row->id }}">
                        <span class="span1">
                            {{ $row->nama_berkas }}
                        </span>
                      </a>
                      <span class="span2">
                        {{ $hari }} Hari Lagi          
                      </span>
                      <br>
                      <p class="p3">
                    {{ $hariInt }} {{ $textbulan }} {{ $tahunInt }}
                      </p>
                  </div>

        <?php $i++; ?>@endforeach
@endsection