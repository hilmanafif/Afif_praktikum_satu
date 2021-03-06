@extends('dashboard')

@section('content')

    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['route' => 'statuspegawais.search','class' => 'pull-right raw-margin-top-24 raw-margin-left-24']) !!}
              {!! csrf_field() !!}
              <input class="form-control form-inline pull-right" name="search" placeholder="Search">
            {!! Form::close() !!}
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('statuspegawais.create') !!}">Add New</a>
            <h1 class="pull-left">List Status Pegawai</h1>
        </div>
    </div>
    <div class="row raw-margin-top-24">
        <div class="col-md-12">
            @if($statuspegawais->isEmpty())
                <div class="well text-center">No statusPegawais found.</div>
            @else
                <table class="table table-striped">
                    <thead>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th width="200px" class="text-right">Action</th>
                    </thead>
                    <tbody>
                    @foreach($statuspegawais as $statuspegawai)
                        <tr>
                          <td>
                              {{ $statuspegawai->kode }}
                          </td>
                            <td>
                                {{ $statuspegawai->name }}
                            </td>
                            <td>
                                <form method="post" action="{!! route('statuspegawais.destroy', [$statuspegawai->id]) !!}">
                                    {!! csrf_field() !!}
                                    {!! method_field('DELETE') !!}
                                    <button class="btn btn-danger btn-xs pull-right" type="submit" onclick="return confirm('Are you sure you want to delete this statuspegawai?')"><i class="fa fa-trash"></i> Delete</button>
                                </form>
                                <a style="margin-right:4px;" class="btn btn-warning btn-xs pull-right" href="{!! route('statuspegawais.edit', [$statuspegawai->id]) !!}"><i class="fa fa-pencil"></i> Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="row text-center">
                    {!! $statuspegawais; !!}
                </div>
            @endif
        </div>
    </div>

@stop
