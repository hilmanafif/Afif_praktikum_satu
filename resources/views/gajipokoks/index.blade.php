@extends('dashboard')

@section('content')

    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['route' => 'gajipokoks.search','class' => 'pull-right raw-margin-top-24 raw-margin-left-24']) !!}
              {!! csrf_field() !!}
              <input class="form-control form-inline pull-right" name="search" placeholder="Search">
            {!! Form::close() !!}
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('gajipokoks.create') !!}">Add New</a>
            <h1 class="pull-left">List Gaji Pokok</h1>
        </div>
    </div>
    <div class="row raw-margin-top-24">
        <div class="col-md-12">
            @if($gajipokoks->isEmpty())
                <div class="well text-center">No gajiPokoks found.</div>
            @else
                <table class="table table-striped">
                    <thead>
                        <th>Kode Sistem Lama</th>
                        <th>Pangkat</th>
                        <th>Ruang</th>
                        <th>Gaji Pokok</th>
                        <th width="200px" class="text-right">Action</th>
                    </thead>
                    <tbody>
                    @foreach($gajipokoks as $gajipokok)
                        <tr>
                            <td>
                                {{ $gajipokok->kodgol_lama }}
                            </td>
                            <td>
                                {{ $gajipokok->pangkats->name }}
                            </td>
                            <td>
                                {{ $gajipokok->ruang }}
                            </td>
                            <td>
                              {{"Rp. " . number_format($gajipokok->gaji_pokok,0,',','.')}}
                            </td>
                            <td>
                                <form method="post" action="{!! route('gajipokoks.destroy', [$gajipokok->id]) !!}">
                                    {!! csrf_field() !!}
                                    {!! method_field('DELETE') !!}
                                    <button class="btn btn-danger btn-xs pull-right" type="submit" onclick="return confirm('Are you sure you want to delete this gajipokok?')"><i class="fa fa-trash"></i> Delete</button>
                                </form>
                                <a style="margin-right:4px;" class="btn btn-warning btn-xs pull-right" href="{!! route('gajipokoks.edit', [$gajipokok->id]) !!}"><i class="fa fa-pencil"></i> Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="row text-center">
                    {!! $gajipokoks; !!}
                </div>
            @endif
        </div>
    </div>

@stop
