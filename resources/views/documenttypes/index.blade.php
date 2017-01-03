@extends('dashboard')

@section('content')

    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['route' => 'documenttypes.search','class' => 'pull-right raw-margin-top-24 raw-margin-left-24']) !!}
              {!! csrf_field() !!}
              <input class="form-control form-inline pull-right" name="search" placeholder="Search">
            {!! Form::close() !!}
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('documenttypes.create') !!}">Add New</a>
            <h1 class="pull-left">Documenttypes</h1>
        </div>
    </div>
    <div class="row raw-margin-top-24">
        <div class="col-md-12">
            @if($documenttypes->isEmpty())
                <div class="well text-center">No documenttypes found.</div>
            @else
                <table class="table table-striped">
                    <thead>
                        <th>Name</th>
                        <th width="200px" class="text-right">Action</th>
                    </thead>
                    <tbody>
                    @foreach($documenttypes as $documenttype)
                        <tr>
                            <td>
                                {{ $documenttype->name }}
                            </td>
                            <td>
                                <form method="post" action="{!! route('documenttypes.destroy', [$documenttype->id]) !!}">
                                    {!! csrf_field() !!}
                                    {!! method_field('DELETE') !!}
                                    <button class="btn btn-danger btn-xs pull-right" type="submit" onclick="return confirm('Are you sure you want to delete this documenttype?')"><i class="fa fa-trash"></i> Delete</button>
                                </form>
                                <a class="btn btn-warning btn-xs" href="{!! route('documenttypes.show', [$documenttype->id]) !!}"><i class="fa fa-search"></i> Show</a>
                                <a class="btn btn-warning btn-xs" href="{!! route('documenttypes.edit', [$documenttype->id]) !!}"><i class="fa fa-pencil"></i> Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="row text-center">
                    {!! $documenttypes; !!}
                </div>
            @endif
        </div>
    </div>

@stop
