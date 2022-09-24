<div class="category">

          <p class="p4">Kategori</p>

          @foreach(DB::table('tbl_kategori')->get() as $row)
      <div class="circle" style="background-color: rgb(<?php echo rand(0,255) ?>, <?php echo rand(0,255) ?>, <?php echo rand(0,255) ?>);"></div>
            <a href="/kategori/{{ $row->id }}" class="p5">{{ $row->nama_kategori }}</a>
            <p class="p5"></p>
          @endforeach

        </div>
        <div class="lokasi">
            <!-- <p>PT B</p>
            <p>PT C</p> -->

          <p class="p4">Lokasi</p>


          @foreach(DB::table('tbl_kantor')->get() as $row)
            <div class="isi">
              <p>{{ $row->nama_pt }}</p>

              <div class="gambar">
                <a href="https://www.google.com/maps/search/?api=1&query=PT.+Mayaksa+Mugi+Mulia" target="_blank">
                  <img src="{{ asset('image/bxs-map.png') }}">
                </a>
              </div>
            </div>
          @endforeach
          </div>