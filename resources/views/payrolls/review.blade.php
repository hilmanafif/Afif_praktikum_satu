@extends('dashboard')

@section('content')

    <div class="row">
      <div class="col-md-12">
      <h1>Review Generated Payroll</h1>
      <h3>{{ $title }}</h3>
      </div>
    </div>

    <div class="row">
        <div class="col-md-4">
          <p>Tanggal awal kalkulasi: {{ date("d F Y", strtotime($payrolls[1]->start_date)) }}</p>
          <p>Tanggal akhir kalkulasi: {{ date("d F Y", strtotime($payrolls[1]->end_date)) }}</p>
        </div>
        <div class="col-md-4">
          <p>Total slip: {{ $total_slip }} slip</p>
          <p>Total gaji pokok: Rp. {{ number_format($total_gapok,0,'','.') }}</p>
        </div>
        <div class="col-md-4">
          <a class="btn btn-primary btn-xs" style="padding:12px;" href="{{url('payrollwizards?button=tostep3')}}">Kembali ke Wizard</a>
        </div>
    </div>

    <div class="row raw-margin-top-24">
        <div class="col-md-12">
            @if($payrolls->isEmpty())
                <div class="well text-center">No payrolls found.</div>
            @else
                <table class="table table-striped">
                    <thead>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Gaji Pokok</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach($payrolls as $payroll)
                        <tr>
                          <td>{{ $payroll->users->employee_number }}</td>
                          <td>{{ $payroll->name }}</td>
                          <td>Rp. {{ number_format($payroll->gapok,0,'','.') }}</td>
                          <td>
                              <a class="btn btn-primary btn-xs" href="{{url('payrolls/'.$payroll->id)}}"><i class="fa fa-search"></i> View</a>
                          </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row text-center">
                    {!! $payrolls->appends(request()->input())->links(); !!}
                </div>
            @endif
        </div>
    </div>
@stop

@section('javascript')
@endsection
