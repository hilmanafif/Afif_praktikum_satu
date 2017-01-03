@extends('dashboard')

@section('content')

    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['route' => 'logsystems.search','class' => 'pull-right raw-margin-top-24 raw-margin-left-24']) !!}
              {!! csrf_field() !!}
              <input class="form-control form-inline pull-right" name="search" placeholder="Search">
            {!! Form::close() !!}
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('logsystems.create') !!}">Add New</a>
            <h1 class="pull-left">Logsystems</h1>
        </div>
    </div>
    <div class="row raw-margin-top-24">
        <div class="col-md-12">
            @if($logsystems->isEmpty())
                <div class="well text-center">No logsystems found.</div>
            @else
                <table class="table table-striped">
                    <thead>
                        <th>Name</th>
                        <th width="200px" class="text-right">Action</th>
                    </thead>
                    <tbody>
                    @foreach($logsystems as $logsystem)
                        <tr>
                            <td>
                                {{ $logsystem->user_id }} {{ $logsystem->name }} at {{ $logsystem->created_at }} from {{ $logsystem->ipaddress }}
                            </td>
                            <td>
                                <form method="post" action="{!! route('logsystems.destroy', [$logsystem->id]) !!}">
                                    {!! csrf_field() !!}
                                    {!! method_field('DELETE') !!}
                                    <button class="btn btn-danger btn-xs pull-right" type="submit" onclick="return confirm('Are you sure you want to delete this logsystem?')"><i class="fa fa-trash"></i> Delete</button>
                                </form>
                                <a class="btn btn-warning btn-xs" href="{!! route('logsystems.show', [$logsystem->id]) !!}"><i class="fa fa-search"></i> Show</a>
                                <a class="btn btn-warning btn-xs" href="{!! route('logsystems.edit', [$logsystem->id]) !!}"><i class="fa fa-pencil"></i> Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="row text-center">
                    {!! $logsystems; !!}
                </div>
            @endif
        </div>
    </div>

@stop
