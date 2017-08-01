<!-- <link rel="stylesheet" type="text/css" href="{{url('/css/app.css')}}"> -->
<link rel="stylesheet" type="text/css" href="/var/www/html/app/public/css/app.css">

<style media="screen">
.newPage{
    page-break-after: always;
    page-break-inside: avoid;
}
</style>
@foreach ($payrolls as $payroll)
  <div class="row col-md-12" style="padding:30px 0;">
    @include('payrolls.template.header')
  </div>
  <div class="row container" style="padding-bottom:50px;">
    @include('payrolls.template.employeeProfile')
    @if ($payroll->payrolltype_id==1)
      @include('payrolls.template.payrollAkhirBulan')
    @elseif ($payroll->payrolltype_id==2)
      @include('payrolls.template.payrollTengahBulan')
    @endif
  </div>
@endforeach
