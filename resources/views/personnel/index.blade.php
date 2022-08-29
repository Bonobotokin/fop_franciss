@extends('../layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listes des personnels</h3>
                </div>
                <!-- /.card-header -->
                <div class="col-md-4">
                    <a href="{{ route('personnels.create') }}" class="btn btn-block btn-outline-primary btn-sm">
                        Nouveaux Personnels
                    </a>
                </div>
                <div class="card-body">
                    <div class="row ">
                        <div class="col-sm-12">
                            <table id="example2" class="table table-bordered table-hover dataTable dtr-inline">
                                <thead>
                                    <tr>
                                        <th>IM</th>
                                        <th>Nom</th>
                                        <th>Fonction</th>
                                        <th>Telephone</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($personnel as $listePersonnel)
                                        <tr>
                                            <td>{{ $listePersonnel->im_personnel }}</td>
                                            <td>{{ $listePersonnel->nom_personnel }}</td>
                                            <td>{{ $listePersonnel->fonction_personnel }}</td>
                                            <td>{{ $listePersonnel->telephone_personnel }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>IM</th>
                                        <th>Nom</th>
                                        <th>Fonction</th>
                                        <th>Telephone</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
