@extends('dashboard')

@section('content')

    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['route' => 'employmentstatuses.search','class' => 'pull-right raw-margin-top-24 raw-margin-left-24']) !!}
              {!! csrf_field() !!}
              <input class="form-control form-inline pull-right" name="search" placeholder="Search">
            {!! Form::close() !!}
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('employmentstatuses.create') !!}">Add New</a>
            <h1 class="pull-left">Employmentstatuses</h1>
        </div>
    </div>
    <div class="row raw-margin-top-24">
        <div class="col-md-12">
            @if($employmentstatuses->isEmpty())
                <div class="well text-center">No employmentstatuses found.</div>
            @else
                <table class="table table-striped">
                    <thead>
                        <th>Name</th>
                        <th width="200px" class="text-right">Action</th>
                    </thead>
                    <tbody>
                    @foreach($employmentstatuses as $employmentstatus)
                        <tr>
                            <td>
                                {{ $employmentstatus->name }}
                            </td>
                            <td>
                                <form method="post" action="{!! route('employmentstatuses.destroy', [$employmentstatus->id]) !!}">
                                    {!! csrf_field() !!}
                                    {!! method_field('DELETE') !!}
                                    <button class="btn btn-danger btn-xs pull-right" type="submit" onclick="return confirm('Are you sure you want to delete this employmentstatus?')"><i class="fa fa-trash"></i> Delete</button>
                                </form>
                                <a class="btn btn-warning btn-xs" href="{!! route('employmentstatuses.show', [$employmentstatus->id]) !!}"><i class="fa fa-search"></i> Show</a>
                                <a class="btn btn-warning btn-xs" href="{!! route('employmentstatuses.edit', [$employmentstatus->id]) !!}"><i class="fa fa-pencil"></i> Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="row text-center">
                    {!! $employmentstatuses; !!}
                </div>
            @endif
        </div>
    </div>

@stop
