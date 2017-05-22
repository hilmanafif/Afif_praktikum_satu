@extends('dashboard')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1>User Admin: Invite</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="/admin/users/invite">
                {!! csrf_field() !!}

                <div class="raw-margin-top-24">
                    @input_maker_label('Email')
                    @input_maker_create('email', ['type' => 'string'])
                </div>

                <div class="raw-margin-top-24">
                    @input_maker_label('Name')
                    @input_maker_create('name', ['type' => 'string'])
                </div>

                <div class="raw-margin-top-24">
                    @input_maker_label('Role')
                    @input_maker_create('roles', ['type' => 'relationship', 'model' => 'App\Models\Role', 'label' => 'label', 'value' => 'name'])
                </div>
                <div class="raw-margin-top-24">
                    @input_maker_label('Bagian')
                    @input_maker_create('bagians', ['type' => 'relationship', 'model' => 'App\Models\Bagian', 'label' => 'name', 'value' => 'id'])
                </div>
                <div class="raw-margin-top-24">
                    @input_maker_label('Wilayah')
                    @input_maker_create('wilayahs', ['type' => 'relationship', 'model' => 'App\Models\Wilayah', 'label' => 'name', 'value' => 'id'])
                </div>
                <div class="raw-margin-top-24">
                    @input_maker_label('Pangkat')
                    @input_maker_create('pangkats', ['type' => 'relationship', 'model' => 'App\Models\Bagian', 'label' => 'name', 'value' => 'id'])
                </div>
                <div class="raw-margin-top-24">
                    @input_maker_label('Jabatan')
                    @input_maker_create('jabatans', ['type' => 'relationship', 'model' => 'App\Models\Jabatan', 'label' => 'name', 'value' => 'id'])
                </div>

                <div class="raw-margin-top-24">
                    <a class="btn btn-default pull-left" href="{{ URL::previous() }}">Cancel</a>
                    <button class="btn btn-success pull-right" name="submit" value="create" type="submit">Create</button>
                    <button class="btn btn-primary pull-right" name="submit" value="invite" type="submit">Invite</button>
                </div>
            </form>
        </div>
    </div>

@stop
