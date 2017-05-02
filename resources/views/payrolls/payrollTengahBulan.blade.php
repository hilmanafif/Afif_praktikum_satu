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

          <td rowspan="3" style="max-width:50px;"><img src="{{url('img/user-img.png')}}" style="width:100px;" class="img-responsive center-block"></td>

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
            <td colspan="2"><b>Daftar Penerimaan</b></td>
            <td colspan="5"><b>Daftar Potongan</b></td>
          </tr>
          <tr>
            <td>Gaji Pokok</td>
            <td>Rp. {{number_format($payroll->gapok,0,',','.')}}</td>

            <td>Dapenma</td>
            <td>Rp. {{number_format(rand(100000,10000000),0,',','.')}}</td>

            <td>BTN</td>
            <td>Rp. {{number_format(rand(100000,10000000),0,',','.')}}</td>
            <td>Ke x sisa y</td>
          </tr>
          <tr>
            <td>Tunjangan Istri</td>
            <td></td>

            <td>BPJS KT</td>
            <td></td>

            <td>Motor</td>
            <td></td>
            <td>Ke x sisa y</td>
          </tr>
          <tr>
            <td>Tunjangan Anak</td>
            <td></td>

            <td>Iuran DW</td>
            <td></td>

            <td>Kop. Rutin</td>
            <td></td>
            <td>Ke x sisa y</td>
          </tr>
          <tr>
            <td>Natura</td>
            <td></td>

            <td>Inkop Pamsi</td>
            <td></td>

            <td>Kop. Perum</td>
            <td></td>
            <td>Ke x sisa y</td>
          </tr>
          <tr>
            <td>Honor</td>
            <td></td>

            <td>Iuran Koperasi</td>
            <td></td>

            <td>Kop. Kredit</td>
            <td></td>
            <td>Ke x sisa y</td>
          </tr>
          <tr>
            <td><b>Sub Total A</b></td>
            <td><b>Rp. {{number_format(rand(100000,10000000),0,',','.')}}</b></td>

            <td>Hutang Pegawai</td>
            <td></td>

            <td>BJB</td>
            <td></td>
            <td>Ke x sisa y</td>
          </tr>
          <tr>
            <td>Tunjangan Kinerja</td>
            <td></td>

            <td>ZIS</td>
            <td></td>

            <td>Waserda</td>
            <td></td>
            <td>Ke x sisa y</td>
          </tr>
          <tr>
            <td>Tunjangan Jabatan</td>
            <td>Rp. {{number_format($payroll->users->jabatans->Tunjab,0,',','.')}}</td>

            <td>Lain-lain</td>
            <td></td>
          </tr>
          <tr>
            <td>Tunjangan Kendaraan</td>
            <td></td>

            <td>BPJS Kesehatan</td>
            <td></td>
          </tr>
          <tr>
            <td>Tunjangan Pelaksana</td>
            <td>Rp. {{number_format($payroll->users->jabatans->Tupel,0,',','.')}}</td>

            <td>BPJS Pensiun</td>
            <td></td>
          </tr>
          <tr>
            <td><b>Sub Total B</b></td>
            <td><b></b></td>

            <td><b>Total Potongan</b></td>
            <td></b></td>
          </tr>
          <tr>
            <td><b>Total Penghasilan</b></td>
            <td><b></b></td>
            <td colspan="2"></td>
          </tr>
          <tr>
            <td colspan="2"></td>

            <td><b>Gaji Bersih</b></td>
            <td></b></td>
          </tr>
        </table>

    <hr>
    <div class="row">
      <div class="col-md-8">
      </div>
      <div class="col-md-4">
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


  </div>
</div>
@stop
