@extends('dashboard')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1 class="pull-left">Payrolls</h1>
            {{-- {!! Form::open(['route' => 'payrolls.search','class' => 'pull-right raw-margin-top-24 raw-margin-left-24']) !!}
              {!! csrf_field() !!}
              <input class="form-control form-inline pull-right" name="search" placeholder="Search">
            {!! Form::close() !!} --}}
            <div class="row">

            <form action="{{url('payrolls/cetakMultiple')}}" method="post">
            <div class="col-md-12">
                {!! csrf_field() !!}
                <div class="clearfix">
                  <div class="form-group col-md-12" style="float:left;margin-top: 25px;padding:0">
                      <div class="col-md-4" style="padding:0 0 0 0">
                        <label for="printType">Print</label>
                        <select class="form-control" name="printType" id="printType" required>
                          <option value="all">Print All</option>
                          <option value="selected">Print Selected</option>
                        </select>
                      </div>
                      <div class="col-md-4" style="padding:0 0 0 10">
                        <label for="periode">Periode</label>
                        <select class="form-control" name="periode" id="periode" required>
                          @foreach ($payrollPeriod as $periode)
                            <option value="{{$periode->start_date.",".$periode->end_date}}">{{date("d F Y",strtotime($periode->start_date))}} - {{date("d F Y",strtotime($periode->end_date))}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-md-4" style="padding:0 0 0 0">
                        <button class="btn btn-primary" style="margin-top: 25px;" onclick='return confirm("Print payroll?")'>Print All</button>
                      </div>
                  </div>
                </div>
      </div>


      </div>
    </div>
    </div>

    <div class="row raw-margin-top-24">
        <div class="col-md-12">
            @if($payrolls->isEmpty())
                <div class="well text-center">No payrolls found.</div>
            @else
                <table class="table table-striped">
                    <thead>
                        <th><input type="checkbox" id="checkAll"></th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Periode</th>
                        {{-- <th>Gapok</th> --}}
                        <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach($payrolls as $payroll)
                        <tr>
                          <td><input type="checkbox" name="cetakList[]" value="{{$payroll->id}}"></td>
                          <td>{{ $payroll->users->employee_number }}</td>
                          <td>{{ $payroll->name }}</td>
                          <td>{{ date("d F Y", strtotime($payroll->start_date)) }} - {{ date("d F Y", strtotime($payroll->end_date)) }}</td>
                          {{-- <td>Rp. {{ number_format($payroll->gapok,0,'','.') }}</td> --}}
                            <td>
                                <a class="btn btn-primary btn-xs" href="{{url('payrolls/'.$payroll->id)}}"><i class="fa fa-search"></i> View</a>
                                <a class="btn btn-success btn-xs" target="_blank" href="{{url('payrolls/cetak/'.$payroll->id)}}"><i class="fa fa-print"></i> Print</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row text-center">
                    {!! $payrolls; !!}
                </div>
            @endif
        </div>
    </div>
  </form>
@stop
@section('javascript')
  <script type="text/javascript">
  $("#checkAll").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});
$('#printType').on('change', function() {
  if (this.value == "selected") {
    $('#periode').prop('disabled', true);
  }
  else {
    $('#periode').prop('disabled', false);
  }
})
  </script>
@endsection
