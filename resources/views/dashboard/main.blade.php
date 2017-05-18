@extends('dashboard')

@section('pre-javascript')
<script src="{{ url('js/Chart.bundle.min.js') }}"></script>
@stop

@section('javascript')
<script>
    var year = ['April#1','April #2','Mei #1'];
    var data_click = [477, 477, 478];
    var data_viewer = [475, 476, 478];

    var barChartData = {
        labels: year,
        datasets: [{
            label: 'Total Karyawan',
            backgroundColor: "rgba(220,220,220,0.5)",
            data: data_click
        }, {
            label: 'Generated Slip',
            backgroundColor: "rgba(151,187,205,0.5)",
            data: data_viewer
        }]
    };

    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: 'rgb(0, 255, 0)',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Slip Gaji'
                }
            }
        });

    };
</script>
@stop

@section('content')

@if (Auth::user())

<br />

<div class="row">
<div class="col-md-5">
  <div class="jumbotron" style="background:#0f69d7; color:#ffffff; height:290px; padding:20px;">
      <h2>Selamat Datang</h2>
      <p>Anda login sebagai <b>{{ Auth::user()->name }}</b>. Fitur yang bisa diakses sementara adalah fitur implementasi Aplikasi Payroll Fase 1.</p>
  </div>
</div>
<div class="col-md-6">
  <div class="jumbotron" style="height:290px; padding:20px;">
      <canvas id="canvas" height="280" width="600"></canvas>
  </div>
</div>
</div>



<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#menu1"><span class="fa fa-group"></span> Penggajian</a></li>
  <li><a data-toggle="tab" href="#menu2"><span class="fa fa-sitemap"></span> Kepegawaian</a></li>
  <li><a data-toggle="tab" href="#menu3"><span class="fa fa-calendar"></span> Absensi</a></li>
  <li><a data-toggle="tab" href="#menu4"><span class="fa fa-envelope"></span> Tunjangan</a></li>
</ul>

<div class="tab-content">
  <div id="menu1" class="tab-pane fade in active">
    <div class="row panel-body megamenu">
        <div class="col-xs-6 col-md-4">
          <h4>Daftar Penghasilan</h4>
          <a href="{!! url('/payrolls') !!}"><span class="fa fa-money"></span> Struk Gaji Awal Bulan</a>
          <a href="{!! url('/payrolls') !!}"><span class="fa fa-print"></span> Penghasilan Perbulan</a>
          <a class="disable" href="{!! url('') !!}"><span class="fa fa-bank"></span> Penghasilan Tanpa Potongan Bank</a>
          <a class="disable" href="{!! url('') !!}"><span class="fa fa-hourglass-half "></span> Dapenma dan Pesangon</a>
        </div>
        <div class="col-xs-6 col-md-4">
          <h4>Input Data</h4>
          <a href="{!! url('/admin/users') !!}"><span class="fa fa-credit-card"></span> Data Pegawai</a>
          <a class="disable" href="{!! url('') !!}"><span class="fa fa-calendar-o"></span> Absensi</a>
          <a class="disable" href="{!! url('') !!}"><span class="fa fa-calculator"></span> Potongan</a>
          <a class="disable" href="{!! url('') !!}"><span class="fa fa-hourglass-1"></span> Jamsostek dan Dapenma</a>
          <a class="disable" href="{!! url('') !!}"><span class="fa fa-leanpub"></span> Koperasi</a>
          <a class="disable" href="{!! url('') !!}"><span class="fa fa-hand-lizard-o"></span> Iuran YKKP-Pamsi</a>
        </div>
        <div class="col-xs-6 col-md-4">
          <h4>Report</h4>
          <a class="disable" href="{!! url('') !!}"><span class="fa fa-list-alt"></span> Daftar Gaji Pegawai</a>
          <a class="disable" href="{!! url('') !!}"><span class="fa fa-list-alt"></span> Daftar Gaji Direksi</a>
          <a class="disable" href="{!! url('') !!}"><span class="fa fa-list-alt"></span> Daftar Gaji Bersih</a>
          <a class="disable" href="{!! url('') !!}"><span class="fa fa-list-alt"></span> Ubah Tanggal Gaji Bersih</a>
          <a class="disable" href="{!! url('') !!}"><span class="fa fa-list-alt"></span> Daftar Potongan</a>
        </div>
    </div>
  </div>
  <div id="menu2" class="tab-pane fade">
    <div class="row panel-body megamenu">
        <div class="col-xs-6 col-md-4">
          <h4>Kepegawaian</h4>
          <a class="disable" href="{!! url('') !!}"><span class="fa fa-user"></span> Detail Data</a>
          <a class="disable" href="{!! url('') !!}"><span class="fa fa-file-text"></span> Curriculum Vitae</a>
          <a class="disable" href="{!! url('') !!}"><span class="fa fa-glass"></span> Ulang Tahun</a>
          <a class="disable" href="{!! url('') !!}"><span class="fa fa-eye"></span> Penilaian Kinerja</a>
        </div>
        <div class="col-xs-6 col-md-4">
          <h4>Referensi</h4>
          <a href="{!! url('/pangkats') !!}"><span class="fa fa-star"></span> Pangkat/Golongan</a>
          <a href="{!! url('/jabatans') !!}"><span class="fa fa-star"></span> Jabatan</a>
          <a href="{!! url('/bagians') !!}"><span class="fa fa-building"></span> Bagian/Unit</a>
          <a href="{!! url('/wilayahs') !!}"><span class="fa fa-map-marker"></span> Wilayahs</a>
          <a href="{!! url('/statuspegawais') !!}"><span class="fa fa-legal"></span> Status Pegawai</a>
          <a href="{!! url('/statuskerjas') !!}"><span class="fa fa-flag"></span> Status Kerja</a>
          <a href="{!! url('/gajipokoks') !!}"><span class="fa fa-money"></span> Gaji Pokok</a>
        </div>
        <div class="col-xs-6 col-md-4">
          <h4>Report</h4>
          <a class="disable" href="{!! url('') !!}"><span class="fa fa-list-alt"></span> Laporan Kinerja</a>
          <a class="disable" href="{!! url('') !!}"><span class="fa fa-list-alt"></span> Laporan Kepangkatan</a>
          <a class="disable" href="{!! url('') !!}"><span class="fa fa-list-alt"></span> Daftar Urut Kepangkatan</a>
          <a class="disable" href="{!! url('') !!}"><span class="fa fa-list-alt"></span> Daftar Urut Senioritas</a>
          <a class="disable" href="{!! url('') !!}"><span class="fa fa-list-alt"></span> Daftar Urut Jabatan</a>
        </div>
    </div>
  </div>
  <div id="menu3" class="tab-pane fade">
    <div class="row panel-body megamenu">
      <div class="col-xs-6 col-md-4">
        <h4>Input Absensi</h4>
        <a class="disable" href="{!! url('') !!}"><span class="fa fa-calendar-check-o"></span> Absensi Harian</a>
        <a class="disable" href="{!! url('') !!}"><span class="fa fa-calendar-o"></span> Rekap Bulanan</a>
        <a class="disable" href="{!! url('') !!}"><span class="fa fa-calendar"></span> Detail Bulanan</a>
      </div>
      <div class="col-xs-6 col-md-4">
        <h4>Report</h4>
        <a class="disable" href="{!! url('') !!}"><span class="fa fa-list-alt"></span> Absensi Per Pegawai</a>
        <a class="disable" href="{!! url('') !!}"><span class="fa fa-list-alt"></span> Absensi Bulanan</a>
        <a class="disable" href="{!! url('') !!}"><span class="fa fa-list-alt"></span> Keterlambatan Bulanan</a>
        <a class="disable" href="{!! url('') !!}"><span class="fa fa-list-alt"></span> Tingkat Kehadiran</a>
      </div>
    </div>
  </div>
  <div id="menu4" class="tab-pane fade">
    <div class="row panel-body megamenu">
      <div class="col-xs-6 col-md-4">
        <h4>Tunjangan Pegawai</h4>
        <a class="disable" href="{!! url('') !!}"><span class="fa fa-bar-chart"></span> Tunjangan Kinerja</a>
        <a class="disable" href="{!! url('') !!}"><span class="fa fa-home"></span> Tunjangan Perumahan</a>
        <a class="disable" href="{!! url('') !!}"><span class="fa fa-moon-o"></span> Tunjangan Hari Raya</a>
      </div>
      <div class="col-xs-6 col-md-4">
        <h4>Tunjangan Direksi</h4>
        <a class="disable" href="{!! url('') !!}"><span class="fa fa-hand-o-right "></span> Tunjangan Pelaksanaan</a>
        <a class="disable" href="{!! url('') !!}"><span class="fa fa-home"></span> Tunjangan Perumahan</a>
        <a class="disable" href="{!! url('') !!}"><span class="fa fa-moon-o"></span> Tunjangan Hari Raya</a>
      </div>
    </div>
  </div>
</div>

@endif

@stop
