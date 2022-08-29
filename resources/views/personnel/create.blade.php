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
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Information des personnels</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('personnels.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>IM de personnels:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-calculator"></i>
                                            </span>
                                        </div>
                                        <input type="number" name="personnel[im_personnel]" class="form-control" placeholder="IM de personnels">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nom de personnels:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-calculator"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="personnel[nom_personnel]" class="form-control" placeholder="Nom de personnels">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Fonction de personnels:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-calculator"></i>
                                            </span>
                                        </div>
                                        <select name="personnel[fonction_personnel]" id="" class="form-control">
                                            <option value="Directeur">Directeur</option>
                                            <option value="Directrice">Directrice</option>
                                            <option value="Verificateur">Verificateur</option>
                                            <option value="Secretaire">Secretaire</option>
                                            <option value="Chef FOP">Chef FOP</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Telephone de personnels:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-phone"></i>
                                            </span>
                                        </div>
                                        <input type="number" name="personnel[telephone_personnel]"  placeholder="0346697188" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Pseudonime:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-user"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="user[name]"  class="form-control" placeholder="Pseudonime">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Role :</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-user"></i>
                                            </span>
                                        </div>
                                        <select name="user[role]" class="form-control">
                                            <option value="Administrateur">Administrateur</option>
                                            <option value="simple Utilisateur">simple Utilisateur</option>
                                        </select>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Mot de passe :</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-key"></i>
                                            </span>
                                        </div>
                                        <input type="password" name="user[password]" class="form-control" placeholder="Mot de Passe">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                              <div class="icheck-primary">
                                <button type="reset" class="btn btn-danger btn-block">Annuler</button>
                                
                              </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-6">
                              <button type="submit" class="btn btn-primary btn-block">Enregistrer</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
