@extends('layout.master')

@section('content')
    
    @if($message = Session::get('failed'))
    <div class="alert alert-danger alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
        {{ $message }}
    </div>
    @endif
    @if($message = Session::get('success'))
      <div class="alert alert-success alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
        {{ $message }}
      </div>
    @endif

      <div class="left_detail">

        <p class="p1">
          Hosting Web
        </p>  

          <div class="content">
            <div class="content-left">
              <p>Kode</p>
            </div>
            <div class="content-right">
              <span>: </span>
              <span>{{ $data->id }}</span>
            </div>
          </div>

          <div class="content">
            <div class="content-left">
              <p>Nama Berkas</p>
            </div>
            <div class="content-right">
              <span>: </span>
              <span>{{ $data->nama_berkas }}</span>
            </div>
          </div>
          
          <div class="content">
            <div class="content-left">
              <p>Jumlah Tunggakan</p>
            </div>
            <div class="content-right">
              <span>: </span>
              <span>Rp.{{ number_format($data->jumlah_tunggakan, 0,',','.') }}</span>
            </div>
          </div>
          
          <div class="content">
            <div class="content-left">
              <p>Jatuh Tempo</p>
            </div>
            <div class="content-right">
              <span>: </span>
              <span>{{ $data->jatuh_tempo }}</span>
            </div>
          </div>
          
          <div class="content">
            <div class="content-left">
              <p>Sudah Di bayar</p>
            </div>
            <div class="content-right">
              <span>: </span>
              <span>
                <a href="#" data-toggle="modal" data-target="#exampleModal1">
                  Rp.{{ number_format($data->total_cicilan, 0,',','.') }}
                </a>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form method="post" action="/berkas/pembayaran">
                          {{ csrf_field() }}
                          <table class="table table-dark">
                            <tr>
                              <th>Cicilan</th>
                              <th>Tanggal Bayar</th>
                            </tr>
                            @foreach($dataCicilan as $row)
                              <tr>
                                <td>Rp.{{ number_format($row->jumlah_bayar, 0,',','.') }}</td>
                                <td>{{ $row->tgl_bayar }}</td>
                              </tr>
                            @endforeach
                            <tr id="form" class="form">
                              <td>
                                <input type="number" name="uang" placeholder="Cicilan" class="form-control">
                              </td>
                              <td>
                                <input type="date" name="tanggal" placeholder="Tanggal" class="form-control">
                              </td>
                            </tr>
                            <tr id="form1" class="form1">
                              <td>
                              </td>
                              <td>
                                <input type="hidden" name="berkas_id" value="{{ $data->id }}">
                                <input type="hidden" name="pt_id" value="{{ $data->pt_id }}">
                                <input type="submit" name="submit" value="Simpan" class="btn btn-successs">
                              </td>
                            </tr>
                          </table>
                        </form>
                        <a href="javascript:void(0)" onclick="myFunction2()" class="btn">Tambah Cicilan</a>
                        <button type="button" class="btn1 btn-warning" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>

              </span>
            </div>
          </div>
          
          <div class="content">
            <div class="content-left">
              <p>Kondisi</p>
            </div>
            <div class="content-right">
              <span>: </span>
              <?php if($getKondisi == "belum_lunas") { ?>
                <span style="color: red">Belum Lunas</span>
              <?php }else{ ?>
                <span style="color: green">Lunas</span>
              <?php } ?>
            </div>
          </div>
      </div>
  
	
@endsection