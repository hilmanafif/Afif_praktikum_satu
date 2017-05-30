<div class="container">
<div class="col-xs-3">
  <img src="{{ url(App\Models\Company::find(1)->logo->url('original')) }}" class="img-responsive center-block" style="padding:10px; max-height:150px;">
</div>
<div class="col-xs-9">
  <center>
    <h1>PERINCIAN PENGHASILAN PEGAWAI</h1>
    <h3>PDAM TIRTA RAHARJA KABUPATEN BANDUNG</h3>
    GAJI <b>{{date("F Y", strtotime($payroll->start_date))}}</b>
  </center>
</div>
</div>
