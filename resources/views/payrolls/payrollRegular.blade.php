@extends('dashboard')

@section('content')
<style>
.yellowpaper {
  background:#FEFFE8;
  margin:20px 20px 20px 0px;
  border-right:2px solid #999;
  border-bottom:2px solid #999;
  border-top:1px solid #ccc;
  border-left:1px solid #ccc;
}
td {
  border:1px solid #888 !important;
}
</style>

<div class="row col-md-12 yellowpaper">
    <div class="container col-md-12">
      @include('payrolls.template.header')
    </div>
    <div class="container col-md-12">
      @include('payrolls.template.employeeProfile')
      @if ($payroll->payrolltype_id==1)
        @include('payrolls.template.payrollAkhirBulan')
      @elseif ($payroll->payrolltype_id==2)
        @include('payrolls.template.payrollTengahBulan')
      @endif
    </div>
</div>
@stop
