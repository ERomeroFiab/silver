@extends('listado')



@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <h4 class="mt-0">Rut: {{ $identification->SIRET }}</h4>
                    </div>
                </div>

                <div class="row">
                    @foreach (config('tablas') as $table_name => $columns)
                        @if ( $table_name === "identification" )
                            @foreach ($columns as $column)
                                <div class="col-3 form-group">
                                    <label>{{ $column }}</label>
                                    <input type="text" class="form-control" value="{{ $identification->{$column} }}" disabled>
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                </div>

                {{-- TABLA ACTION --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="mb-0">Tabla: <b>action</b> del rut <b>{{ $identification->SIRET }}</b></h2>
                                <p>({{ count( config('tablas')['action'] ) }} columnas)</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12" style="overflow-x: scroll;">
                                        <table id="tabla_action" class="table-hover" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th>1 ID_ACTION</th>
                                                    <th>2 CATEGORIE</th>
                                                    <th>3 EMPLACEMENT</th>
                                                    <th>4 E_MAIL</th>
                                                    <th>5 NOM</th>
                                                    <th>6 NOTE</th>
                                                    <th>7 RESULTAT</th>
                                                    <th>8 SUIVI_PAR</th>
                                                    <th>9 TYPE_EVENEMENT</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($identification->actions as $action)
                                                    <tr>
                                                        <td>{{ $action->ID_ACTION }}</td>
                                                        <td>{{ $action->CATEGORIE }}</td>
                                                        <td>{{ $action->EMPLACEMENT }}</td>
                                                        <td>{{ $action->E_MAIL }}</td>
                                                        <td>{{ $action->NOM }}</td>
                                                        <td>{{ $action->NOTE }}</td>
                                                        <td>{{ $action->RESULTAT }}</td>
                                                        <td>{{ $action->SUIVI_PAR }}</td>
                                                        <td>{{ $action->TYPE_EVENEMENT }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End card -->
                    </div>
                </div>

                {{-- TABLA AFFAIRE --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="mb-0">Tabla: <b>affaire</b> del rut <b>{{ $identification->SIRET }}</b></h2>
                                <p>({{ count( config('tablas')['affaire'] ) }} columnas)</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12" style="overflow-x: scroll;">
                                        <table id="tabla_affaire" class="table-hover" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th>1 ID_AFFAIRE</th>
                                                    <th>2 CIVILITE</th>
                                                    <th>3 DATE_PREVISIONNEL</th>
                                                    <th>4 DATE_SIGNATURE</th>
                                                    <th>5 FAMILLE</th>
                                                    <th>6 PRENOM</th>
                                                    <th>7 NOM</th>
                                                    <th>8 NO_AFFAIRE</th>
                                                    <th>9 PHASE</th>
                                                    <th>10 PROBABILITE</th>
                                                    <th>11 PRODUIT</th>
                                                    <th>12 STATUT</th>
                                                    <th>13 SUIVI_PAR</th>
                                                    <th>14 TOTAL_PREVISIONNEL</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($identification->affaires as $affaire)
                                                    <tr>
                                                        <td>{{ $affaire->ID_AFFAIRE }}</td>
                                                        <td>{{ $affaire->CIVILITE }}</td>
                                                        <td>{{ $affaire->DATE_PREVISIONNEL }}</td>
                                                        <td>{{ $affaire->DATE_SIGNATURE }}</td>
                                                        <td>{{ $affaire->FAMILLE }}</td>
                                                        <td>{{ $affaire->PRENOM }}</td>
                                                        <td>{{ $affaire->NOM }}</td>
                                                        <td>{{ $affaire->NO_AFFAIRE }}</td>
                                                        <td>{{ $affaire->PHASE }}</td>
                                                        <td>{{ $affaire->PROBABILITE }}</td>
                                                        <td>{{ $affaire->PRODUIT }}</td>
                                                        <td>{{ $affaire->STATUT }}</td>
                                                        <td>{{ $affaire->SUIVI_PAR }}</td>
                                                        <td>{{ $affaire->TOTAL_PREVISIONNEL }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End card -->
                    </div>
                </div>

                {{-- TABLA CONTACT --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="mb-0">Tabla: <b>contact</b> del rut <b>{{ $identification->SIRET }}</b></h2>
                                <p>({{ count( config('tablas')['contact'] ) }} columnas)</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12" style="overflow-x: scroll;">
                                        <table id="tabla_contact" class="table-hover" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th>1 ID_CONTACT</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($identification->contacts as $contact)
                                                    <tr>
                                                        <td>{{ $contact->ID_CONTACT }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End card -->
                    </div>
                </div>

                {{-- TABLA CONTRAT --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="mb-0">Tabla: <b>contrat</b> del rut <b>{{ $identification->SIRET }}</b></h2>
                                <p>({{ count( config('tablas')['contrat'] ) }} columnas)</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12" style="overflow-x: scroll;">
                                        <table id="tabla_contrat" class="table-hover" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th>1 ID_CONTRAT</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($identification->contrats as $contra)
                                                    <tr>
                                                        <td>{{ $contra->ID_CONTRAT }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End card -->
                    </div>
                </div>

                {{-- TABLA contrat_detail_produit --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="mb-0">Tabla: <b>contrat_detail_produit</b> del rut <b>{{ $identification->SIRET }}</b></h2>
                                <p>({{ count( config('tablas')['contrat_detail_produit'] ) }} columnas)</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12" style="overflow-x: scroll;">
                                        <table id="tabla_contrat_detail_produit" class="table-hover" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th>1 ID_CONTRAT_DETAIL_PRODUIT</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($identification->contrat_detail_produits as $contra_detail)
                                                    <tr>
                                                        <td>{{ $contra_detail->ID_CONTRAT_DETAIL_PRODUIT }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End card -->
                    </div>
                </div>

                {{-- TABLA documents --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="mb-0">Tabla: <b>documents</b> del rut <b>{{ $identification->SIRET }}</b></h2>
                                <p>({{ count( config('tablas')['documents'] ) }} columnas)</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12" style="overflow-x: scroll;">
                                        <table id="tabla_documents" class="table-hover" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th>1 ID_DOCUMENT</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($identification->documents as $doc)
                                                    <tr>
                                                        <td>{{ $doc->ID_DOCUMENT }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End card -->
                    </div>
                </div>

                {{-- TABLA identification_note --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="mb-0">Tabla: <b>identification_note</b> del rut <b>{{ $identification->SIRET }}</b></h2>
                                <p>({{ count( config('tablas')['identification_note'] ) }} columnas)</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12" style="overflow-x: scroll;">
                                        <table id="tabla_identification_note" class="table-hover" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th>1 ID_IDENTIFICATION_NOTE</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($identification->identification_notes as $iden_note)
                                                    <tr>
                                                        <td>{{ $iden_note->ID_IDENTIFICATION_NOTE }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End card -->
                    </div>
                </div>

                {{-- TABLA invoice --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="mb-0">Tabla: <b>invoice</b> del rut <b>{{ $identification->SIRET }}</b></h2>
                                <p>({{ count( config('tablas')['invoice'] ) }} columnas)</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12" style="overflow-x: scroll;">
                                        <table id="tabla_invoice" class="table-hover" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th>1 ID_INVOICE</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($identification->invoices as $invoice)
                                                    <tr>
                                                        <td>{{ $invoice->ID_INVOICE }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End card -->
                    </div>
                </div>

                {{-- TABLA mission --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="mb-0">Tabla: <b>mission</b> del rut <b>{{ $identification->SIRET }}</b></h2>
                                <p>({{ count( config('tablas')['mission'] ) }} columnas)</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12" style="overflow-x: scroll;">
                                        <table id="tabla_mission" class="table-hover" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th>1 ID_MISSION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($identification->missions as $mission)
                                                    <tr>
                                                        <td>{{ $mission->ID_MISSION }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End card -->
                    </div>
                </div>

            </div>



        </div> <!-- End card -->
    </div>
</div>
@endsection

