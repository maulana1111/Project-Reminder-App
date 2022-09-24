@extends('layout.master')

@section('content')
        <p class="p1">
          Form Penanggung
        </p>  
        <form method="post" action="/penanggung/Add">
          {{ csrf_field() }}
          <div class="content-penanggung">
            <div class="content-left">
              <label>Nama</label>
              <input type="text" class="form-control" name="nama">
            </div>
            <div class="content-right">
              <label>Username</label>
              <input type="text" class="form-control" name="username">
            </div>
          </div>
          <div class="content-berkas">
            <div class="content-left" id="self2">
              <label>Password</label>
              <input type="password" class="form-control" name="password">
            </div>
            <div class="content-right" id="self3">
              <label for="option">Penanggung Jawab PT</label>
              <select class="form-control" id="option" name="option">
                <option>- Pilih PT -</option>
                @foreach($dataPT as $row)
                  <option value="{{ $row->id }}">{{ $row->nama_pt }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <button type="submit" class="btn">Simpan</button>


        </form>
        
@endsection