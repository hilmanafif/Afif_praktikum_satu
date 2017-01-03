@extends('dashboard')

@section('content')

    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['route' => 'languages.search','class' => 'pull-right raw-margin-top-24 raw-margin-left-24']) !!}
              {!! csrf_field() !!}
              <input class="form-control form-inline pull-right" name="search" placeholder="Search">
            {!! Form::close() !!}
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('languages.create') !!}">Add New</a>
            <h1 class="pull-left">Languages</h1>
        </div>
    </div>
    <div class="row raw-margin-top-24">
        <div class="col-md-12">
            @if($languages->isEmpty())
                <div class="well text-center">No languages found.</div>
            @else
                <table class="table table-striped">
                    <thead>
                        <th>Name</th>
                        <th width="200px" class="text-right">Action</th>
                    </thead>
                    <tbody>
                    @foreach($languages as $language)
                        <tr>
                            <td>
                                {{ $language->name }}
                            </td>
                            <td>
                                <form method="post" action="{!! route('languages.destroy', [$language->id]) !!}">
                                    {!! csrf_field() !!}
                                    {!! method_field('DELETE') !!}
                                    <button class="btn btn-danger btn-xs pull-right" type="submit" onclick="return confirm('Are you sure you want to delete this language?')"><i class="fa fa-trash"></i> Delete</button>
                                </form>
                                <a class="btn btn-warning btn-xs" href="{!! route('languages.show', [$language->id]) !!}"><i class="fa fa-search"></i> Show</a>
                                <a class="btn btn-warning btn-xs" href="{!! route('languages.edit', [$language->id]) !!}"><i class="fa fa-pencil"></i> Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="row text-center">
                    {!! $languages; !!}
                </div>
            @endif
        </div>
    </div>

@stop
