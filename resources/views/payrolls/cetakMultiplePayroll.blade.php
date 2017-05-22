<link rel="stylesheet" type="text/css" href="{{url('/css/app.css')}}">
<style media="screen">
.newPage{
    page-break-after: always;
    page-break-inside: avoid;
}
</style>
@foreach ($payrolls as $payroll)
  <div class="row newPage">
        @include('payrolls.template.header')
      <div class="container">
        @include('payrolls.template.employeeProfile')
        @if ($payroll->payrolltype_id==1)
          @include('payrolls.template.payrollAkhirBulan')
        @elseif ($payroll->payrolltype_id==2)
          @include('payrolls.template.payrollTengahBulan')
        @endif
      </div>
  </div>
@endforeach
