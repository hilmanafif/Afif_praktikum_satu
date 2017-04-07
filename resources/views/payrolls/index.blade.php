@extends('dashboard')

@section('content')

    <div class="row">
        <div class="col-md-12">
            {{-- {!! Form::open(['route' => 'payrolls.search','class' => 'pull-right raw-margin-top-24 raw-margin-left-24']) !!}
              {!! csrf_field() !!}
              <input class="form-control form-inline pull-right" name="search" placeholder="Search">
            {!! Form::close() !!} --}}
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('payrolls.create') !!}">Generate Payroll 2</a>
            <a class="btn btn-primary pull-right" style="margin-top: 25px;margin-right: 10px" href="{!! route('payrolls.create') !!}">Generate Payroll 1</a>
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
                        <th>ID</th>
                        <th>User_ID</th>
                        <th>Periode</th>
                        <th>Gapok</th>
                        {{-- <th width="200px" class="text-right">Action</th> --}}
                    </thead>
                    <tbody>
                    @foreach($payrolls as $payroll)
                        <tr>
                          <td>{{ $payroll->id }}</td>
                          <td>{{ $payroll->user_id }}</td>
                          <td>{{ date("F Y", strtotime($payroll->periode)) }}</td>
                          <td>Rp. {{ number_format($payroll->gapok,0,'','.') }}</td>
                            {{-- <td>
                                <form method="post" action="{!! route('payrolls.destroy', [$payroll->id]) !!}">
                                    {!! csrf_field() !!}
                                    {!! method_field('DELETE') !!}
                                    <button class="btn btn-danger btn-xs pull-right" type="submit" onclick="return confirm('Are you sure you want to delete this payroll?')"><i class="fa fa-trash"></i> Delete</button>
                                </form>
                                <a class="btn btn-warning btn-xs" href="{!! route('payrolls.show', [$payroll->id]) !!}"><i class="fa fa-search"></i> Show</a>
                                <a class="btn btn-warning btn-xs" href="{!! route('payrolls.edit', [$payroll->id]) !!}"><i class="fa fa-pencil"></i> Edit</a>
                            </td> --}}
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

@stop
