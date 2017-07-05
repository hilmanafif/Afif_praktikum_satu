@extends('dashboard')

@section('content')

    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['route' => 'bagians.search','class' => 'pull-right raw-margin-top-24 raw-margin-left-24']) !!}
              {!! csrf_field() !!}
              <input class="form-control form-inline pull-right" name="search" placeholder="Search">
            {!! Form::close() !!}
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('bagians.create') !!}">Add New</a>
            <h1 class="pull-left">List Bagian</h1>
        </div>
    </div>
    <div class="row raw-margin-top-24">
        <div class="col-md-12">
            @if($bagians->isEmpty())
                <div class="well text-center">No bagians found.</div>
            @else
                <table class="table table-striped">
                    <thead>
                        <th>Nama</th>
                        <th width="200px" class="text-right">Action</th>
                    </thead>
                    <tbody>
                    @foreach($bagians as $bagian)
                        <tr>
                            <td>
                                {{ $bagian->name }}
                            </td>
                            <td>
                                <form method="post" action="{!! route('bagians.destroy', [$bagian->id]) !!}">
                                    {!! csrf_field() !!}
                                    {!! method_field('DELETE') !!}
                                    <button class="btn btn-danger btn-xs pull-right" type="submit" onclick="return confirm('Are you sure you want to delete this bagian?')"><i class="fa fa-trash"></i> Delete</button>
                                </form>
                                <a style="margin-right:4px;" class="btn btn-warning btn-xs pull-right" href="{!! route('bagians.edit', [$bagian->id]) !!}"><i class="fa fa-pencil"></i> Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="row text-center">
                    {!! $bagians; !!}
                </div>
            @endif
        </div>
    </div>

@stop
