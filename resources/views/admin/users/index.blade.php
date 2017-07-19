@extends('dashboard')

@section('content')

    <div class="row">
        <div class="col-md-10">
            <form id="" class="pull-right raw-margin-top-24 raw-margin-left-24" method="post" action="/admin/users/search">
                {!! csrf_field() !!}
                <input class="form-control" name="search" placeholder="Search">
            </form>
            <a class="btn btn-default pull-right raw-margin-top-24" href="{{ url('admin/users/invite') }}">Invite New User</a>
            <h1>List User</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10">
            <table class="table table-striped raw-margin-top-24">

                <thead>
                    <th>NIPP</th>
                    <th>Nama</th>
                    <th>Status</th>
                    <th class="text-right">Actions</th>
                </thead>
                <tbody>
                    @foreach($users as $user)

                        @if ($user->id !== Auth::id())
                            <tr>
                                <td>{{ $user->employee_number }}</td>
                                <td>{{ $user->name }}</td>
                                <td>
                                  @if ($user->statuskerja_id == 1)
                                    <span class="label label-success">Aktif</span>
                                  @endif
                                  @if ($user->statuskerja_id == 2)
                                    <span class="label label-info">Mengundurkan Diri</span>
                                  @endif
                                  @if ($user->statuskerja_id == 3)
                                    <span class="label label-info">Diberhentikan</span>
                                  @endif
                                  @if ($user->statuskerja_id == 6)
                                    <span class="label label-info">Meninggal</span>
                                  @endif
                                  @if ($user->statuskerja_id == 7)
                                    <span class="label label-info">Pensiun Dini</span>
                                  @endif
                                  @if ($user->statuskerja_id == 8)
                                    <span class="label label-info">Pensiun</span>
                                  @endif
                                  @if ($user->statuskerja_id == 10)
                                    <span class="label label-info">Tidak Diperpanjang Kontrak</span>
                                  @endif
                                </td>
                                <td>
                                    <!--
                                    <form method="post" action="{!! url('admin/users/'.$user->id) !!}">
                                        {!! csrf_field() !!}
                                        {!! method_field('DELETE') !!}
                                        <button class="btn btn-danger btn-xs pull-right" type="submit" onclick="return confirm('Are you sure you want to delete this user?')"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                    -->
                                    <a class="btn btn-warning btn-xs pull-right raw-margin-right-16" href="{{ url('admin/users/'.$user->id.'/edit') }}"><span class="fa fa-edit"></span> Edit</a>
                                </td>
                            </tr>
                        @endif

                    @endforeach

                </tbody>

            </table>
            <div class="row text-center">
                {!! $users; !!}
            </div>
        </div>
    </div>

@stop
