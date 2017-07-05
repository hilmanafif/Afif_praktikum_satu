@extends('dashboard')

@section('content')

    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['route' => 'jabatans.search','class' => 'pull-right raw-margin-top-24 raw-margin-left-24']) !!}
              {!! csrf_field() !!}
              <input class="form-control form-inline pull-right" name="search" placeholder="Search">
            {!! Form::close() !!}
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('jabatans.create') !!}">Add New</a>
            <h1 class="pull-left">List Jabatan</h1>
        </div>
    </div>
    <div class="row raw-margin-top-24">
        <div class="col-md-12">
            @if($jabatans->isEmpty())
                <div class="well text-center">No jabatans found.</div>
            @else
                <table class="table table-striped">
                    <thead>
                        <th>Kode Umum</th>
                        <th>Kode</th>
                        <th>Nama Umum</th>
                        <th>Nama</th>
                        <th width="200px" class="text-right">Action</th>
                    </thead>
                    <tbody>
                    @foreach($jabatans as $jabatan)
                        <tr>
                            <td>
                                {{ $jabatan->kode_umum }}
                            </td>
                            <td>
                                {{ $jabatan->kode }}
                            </td>
                            <td>
                                {{ $jabatan->name_umum }}
                            </td>
                            <td>
                                {{ $jabatan->name }}
                            </td>
                            <td>
                                <form method="post" action="{!! route('jabatans.destroy', [$jabatan->id]) !!}">
                                    {!! csrf_field() !!}
                                    {!! method_field('DELETE') !!}
                                    <button class="btn btn-danger btn-xs pull-right" type="submit" onclick="return confirm('Are you sure you want to delete this jabatan?')"><i class="fa fa-trash"></i> Delete</button>
                                </form>
                                <a style="margin-right:4px;" class="btn btn-warning btn-xs pull-right" href="{!! route('jabatans.edit', [$jabatan->id]) !!}"><i class="fa fa-pencil"></i> Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="row text-center">
                    {!! $jabatans; !!}
                </div>
            @endif
        </div>
    </div>

@stop
