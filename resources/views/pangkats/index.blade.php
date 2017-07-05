@extends('dashboard')

@section('content')

    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['route' => 'pangkats.search','class' => 'pull-right raw-margin-top-24 raw-margin-left-24']) !!}
              {!! csrf_field() !!}
              <input class="form-control form-inline pull-right" name="search" placeholder="Search">
            {!! Form::close() !!}
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('pangkats.create') !!}">Add New</a>
            <h1 class="pull-left">List Pangkat</h1>
        </div>
    </div>
    <div class="row raw-margin-top-24">
        <div class="col-md-12">
            @if($pangkats->isEmpty())
                <div class="well text-center">No pangkats found.</div>
            @else
                <table class="table table-striped">
                    <thead>
                        <th>Kode</th>
                        <th>Kode Sistem Lama</th>
                        <th>Nama</th>
                        <th width="200px" class="text-right">Action</th>
                    </thead>
                    <tbody>
                    @foreach($pangkats as $pangkat)
                        <tr>
                            <td>
                                {{ $pangkat->kode }}
                            </td>
                            <td>
                                {{ $pangkat->kodepangkat_lama }}
                            </td>
                            <td>
                                {{ $pangkat->name }}
                            </td>
                            <td>
                                <form method="post" action="{!! route('pangkats.destroy', [$pangkat->id]) !!}">
                                    {!! csrf_field() !!}
                                    {!! method_field('DELETE') !!}
                                    <button class="btn btn-danger btn-xs pull-right" type="submit" onclick="return confirm('Are you sure you want to delete this pangkat?')"><i class="fa fa-trash"></i> Delete</button>
                                </form>
                                <a style="margin-right:4px;" class="btn btn-warning btn-xs pull-right" href="{!! route('pangkats.edit', [$pangkat->id]) !!}"><i class="fa fa-pencil"></i> Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="row text-center">
                    {!! $pangkats; !!}
                </div>
            @endif
        </div>
    </div>

@stop
