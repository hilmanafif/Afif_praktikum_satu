@extends('dashboard')

@section('content')

    <div class="row">
        <div class="col-md-12" style="padding:0px 20px;">
          <h2 class="pull-left">{{ $findtopik->name }}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" style="padding:0px 20px;">
            <p style="color:#999; text-transform:uppercase;">{{ $findtopik->created_at }} | {{ $findtopik->jendela }} | {{ $findtopik->jumlah_opini }} opini</p>
            <p style="color:#999; text-transform:uppercase;">Oleh: {{ $findtopik->writer }}</p>
            <p>
            {!! $findtopik->description !!}
            <a class="btn btn-warning btn-xs" href="{!! url('/'.'topik'.'/'.$findtopik->slug) !!}">Selengkapnya</a>
            </p>
        </div>
    </div>
    <div class="row raw-margin-top-24">
        <div class="col-md-12">
            @if($contents->isEmpty())
                <div class="well text-center">No contents found.</div>
            @else
                <table class="table table-striped">
                    <thead>
                        <th>Judul Opini</th>
                        <th>Pakar / Penulis</th>
                        <th width="200px" class="text-right">Action</th>
                    </thead>
                    <tbody>
                    @foreach($contents as $content)
                        <tr>
                            <td>{{ $content->name }}</td>
                            <td>
                            @if ($content->offlinewriter_id)
                              {{ $content->offlinewriter->name }}
                            @endif
                            </td>
                            <td>
                                <form method="post" action="{!! route('contents.destroy', [$content->id]).'?topic='.$findtopik->id !!}">
                                    {!! csrf_field() !!}
                                    {!! method_field('DELETE') !!}
                                    <button class="btn btn-danger btn-xs pull-right" type="submit" onclick="return confirm('Are you sure you want to delete this content?')"><i class="fa fa-trash"></i> Delete</button>
                                </form>
                                <a class="btn btn-warning btn-xs" href="{!! url('/'.'opini'.'/'.$content->slug) !!}"><i class="fa fa-search"></i> Lihat</a>
                                <a class="btn btn-warning btn-xs" href="{!! route('contents.edit', [$content->id]).'?topic='.$findtopik->id !!}"><i class="fa fa-pencil"></i> Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
          <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('contents.create').'?topic='.$findtopik->id !!}">Add New</a>
        </div>
    </div>
@stop
