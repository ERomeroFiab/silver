@extends('listado')



@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <h4 class="my-0">ID_SOCIETE_FAMILLE: {{ $societe_famille->ID_SOCIETE_FAMILLE }}</h4>
                        <p>Tabla <b>societe_famille</b></p>
                    </div>
                </div>

                <div class="row">
                    @foreach (config('tablas') as $table_name => $columns)
                        @if ( $table_name === "societe_famille" )
                            @foreach ($columns as $column)
                                <div class="col-3 form-group">
                                    <label>{{ $column }}</label>
                                    <input id="{{ $column }}" type="text" class="form-control" value="{{ $societe_famille->{$column} }}" disabled title="{{ $societe_famille->{$column} }}">
                                </div>
                            @endforeach
                        @endif
                    @endforeach

                </div>

                @if ( $societe_famille->identification )
                    <div class="row">
                        <div class="col-12">
                            <p><b>Tabla Identification</b></p>
                        </div>
                    </div>
                    <div class="row">
                        @foreach (config('tablas')['identification'] as $column)
                            <div class="col-3 form-group">
                                <label>{{ $column }}</label>
                                <input id="{{ $societe_famille->identification->{$column} }}" type="text" class="form-control" value="{{  $societe_famille->identification->{$column} }}" disabled title="{{ $societe_famille->identification->{$column} }}">
                            </div>
                        @endforeach
                    </div>
                @endif
            



            </div>



        </div> <!-- End card -->
    </div>
</div>
@endsection