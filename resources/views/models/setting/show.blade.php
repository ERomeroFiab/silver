@extends('listado')



@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <h4 class="my-0">ID_SETTINGS: {{ $setting->ID_SETTINGS }}</h4>
                        <p>Tabla <b>settings</b></p>
                    </div>
                </div>

                <div class="row">
                    @foreach (config('tablas') as $table_name => $columns)
                        @if ( $table_name === "settings" )
                            @foreach ($columns as $column)
                                <div class="col-3 form-group">
                                    <label>{{ $column }}</label>
                                    <input id="{{ $column }}" type="text" class="form-control" value="{{ $setting->{$column} }}" disabled title="{{ $setting->{$column} }}">
                                </div>
                            @endforeach
                        @endif
                    @endforeach

                </div>



            


            </div>



        </div> <!-- End card -->
    </div>
</div>
@endsection