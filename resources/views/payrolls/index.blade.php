@extends('dashboard')

@section('content')

    <div class="row">
        <div class="col-md-12">
            {{-- {!! Form::open(['route' => 'payrolls.search','class' => 'pull-right raw-margin-top-24 raw-margin-left-24']) !!}
              {!! csrf_field() !!}
              <input class="form-control form-inline pull-right" name="search" placeholder="Search">
            {!! Form::close() !!} --}}
            {!! Form::open(['url' => 'generatePayroll']) !!}
            <div class="row">
            <div class="pull-right">
              <div class="form-group" style="float:left;margin-top: 25px;">
                  <div class="col-md-6" style="padding:0 0 0 0">
                    <label for="fromDate">From</label>
                      <input type="date" name="fromDate" class="form-control" required>
                  </div>
                  <div class="col-md-6" style="padding:0 0 0 10">
                    <label for="fromDate">To</label>
                      <input type="date" name="toDate" class="form-control" required>
                </div>
              </div>
            </div>
          </div>
            <div class="pull-right">
              <button class="btn btn-primary" style="margin-top: 25px;margin-right: 10px" name="phase" value="1" onclick='return confirm("Generate payroll?")'>Generate Payroll 1</button>
              <button class="btn btn-primary" style="margin-top: 25px" value="2" name="phase" onclick'=return confirm("Generate payroll?")'>Generate Payroll 2</button>
              </div>
              {!! Form::close() !!}

                <form action="{{url('payrolls/cetakMultiple')}}" method="post">
                  {!! csrf_field() !!}
                  <div class="clearfix">
                    <button class="btn btn-primary" style="margin-top: 25px;" name="submit" value="all" onclick='return confirm("Print payroll?")'>Print All</button>
                    <button class="btn btn-primary" style="margin-top: 25px;" name="submit" value="selected" onclick='return confirm("Print payroll?")'>Print Selected</button>
                    <button class="btn btn-primary" style="margin-top: 25px;" name="submit" id="perwil" value="perwil">Print Per Wilayah</button>
                  </div>
            <h1 class="pull-left">Payrolls</h1>
        </div>
    </div>

    <div class="row raw-margin-top-24">
        <div class="col-md-12">
            @if($payrolls->isEmpty())
                <div class="well text-center">No payrolls found.</div>
            @else
                <table class="table table-striped">
                    <thead>
                        <th><input type="checkbox"></th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Periode</th>
                        {{-- <th>Gapok</th> --}}
                        <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach($payrolls as $payroll)
                        <tr>
                          <td><input type="checkbox" name="cetakList[]" value="{{$payroll->id}}"></td>
                          <td>{{ $payroll->name }}</td>
                          <td>{{ $payroll->users->employee_number }}</td>
                          <td>{{ date("d F Y", strtotime($payroll->start_date)) }} - {{ date("d F Y", strtotime($payroll->end_date)) }}</td>
                          {{-- <td>Rp. {{ number_format($payroll->gapok,0,'','.') }}</td> --}}
                            <td>
                                <a class="btn btn-primary btn-xs" href="{{url('payrolls/'.$payroll->id)}}"><i class="fa fa-search"></i> View</a>
                                <a class="btn btn-success btn-xs" href="{{url('payrolls/cetak/'.$payroll->id)}}"><i class="fa fa-print"></i> Print</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
              </form>
                <div class="row text-center">
                    {!! $payrolls; !!}
                </div>
            @endif
        </div>
    </div>

@stop
