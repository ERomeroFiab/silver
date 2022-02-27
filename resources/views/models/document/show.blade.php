@extends('listado')



@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <h4 class="my-0">ID_DOCUMENTS: {{ $document->ID_DOCUMENTS }}</h4>
                        <p>Tabla <b>documents</b></p>
                    </div>
                </div>

                <div class="row">
                    @foreach (config('tablas') as $table_name => $columns)
                        @if ( $table_name === "documents" )
                            @foreach ($columns as $column)
                                <div class="col-3 form-group">
                                    <label>{{ $column }}</label>
                                    <input id="{{ $column }}" type="text" class="form-control" value="{{ $document->{$column} }}" disabled title="{{ $document->{$column} }}">
                                </div>
                            @endforeach
                        @endif
                    @endforeach

                </div>

                @if ( $document->identification )
                    <div class="row">
                        <div class="col-12">
                            <p><b>Tabla Identification</b></p>
                        </div>
                    </div>
                    <div class="row">
                        @foreach (config('tablas')['identification'] as $column)
                            <div class="col-3 form-group">
                                <label>{{ $column }}</label>
                                <input id="{{ $document->identification->{$column} }}" type="text" class="form-control" value="{{  $document->identification->{$column} }}" disabled title="{{ $document->identification->{$column} }}">
                            </div>
                        @endforeach
                    </div>
                @endif

                @if ( $document->contrat )
                    <div class="row">
                        <div class="col-12">
                            <p><b>Tabla contrat</b></p>
                        </div>
                    </div>
                    <div class="row">
                        @foreach (config('tablas')['contrat'] as $column)
                            <div class="col-3 form-group">
                                <label>{{ $column }}</label>
                                <input id="{{ $document->contrat->{$column} }}" type="text" class="form-control" value="{{  $document->contrat->{$column} }}" disabled title="{{ $document->contrat->{$column} }}">
                            </div>
                        @endforeach
                    </div>
                @endif

                @if ( $document->affaire )
                    <div class="row">
                        <div class="col-12">
                            <p><b>Tabla affaire</b></p>
                        </div>
                    </div>
                    <div class="row">
                        @foreach (config('tablas')['affaire'] as $column)
                            <div class="col-3 form-group">
                                <label>{{ $column }}</label>
                                <input id="{{ $document->affaire->{$column} }}" type="text" class="form-control" value="{{  $document->affaire->{$column} }}" disabled title="{{ $document->affaire->{$column} }}">
                            </div>
                        @endforeach
                    </div>
                @endif

                @if ( $document->contact )
                    <div class="row">
                        <div class="col-12">
                            <p><b>Tabla contact</b></p>
                        </div>
                    </div>
                    <div class="row">
                        @foreach (config('tablas')['contact'] as $column)
                            <div class="col-3 form-group">
                                <label>{{ $column }}</label>
                                <input id="{{ $document->contact->{$column} }}" type="text" class="form-control" value="{{  $document->contact->{$column} }}" disabled title="{{ $document->contact->{$column} }}">
                            </div>
                        @endforeach
                    </div>
                @endif

                @if ( $document->mission )
                    <div class="row">
                        <div class="col-12">
                            <p><b>Tabla mission</b></p>
                        </div>
                    </div>
                    <div class="row">
                        @foreach (config('tablas')['mission'] as $column)
                            <div class="col-3 form-group">
                                <label>{{ $column }}</label>
                                <input id="{{ $document->mission->{$column} }}" type="text" class="form-control" value="{{  $document->mission->{$column} }}" disabled title="{{ $document->mission->{$column} }}">
                            </div>
                        @endforeach
                    </div>
                @endif

                @if ( $document->action )
                    <div class="row">
                        <div class="col-12">
                            <p><b>Tabla action</b></p>
                        </div>
                    </div>
                    <div class="row">
                        @foreach (config('tablas')['action'] as $column)
                            <div class="col-3 form-group">
                                <label>{{ $column }}</label>
                                <input id="{{ $document->action->{$column} }}" type="text" class="form-control" value="{{  $document->action->{$column} }}" disabled title="{{ $document->action->{$column} }}">
                            </div>
                        @endforeach
                    </div>
                @endif

                @if ( $document->invoice )
                    <div class="row">
                        <div class="col-12">
                            <p><b>Tabla invoice</b></p>
                        </div>
                    </div>
                    <div class="row">
                        @foreach (config('tablas')['invoice'] as $column)
                            <div class="col-3 form-group">
                                <label>{{ $column }}</label>
                                <input id="{{ $document->invoice->{$column} }}" type="text" class="form-control" value="{{  $document->invoice->{$column} }}" disabled title="{{ $document->invoice->{$column} }}">
                            </div>
                        @endforeach
                    </div>
                @endif


            





            </div>



        </div> <!-- End card -->
    </div>
</div>
@endsection