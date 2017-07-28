<div class="col-md-3">
  <img src="{{ url(App\Models\Company::find(1)->logo->url('original')) }}" class="img-responsive center-block" style="padding:10px; max-height:150px;">
</div>
<div class="col-md-9">
  <center>
    <h2>PERINCIAN PENGHASILAN PEGAWAI</h2>
    <h3>PDAM TIRTA RAHARJA KABUPATEN BANDUNG</h3>
    <b>{{ $payroll['title'] }}</b>
  </center>
</div>
