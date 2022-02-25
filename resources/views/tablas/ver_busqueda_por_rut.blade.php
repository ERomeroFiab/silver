@extends('listado')



@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <h4 class="mt-0">Rut: xxxxxx</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3 form-group">
                        <label>Ejemplo</label>
                        <input type="text" class="form-control" value="ejemplo" disabled>
                    </div>
                    <div class="col-3 form-group">
                        <label>Ejemplo</label>
                        <input type="text" class="form-control" value="ejemplo" disabled>
                    </div>
                    <div class="col-3 form-group">
                        <label>Ejemplo</label>
                        <input type="text" class="form-control" value="ejemplo" disabled>
                    </div>
                    <div class="col-3 form-group">
                        <label>Ejemplo</label>
                        <input type="text" class="form-control" value="ejemplo" disabled>
                    </div>
                    <div class="col-3 form-group">
                        <label>Ejemplo</label>
                        <input type="text" class="form-control" value="ejemplo" disabled>
                    </div>
                    <div class="col-3 form-group">
                        <label>Ejemplo</label>
                        <input type="text" class="form-control" value="ejemplo" disabled>
                    </div>
                    <div class="col-3 form-group">
                        <label>Ejemplo</label>
                        <input type="text" class="form-control" value="ejemplo" disabled>
                    </div>
                    <div class="col-3 form-group">
                        <label>Ejemplo</label>
                        <input type="text" class="form-control" value="ejemplo" disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2>Tabla: <b>action</b> (54 columnas)</h2>
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
                                                {{-- SERVER SIDE RENDERING --}}
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

