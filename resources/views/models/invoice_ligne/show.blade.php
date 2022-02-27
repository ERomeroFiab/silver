@extends('listado')



@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <h4 class="my-0">ID_INVOICE_LIGNE: {{ $invoice_ligne->ID_INVOICE_LIGNE }}</h4>
                        <p>Tabla <b>invoice_ligne</b></p>
                    </div>
                </div>

                <div class="row">
                    @foreach (config('tablas') as $table_name => $columns)
                        @if ( $table_name === "invoice_ligne" )
                            @foreach ($columns as $column)
                                <div class="col-3 form-group">
                                    <label>{{ $column }}</label>
                                    <input id="{{ $column }}" type="text" class="form-control" value="{{ $invoice_ligne->{$column} }}" disabled title="{{ $invoice_ligne->{$column} }}">
                                </div>
                            @endforeach
                        @endif
                    @endforeach

                </div>

                @if ( $invoice_ligne->invoice )
                    <div class="row">
                        <div class="col-12">
                            <p><b>Tabla invoice</b></p>
                        </div>
                    </div>
                    <div class="row">
                        @foreach (config('tablas')['invoice'] as $column)
                            <div class="col-3 form-group">
                                <label>{{ $column }}</label>
                                <input id="{{ $invoice_ligne->invoice->{$column} }}" type="text" class="form-control" value="{{  $invoice_ligne->invoice->{$column} }}" disabled title="{{ $invoice_ligne->invoice->{$column} }}">
                            </div>
                        @endforeach
                    </div>

                    @if ( $invoice_ligne->invoice->contrat )
                        <div class="row">
                            <div class="col-12">
                                <p><b>Tabla contrat</b></p>
                            </div>
                        </div>
                        <div class="row">
                            @foreach (config('tablas')['contrat'] as $column)
                                <div class="col-3 form-group">
                                    <label>{{ $column }}</label>
                                    <input id="{{ $invoice_ligne->invoice->contrat->{$column} }}" type="text" class="form-control" value="{{  $invoice_ligne->invoice->contrat->{$column} }}" disabled title="{{ $invoice_ligne->invoice->contrat->{$column} }}">
                                </div>
                            @endforeach
                        </div>
                    @endif

                    @if ( $invoice_ligne->invoice->identification )
                        <div class="row">
                            <div class="col-12">
                                <p><b>Tabla identification</b></p>
                            </div>
                        </div>
                        <div class="row">
                            @foreach (config('tablas')['identification'] as $column)
                                <div class="col-3 form-group">
                                    <label>{{ $column }}</label>
                                    <input id="{{ $invoice_ligne->invoice->identification->{$column} }}" type="text" class="form-control" value="{{  $invoice_ligne->invoice->identification->{$column} }}" disabled title="{{ $invoice_ligne->invoice->identification->{$column} }}">
                                </div>
                            @endforeach
                        </div>
                    @endif
                    
                @endif
                

                @if ( $invoice_ligne->mission_motive_eco )
                    <div class="row">
                        <div class="col-12">
                            <p><b>Tabla mission_motive_eco</b></p>
                        </div>
                    </div>
                    <div class="row">
                        @foreach (config('tablas')['mission_motive_eco'] as $column)
                            <div class="col-3 form-group">
                                <label>{{ $column }}</label>
                                <input id="{{ $invoice_ligne->mission_motive_eco->{$column} }}" type="text" class="form-control" value="{{  $invoice_ligne->mission_motive_eco->{$column} }}" disabled title="{{ $invoice_ligne->mission_motive_eco->{$column} }}">
                            </div>
                        @endforeach
                    </div>

                    @if ( $invoice_ligne->mission_motive_eco->mission_motive )
                        <div class="row">
                            <div class="col-12">
                                <p><b>Tabla mission_motive</b></p>
                            </div>
                        </div>
                        <div class="row">
                            @foreach (config('tablas')['mission_motive'] as $column)
                                <div class="col-3 form-group">
                                    <label>{{ $column }}</label>
                                    <input id="{{ $invoice_ligne->mission_motive_eco->mission_motive->{$column} }}" type="text" class="form-control" value="{{  $invoice_ligne->mission_motive_eco->mission_motive->{$column} }}" disabled title="{{ $invoice_ligne->mission_motive_eco->mission_motive->{$column} }}">
                                </div>
                            @endforeach
                        </div>

                        @if ( $invoice_ligne->mission_motive_eco->mission_motive->mission )
                            <div class="row">
                                <div class="col-12">
                                    <p><b>Tabla mission</b></p>
                                </div>
                            </div>
                            <div class="row">
                                @foreach (config('tablas')['mission'] as $column)
                                    <div class="col-3 form-group">
                                        <label>{{ $column }}</label>
                                        <input id="{{ $invoice_ligne->mission_motive_eco->mission_motive->mission->{$column} }}" type="text" class="form-control" value="{{  $invoice_ligne->mission_motive_eco->mission_motive->mission->{$column} }}" disabled title="{{ $invoice_ligne->mission_motive_eco->mission_motive->mission->{$column} }}">
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        
                    @endif

                    
                @endif


            



            </div>



        </div> <!-- End card -->
    </div>
</div>
@endsection