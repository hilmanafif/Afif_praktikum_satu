@extends('dashboard')

@section('content')
    <div class="row">
      <div class="container">
      <div class="col-md-3">
        <img src="{{url('img/tirta-raharja.jpg')}}" class="img-responsive center-block" style="max-height:150px;">
      </div>
      <div class="col-md-9">
        <center>
          <h1>PERINCIAN PENGHASILAN PEGAWAI</h1>
          <h3>PDAM TIRTA RAHARJA KABUPATEN BANDUNG</h3>
          GAJI <b>{{date('F Y')}} </b>
        </center>
      </div>
    </div>
    <div class="container">
      <div class="col-md-4">

        <div class="form-horizontal">
          <div class="form-group">
            <label for="nipp" class="col-sm-3 control-label">NIPP</label>
            <div class="col-sm-9">
              <input type="text" name="nipp" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label for="nama" class="col-sm-3 control-label">Nama</label>
            <div class="col-sm-9">
              <input type="text" name="nama" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label for="kota" class="col-sm-3 control-label">Kota</label>
            <div class="col-sm-9">
              <input type="text" name="kota" class="form-control">
            </div>
          </div>

        </div>
      </div>
      <div class="col-md-5">

        <div class="row">
          <div class="col-md-6">

            <div class="form-horizontal">
              <div class="form-group">
                <label for="wilayah" class="col-sm-4 control-label">Wilayah</label>
                <div class="col-sm-8">
                  <input type="text" name="wilayah" class="form-control">
                </div>
              </div>

              <div class="form-group">
                <label for="golongan" class="col-sm-4 control-label">Gol/Ruang</label>
                <div class="col-sm-8">
                  <input type="text" name="golongan" class="form-control">
                </div>
              </div>

            </div>
          </div>
          <div class="col-md-6">

            <div class="form-horizontal">
              <div class="form-group">
                <label for="kodjab" class="col-sm-4 control-label">Kode Jab</label>
                <div class="col-sm-8">
                  <input type="text" name="kodjab" class="form-control">
                </div>
              </div>

              <div class="form-group">
                <label for="kodwil" class="col-sm-4 control-label">Kode Wil</label>
                <div class="col-sm-8">
                  <input type="text" name="kodwil" class="form-control">
                </div>
              </div>

            </div>
          </div>
        </div>

      </div>
      <div class="col-md-3">
        <img src="{{url('img/user-img.png')}}" class="img-responsive center-block" style="max-height:175px">
      </div>
    </div>

<hr>

      <div class="container">
        <div class="col-md-8">
          <h2>DAFTAR PENERIMAAN</h2>
            <div class="col-md-6">

              <div class="form-horizontal">
                <div class="form-group">
                  <label for="" class="col-sm-4 control-label">Gaji Pokok</label>
                  <div class="col-sm-8">
                    <input type="text" name="" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label for="" class="col-sm-4 control-label">Tunjangan Istri</label>
                  <div class="col-sm-8">
                    <input type="text" name="" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label for="" class="col-sm-4 control-label">Tunjangan Anak</label>
                  <div class="col-sm-8">
                    <input type="text" name="" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label for="" class="col-sm-4 control-label">Natura</label>
                  <div class="col-sm-8">
                    <input type="text" name="" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label for="" class="col-sm-4 control-label">Honor</label>
                  <div class="col-sm-8">
                    <input type="text" name="" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label for="" class="col-sm-4 control-label">Tunjangan Perusahaan</label>
                  <div class="col-sm-8">
                    <input type="text" name="" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label for="" class="col-sm-4 control-label">Tunjangan Jabatan</label>
                  <div class="col-sm-8">
                    <input type="text" name="" class="form-control">
                  </div>
                </div>

              </div>

            </div>
            <div class="col-md-6">

              <div class="form-horizontal">

                <div class="form-group">
                  <label for="" class="col-sm-4 control-label">Tunjangan Perumahan</label>
                  <div class="col-sm-8">
                    <input type="text" name="" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label for="" class="col-sm-4 control-label">Tunjangan Kehadiran</label>
                  <div class="col-sm-8">
                    <input type="text" name="" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label for="" class="col-sm-4 control-label">Tunjangan Kendaraan</label>
                  <div class="col-sm-8">
                    <input type="text" name="" class="form-control">
                  </div>
                </div>

              </div>

            </div>
        </div>

        <div class="col-md-4">

          <h2>DAFTAR POTONGAN</h2>

          <div class="form-horizontal">

            <div class="form-group">
              <label for="" class="col-sm-4 control-label">Iuran DW</label>
              <div class="col-sm-8">
                <input type="text" name="" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <label for="" class="col-sm-4 control-label">Tabungan</label>
              <div class="col-sm-8">
                <input type="text" name="" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <label for="" class="col-sm-4 control-label">Jamsostek</label>
              <div class="col-sm-8">
                <input type="text" name="" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <label for="" class="col-sm-4 control-label">Dapenma</label>
              <div class="col-sm-8">
                <input type="text" name="" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <label for="" class="col-sm-4 control-label">Iuran YKPP</label>
              <div class="col-sm-8">
                <input type="text" name="" class="form-control">
              </div>
            </div>

          </div>

        </div>
    </div>

    <hr>

    <div class="container">
      <div class="col-sm-8">
        <div class="row">
          <div class="col-sm-6">
            <div class="form-horizontal">

              <div class="form-group">
                <label for="" class="col-sm-4 control-label">Sub Total</label>
                <div class="col-sm-8">
                  <input type="text" name="" class="form-control">
                </div>
              </div>

            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-horizontal">

              <div class="form-group">
                <label for="" class="col-sm-4 control-label">Jumlah Tunjangan</label>
                <div class="col-sm-8">
                  <input type="text" name="" class="form-control">
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    </div>

</div>
@stop
