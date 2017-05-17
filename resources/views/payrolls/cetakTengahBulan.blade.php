<link rel="stylesheet" type="text/css" href="{{url('/css/app.css')}}">
    <div class="row">
      <div class="container">
      <div class="col-xs-3">
        <img src="{{url('img/tirta-raharja.jpg')}}" class="img-responsive center-block" style="max-height:150px;">
      </div>
      <div class="col-xs-9">
        <center>
          <h1>PERINCIAN PENGHASILAN PEGAWAI</h1>
          <h3>PDAM TIRTA RAHARJA KABUPATEN BANDUNG</h3>
          GAJI <b>{{date("d F Y", strtotime($payroll->start_date))}}-{{date("d F Y", strtotime($payroll->end_date))}}</b>
        </center>
      </div>
    </div>
    <div class="container">
      <table class="table table-bordered">
        <tr>
          <td>NIPP</td>
          <td>{{$payroll->users->employee_number}}</td>

          <td>Wilayah</td>
          <td>{{$payroll->users->wilayahs->name}}</td>

          <td>Kode Jabatan</td>
          <td>{{$payroll->users->jabatans->kode}}</td>

          <td rowspan="3" style="max-width:100px;"><img src="{{url('img/user-img.png')}}" style="width:100px;" class="img-responsive center-block"></td>

        </tr>
        <tr>
          <td>Nama</td>
          <td>{{$payroll->name}}</td>

          <td>Gol/Ruang</td>
          <td>{{$payroll->users->pangkats->kode}}/{{$payroll->users->ruang}}</td>

          <td>Kode Wilayah</td>
          <td>{{$payroll->users->wilayahs->kode}}</td>
        </tr>
        <tr>
          <td>Kota</td>
          <td>{{$payroll->users->wilayahs->name}}</td>

          <td>Jabatan</td>
          <td colspan="3">{{$payroll->users->jabatans->name}}</td>
        </tr>
      </table>

<hr>

        <table class="table table-bordered">
          <tr>
            <td colspan="4"><b>Daftar Penerimaan</b></td>
            <td colspan="2"><b>Daftar Potongan</b></td>
          </tr>
          <tr>
            <td>Gaji Pokok</td>
            <td>Rp. {{number_format($payroll->gapok,0,',','.')}}</td>

            <td>Tunjangan Perum</td>
            <td>Rp. {{number_format(rand(100000,10000000),0,',','.')}}</td>

            <td>Iuran DW</td>
            <td>Rp. {{number_format(rand(100000,10000000),0,',','.')}}</td>
          </tr>
          <tr>
            <td>Tunjangan Istri</td>
            <td></td>

            <td>Tunjangan Kehadiran</td>
            <td></td>

            <td>Tabungan</td>
            <td></td>
          </tr>
          <tr>
            <td>Tunjangan Anak</td>
            <td></td>

            <td>Tunjangan Kendaraan</td>
            <td></td>

            <td>Jamsostek</td>
            <td></td>
          </tr>
          <tr>
            <td>Natura</td>
            <td></td>

            <td colspan="2" rowspan="4"></td>

            <td>Dapenma</td>
            <td></td>
          </tr>
          <tr>
            <td>Honor</td>
            <td></td>

            <td>Iuran YKPP</td>
            <td></td>
          </tr>
          <tr>
            <td>Tunjangan Perusahaan</td>
            <td>Rp. {{number_format($payroll->users->jabatans->Tunpres,0,',','.')}}</td>

            <td colspan="2" rowspan="6">
              <div class="row">
                <div class="col-xs-12">
                  <table class="table text-center" style="border:none">
                    <tr>
                      <td style="border:none">Nama Kota, {{date("d F Y")}}</td>
                    </tr>
                    <tr>
                      <td style="border:none">Kepala Bagian SDM</td>
                    </tr>
                    <tr>
                      <td style="border:none;height:100px;"></td>
                    </tr>
                    <tr>
                      <td style="border:none">Heri Rahendra, SmHk. SSos</td>
                    </tr>
                  </table>
                </div>
            </div>
            </td>
          </tr>
          <tr>
            <td>Tunjangan Jabatan</td>
            <td>Rp. {{number_format($payroll->users->jabatans->Tunjab,0,',','.')}}</td>
          </tr>
          <tr>
            <td> <b>Sub Total</b> </td>
            <td></td>

            <td> <b>Jumlah Tunjangan</b> </td>
            <td></td>

          </tr>

          <tr>
            <td > <b>Total Penghasilan</b> </td>
            <td> <b>Rp. {{number_format(rand(100000,10000000),0,',','.')}}</b> </td>
          </tr>
          <tr>
            <td> <b>Total Potongan</b> </td>
            <td></td>
          </tr>
          <tr>
            <td><b>Gaji Bersih</b></td>
            <td></td>
          </tr>

        </table>

  </div>
</div>