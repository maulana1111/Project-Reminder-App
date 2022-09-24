@extends('layout.master')

@section('content')
        <p class="p1">
          Form Kategori
        </p>  
        <form method="post" action="/DoTambahKategori">
          {{ csrf_field() }}
          <div class="content-penanggung">
            <div class="content-left">
              <label>Kategori</label>
              <input type="text" class="form-control" name="kategori">
            </div>
            <div class="content-right">
            </div>
          </div>
          <button type="submit" class="btn">Simpan</button>


        </form>
        
@endsection