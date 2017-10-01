<!-- <link rel="stylesheet" type="text/css" href="{{url('/css/app.css')}}"> -->
<link rel="stylesheet" type="text/css" href="/var/app/public/css/app.css">

<div class="row col-md-12">
  @include('payrolls.template.header')
</div>
<div class="row container">
  @include('payrolls.template.employeeProfile')
  @if ($payroll->payrolltype_id==1)
    @include('payrolls.template.payrollAkhirBulan')
  @elseif ($payroll->payrolltype_id==2)
    @include('payrolls.template.payrollTengahBulan')
  @endif
</div>
