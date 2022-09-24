
    
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
    <nav>
      <div class="left">
        <p id="self">Pengingat</p>
      </div>
      <div class="center">
          <form class="form-inline">
            <input type="text" placeholder="Search" aria-label="Search" style="margin-right: 10px;">
            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
          </form>
      </div>
      <div class="right">
        <ul id="nav" class="nav">
          <li>
              <a href="/index">
                Home
              </a>
          </li>
          <?php if(session()->get('member_tingkat') == "pertama") { ?>
            <li>
                <a href="/penanggung">
                  Tambah Admin
                </a>
            </li>
          <?php } ?>
          <li>
              <a href="#" data-toggle="modal" data-target="#exampleModal1">
                Notif
                <span class="notif" id="notif"></span>
              </a>
              <!-- Modal -->
              <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Notification</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                      <?php 
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

                       ?>

                      @foreach($getAllBerkas as $row)
                        <?php 

                          $ex = explode("-", $row->jatuh_tempo);
                          $tahunInt = (int)$ex[0];
                          $bulanInt = (int)$ex[1];
                          $hariInt = (int)$ex[2];
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
                          <br>
                          <p class="p3">
                            {{ $hariInt }} {{ $textbulan }} {{ $tahunInt }}
                          </p>
                      </div>

                      @endforeach

                    </div>
                  </div>
                </div>
              </div>
          </li>
          <li>
              <a href="/berkas">
                Tambah Berkas
              </a>
          </li>
          <li>
              <a href="/TambahKategori">
                Tambah Kategori
              </a>
          </li>
          <li>
              <a href="#" data-toggle="modal" data-target="#exampleModal">
                <img src="{{ asset('image/avatar.svg') }}">
                <p style="font-size: 16px; font-family: 'Roboto'; margin-left: px !important; display: inline;">
                  {{ session()->get('member_name') }}
                </p>
              </a>
              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <h4>Apakah Anda Ingin Logout ?</h4>
                      <a href="/home/logout" class="btn1 btn-warning">Ya</a>
                      <button type="button" class="btn1 btn-success" data-dismiss="modal">Tidak</button>
                    </div>
                  </div>
                </div>
              </div>

          </li>
        </ul>
        <a href="javascript:void(0)" onclick="myFunction()">
          <img src="{{ asset('image/Nav.png') }}" class="icon">
        </a>
      </div>
    </nav>