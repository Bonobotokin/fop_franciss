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
                                            <td>{{ $liste['usagers'] }}</td>{{ $liste['date_arriver'] }}
                                            <td>
                                                @if (!is_null($liste['id_arriver']))
                                                    <a class="btn btn-block btn-outline-success btn-sm" href="#"
                                                        data-toggle="modal" data-target="#modale_{{$liste['id_usager']}}">
                                                        <i class="fa fa-marker"></i>
                                                        {{ $liste['date_arriver'] }}
                                                    </a>
                                                @endif
                                            </td>
                                            <td>
                                                @if (is_null($liste['id_depart']))
                                                    <a class="btn btn-block btn-outline-danger btn-sm" href="#modale_{{$liste['id_usager']}}"
                                                        data-toggle="modal" data-target="#modale_{{$liste['id_usager']}}">
                                                        <i class="fa fa-plus"></i>
                                                        Enregistrer le depart
                                                    </a>
                                                @else
                                                    <a class="btn btn-block btn-outline-success btn-sm" href="#modale_{{$liste['id_usager']}}"
                                                        data-toggle="modal" data-target="#modale_{{$liste['id_usager']}}">
                                                        <i class="fa fa-marker"></i>
                                                        {{ $liste['date_depart'] }}
                                                    </a>
                                                @endif

                                            </td>
                                            <td>
                                                @if (is_null($liste['id_transmission']))
                                                    <a class="btn btn-block btn-outline-danger btn-sm" href="#transmission_{{$liste['id_usager']}}"
                                                        data-toggle="modal" data-target="#transmission_{{$liste['id_usager']}}">
                                                        <i class="fa fa-plus"></i>
                                                        Tramission
                                                    </a>
                                                @else
                                                    <a class="btn btn-block btn-outline-success btn-sm" href="#"
                                                        data-toggle="modal" data-target="#{{$liste['id_usager']}}">
                                                        <i class="fa fa-marker"></i>
                                                        {{ $liste['date_transmission'] }}
                                                    </a>
                                                @endif
                                            </td>
                                            <td>
                                                @if (is_null($liste['id_depart']))
                                                    <button type="button" class="btn btn-warning btn-block">
                                                        <i class="fa fa-bell"></i>
                                                        En attente
                                                    </button>
                                                @else
                                                    <button type="button" class="btn btn-success btn-block">
                                                        <i class="fa fa-bell"></i>
                                                        Livrer
                                                    </button>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="button" class="btn btn-block btn-info btn-sm">
                                                    <i class="fa fa-info"></i>
                                                    Plus Info
                                                </a>

                                            </td>
                                        </tr>
                                        <div class="modal fade" id="modale_{{$liste['id_usager']}}">
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

                                                        <form action="{{ route('archive.store.depart') }}"
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

                                                                        <input type="hidden" name="depart[id_etat_dosiier]"
                                                                            value="{{ $liste['id_etat_dossier'] }}">

                                                                        <input type="hidden" name="depart[id_arriver]"
                                                                            value="{{ $liste['id_arriver'] }}">
                                                                        <input type="hidden"
                                                                            name="depart[id_transmission]"
                                                                            value="{{ $liste['id_transmission'] }}">
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
                                        <div class="modal fade" id="transmission_{{$liste['id_usager']}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Depart du dossier de
                                                            {{ $liste['usagers'] }}
                                                        </h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form action="{{ route('archive.store.transmission') }}"
                                                            method="POST">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <p>informatin sur le Dossier</p>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <label for="">Numero</label>
                                                                        <input type="number"
                                                                            name="transmission[numero_transmission]"
                                                                            class="form-control" placeholder="Numero">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-6">
                                                                        <input type="hidden" name="transmission[id_usager]"
                                                                            class="form-control"
                                                                            value="{{ $liste['id_usager'] }}">

                                                                        <input type="hidden"
                                                                            name="transmission[id_etat_dosiier]"
                                                                            value="{{ $liste['id_etat_dossier'] }}">

                                                                        <input type="hidden" name="transmission[id_arriver]"
                                                                            value="{{ $liste['id_arriver'] }}">

                                                                        <input type="hidden"
                                                                            name="transmission[id_depart]"
                                                                            value="{{ $liste['id_transmission'] }}">
                                                                        <input type="hidden"
                                                                            name="transmission[id_transmission]"
                                                                            value="{{ $liste['id_transmission'] }}">
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
