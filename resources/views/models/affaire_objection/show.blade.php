@extends('listado')



@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <h4 class="my-0">ID_AFFAIRE_OBJECTIONS: {{ $affaire_objection->ID_AFFAIRE_OBJECTIONS }}</h4>
                        <p>Tabla <b>affaire_objections</b></p>
                    </div>
                </div>

                <div class="row">
                    @foreach (config('tablas') as $table_name => $columns)
                        @if ( $table_name === "affaire_objections" )
                            @foreach ($columns as $column)
                                <div class="col-3 form-group">
                                    <label>{{ $column }}</label>
                                    <input id="{{ $column }}" type="text" class="form-control" value="{{ $affaire_objection->{$column} }}" disabled title="{{ $affaire_objection->{$column} }}">
                                </div>
                            @endforeach
                        @endif
                    @endforeach

                </div>

                @if ( $affaire_objection->affaire )
                    <div class="row">
                        <div class="col-12">
                            <p><b>Tabla affaire</b></p>
                        </div>
                    </div>
                    <div class="row">
                        @foreach (config('tablas')['affaire'] as $column)
                            <div class="col-3 form-group">
                                <label>{{ $column }}</label>
                                <input id="{{ $affaire_objection->affaire->{$column} }}" type="text" class="form-control" value="{{  $affaire_objection->affaire->{$column} }}" disabled title="{{ $affaire_objection->affaire->{$column} }}">
                            </div>
                        @endforeach
                    </div>

                    @if ( $affaire_objection->affaire->contact )
                        <div class="row">
                            <div class="col-12">
                                <p><b>Tabla contact</b></p>
                            </div>
                        </div>
                        <div class="row">
                            @foreach (config('tablas')['contact'] as $column)
                                <div class="col-3 form-group">
                                    <label>{{ $column }}</label>
                                    <input id="{{ $affaire_objection->affaire->contact->{$column} }}" type="text" class="form-control" value="{{  $affaire_objection->affaire->contact->{$column} }}" disabled title="{{ $affaire_objection->affaire->contact->{$column} }}">
                                </div>
                            @endforeach
                        </div>
                    @endif
                    @if ( $affaire_objection->affaire->identification )
                        <div class="row">
                            <div class="col-12">
                                <p><b>Tabla identification</b></p>
                            </div>
                        </div>
                        <div class="row">
                            @foreach (config('tablas')['identification'] as $column)
                                <div class="col-3 form-group">
                                    <label>{{ $column }}</label>
                                    <input id="{{ $affaire_objection->affaire->identification->{$column} }}" type="text" class="form-control" value="{{  $affaire_objection->affaire->identification->{$column} }}" disabled title="{{ $affaire_objection->affaire->contact->{$column} }}">
                                </div>
                            @endforeach
                        </div>
                    @endif


                @endif



         

            </div>



        </div> <!-- End card -->
    </div>
</div>
@endsection



