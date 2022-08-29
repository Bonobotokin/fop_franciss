@extends('../layouts.app')
@section('content')
    @if ($errors->any())
        <div class="alertDanger">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <strong>Error!</strong>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header mb-3">
                    <h3 class="card-title">Listes des Dossiers Archiver</h3>
                </div>
                <!-- /.card-header -->
                <div class="row">
                    <div class="col-md-4">
                        <button type="button" class="btn btn-block btn-outline-primary btn-sm" data-toggle="modal"
                            data-target="#modal-default">
                            Nouveaux Dossiers
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row ">
                        <div class="col-sm-12">
                            <table id="example1" class="table table-bordered table-hover dataTable dtr-inline">
                                <thead>
                                    <tr>
                                        <th>Numero</th>
                                        <th>Usagers</th>
                                        <th>Date D'arrive</th>
                                        <th>Date de Depart</th>
                                        <th>Date de Transmission</th>
                                        <th>Etat</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allArchives as $liste)
                                        <tr style="text-align:center">
                                            <td>{{ $liste['numero'] }}</td>
                                            <td>{{ $liste['usagers'] }}</td>
                                            <td>{{ $liste['date_arriver'] }}</td>
                                            <td>{{ $liste['date_depart'] }}</td>
                                            <td>{{ $liste['date_transmission'] }}</td>
                                            @if (is_null($liste['id_depart']) || is_null($liste['id_transmission']))
                                                <td>
                                                    <button type="button" class="btn btn-warning btn-block">
                                                        <i class="fa fa-bell"></i>
                                                        En attente
                                                    </button>
                                                </td>
                                            @endif
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info">Action</button>
                                                    <button type="button"
                                                        class="btn btn-info dropdown-toggle dropdown-icon"
                                                        data-toggle="dropdown">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu" role="menu">
                                                        <a class="dropdown-item" href="#">Details</a>
                                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                                            data-target="#modal-depart">Depart</a>
                                                        <a class="dropdown-item" href="#">Transmission</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="modal-depart">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Depart du dossier de {{ $liste['usagers'] }}
                                                        </h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form action="{{ route('archive.store.departement') }}"
                                                            method="POST">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <p>informatin sur le Dossier</p>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <label for="">Numero</label>
                                                                        <input type="number" name="depart[numero_depart]"
                                                                            class="form-control" placeholder="Numero">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-6">
                                                                        <label for="">Motif</label>
                                                                        <input type="text" name="depart[motif_depart]"
                                                                            class="form-control" placeholder="Objet ">
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label for="">destinateur</label>
                                                                        <input type="text" class="form-control"
                                                                            disabled="" value="{{ $liste['usagers'] }}">

                                                                        <input type="hidden" name="depart[id_usager]"
                                                                            class="form-control"
                                                                            value="{{ $liste['id_usager'] }}">

                                                                            <input type="hidden" name="depart[etatDossier_id]"
                                                                            value="{{ $liste['id_etat_dossier'] }}">

                                                                        <input type="hidden" name="depart[id_arriver]"
                                                                            value="{{ $liste['id_arriver'] }}">
                                                                    </div>
                                                                </div>

                                                                <button type="reset" class="btn btn-danger"
                                                                    data-dismiss="modal">Fermer</button>
                                                                <input type="submit" class="btn btn-primary"
                                                                    value="Enregistrer">
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
