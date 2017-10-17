<div class="col-md-2" style="float:left;">
  @if (app('request')->input('payrolltype')=='1')
  <img src="{{ url(App\Models\Company::find(1)->logo->url('original')) }}" class="img-responsive center-block" style="padding:10px; max-height:150px;">
  @else
  <!--<img src="file:///D:\laravel_jerbeehrm\public\upload\company\logos\1\original\logo-pdam.png" style="padding:10px;">-->
  <img src="/var/app/public/upload/company/logos/1/original/logo-pdam.png" style="padding:10px;" />
  @endif
</div>
<div class="col-md-10">
  <center>
    <h2 class="title">PERINCIAN PENGHASILAN PEGAWAI</h2>
    <h3 class="title">PDAM TIRTA RAHARJA KABUPATEN BANDUNG</h3>
    <span class="payroll_title">{{ $payroll['title'] }}</span><br /><br />
  </center>
</div>
