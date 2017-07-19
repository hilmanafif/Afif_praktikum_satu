@extends('dashboard')

@section('content')

    @if ($user=Auth::user())
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['route' => 'topics.search','class' => 'pull-right raw-margin-top-24 raw-margin-left-24']) !!}
              {!! csrf_field() !!}
              <input class="form-control form-inline pull-right" name="search" placeholder="Search">
            {!! Form::close() !!}
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('topics.create') !!}">Add New</a>
            <h1 class="pull-left">Topik</h1>
        </div>
    </div>
    <div class="row raw-margin-top-24">
        <div class="col-md-12">
            @if($topics->isEmpty())
                <div class="well text-center">No topics found.</div>
            @else
                <style>
                  td a.btn { font-size:10px; }
                  td a.disabled { pointer-events: none; }
                </style>
                <table class="table table-striped">
                    <thead>
                        <th>Judul Topik</th>
                        <th width="40%" class="text-right">Action</th>
                    </thead>
                    <tbody>
                    @foreach($topics as $topic)
                        <tr>
                            <td>
                                {{ $topic->name }}
                                @if($topics->first() == $topic)
                                <span class="label label-danger">Fokus</span>
                                @endif
                            </td>
                            <td>
                                <form method="post" action="{!! route('topics.destroy', [$topic->id]) !!}">
                                    {!! csrf_field() !!}
                                    {!! method_field('DELETE') !!}
                                    <button class="btn btn-danger btn-xs pull-right" type="submit" onclick="return confirm('Are you sure you want to delete this topic?')"><i class="fa fa-trash"></i> Delete</button>
                                </form>
                                <a class="btn btn-warning btn-xs" href="{!! url('/'.'topik'.'/'.$topic->slug) !!}"><i class="fa fa-search"></i> Lihat</a>
                                <a class="btn btn-warning btn-xs" href="{!! route('topics.edit', [$topic->id]) !!}"><i class="fa fa-pencil"></i> Edit</a>
                                <a class="btn btn-default btn-xs" href="{!! url('/'.'contents'.'/?topic='.$topic->id) !!}">Opini Pakar</a>
                                <span class="label label-default disabled">Opini Publik</span>
                                @if($topic->status == 'PUBLISHED')
                                  @if (in_array($user->roles->first()->name, ['redaktur','wakilpemimpinredaksi','pemimpinredaksi']))
                                  <span class="label label-info">Published</span>
                                  @else
                                  <span class="label label-info disabled">Published</span>
                                  @endif
                                @endif
                                @if($topic->status == 'DRAFT')
                                  @if (in_array($user->roles->first()->name, ['redaktur','wakilpemimpinredaksi','pemimpinredaksi']))
                                  <span class="label label-success">Draft</span>
                                  @else
                                  <span class="label label-success disabled">Draft</span>
                                  @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="row text-center">
                    {!! $topics; !!}
                </div>
            @endif
        </div>
    </div>
    @endif

@stop
