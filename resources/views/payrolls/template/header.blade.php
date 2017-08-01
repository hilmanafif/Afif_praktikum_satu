<div class="col-md-2" style="float:left;">
  @if (app('request')->input('payrolltype')=='1')
  <img src="{{ url(App\Models\Company::find(1)->logo->url('original')) }}" class="img-responsive center-block" style="padding:10px; max-height:150px;">
  @else
  <img src="/var/www/html/app/public/upload/company/logos/1/original/logo-pdam.png" style="padding:10px;">
  @endif
</div>
<div class="col-md-10">
  <center>
    <h2>PERINCIAN PENGHASILAN PEGAWAI</h2>
    <h3>PDAM TIRTA RAHARJA KABUPATEN BANDUNG</h3>
    <b>{{ $payroll['title'] }}</b>
  </center>
</div>
