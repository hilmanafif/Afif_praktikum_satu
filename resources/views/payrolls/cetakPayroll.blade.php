<link rel="stylesheet" type="text/css" href="/var/www/html/app/public/css/app.css">

<div class="row">
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
