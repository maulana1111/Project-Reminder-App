@extends('layout.master')

@section('content')

        <p class="p1">
          Form Berkas
        </p>  
        <form action="/berkas/AddBerkas" method="post">
          {{ csrf_field() }}
          <div class="content-berkas">
            <div class="content-left">
              <label>Kode Berkas</label>
              <input type="text" class="form-control" name="id" value="{{ $count }}" disabled="disabled">
            </div>
            <div class="content-right">
              <label>Nama Berkas</label>
              <input type="text" class="form-control" name="nama_berkas">
            </div>
          </div>
          <div class="content-berkas">
            <div class="content-left" id="self21">
              <label>Jumlah Tunggakan</label>
              <input type="number" class="form-control" name="jumlah_tunggakan">
            </div>
            <div class="content-right" id="self31">
              <label>Jatuh Tempo</label>
              <input type="date" class="form-control" name="tgl_jatuh_tempo">
            </div>
          </div>
          <div class="content-berkas">
            <div class="content-left" id="self11">
              <label for="option">Penanggung Jawab PT</label>
              <select class="form-control" id="option" name="option">
                @foreach($kantor as $row)
                  <option value="{{ $row->id }}">{{ $row->nama_pt }}</option>
                @endforeach
              </select>
            </div>
            <div class="content-right" id="self41">
              <label for="option">Kategori</label>
              <select class="form-control" id="option" name="option1">
                @foreach($kategori as $row1)
                  <option value="{{ $row1->id }}">{{ $row1->nama_kategori }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <button type="submit" id="btn_berkas">Simpan</button>

        </form>
        

@endsection