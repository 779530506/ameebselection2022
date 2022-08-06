
<!DOCTYPE html>
<html lang="en">

<head>


    <!-- Bootstrap CSS & JS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- END Bootstrap -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- additional  CSS  -->
    <link rel="stylesheet" href="css/style.css">
    <!-- END additional CSS -->

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <!--  Header -->
    <div class="container-fluid p-0">
        <img src="img/banner.jpg" style="width: 100%;">
    </div>
    <!-- End Header -->

    <!--   Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('votes.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('votes.index') }}">Voter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('postulers.index') }}">Postuler</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">AMEEBS INFO</a>
                    </li>

                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <!--  End Navbar-->

    <!-- Sidenav & Body & Sidbar  -->
    <div class="container">
        <div class="row" style="margin-top: 20px;">

            <!-- 4.1)  Sidenav avec 4 colonnes -->
            <div class="col-md-4">



                {{-- <div class="card border-primary  mb-3" style="max-width: 18rem;">
            <div class="card-header bg-primary" style="color:white;">Main menu</div>
            <div class="card-body text-primary" style="padding:0px;">
        <div class="vertical-menu" >

            <a href="#">Link 1</a>
            <a href="#">Link 2</a>
            <a href="#">Link 3</a>
            <a href="#">Link 4</a>
          </div>
          </div></div> --}}


                <div class="card border-primary  " style="max-width: 18rem;">
                    <div class="card-header bg-primary" style="color:white;">
                        postulerr Ici:
                        {{-- {{ $countAmadou + $countAlsane }} --}}
                    </div>
                    <div class="card-body text-primary">


                        <!--  Login Form -->

                        <div class="container login-container">
                            <div class="row">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            @if ($message = Session::get('fail'))
                                <div class="alert alert-danger">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                                <form action="{{ route('postulers.store') }}" method="POST" autocomplete="off" >
                                    @csrf
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Nom</strong>
                                                <input type="int" name="nom" class="form-control"
                                                    placeholder="nom">
                                                @error('nom')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <strong>Prenom</strong>
                                                <input type="text" name="prenom" class="form-control"
                                                    placeholder="prenom">
                                                @error('prenom')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <strong>Tel:</strong>
                                                <input type="text" name="telephone" class="form-control"
                                                    placeholder="">
                                                @error('telephone')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <strong>Poste</strong>
                                                {{-- <label for="pet-select">Choose a pet:</label> --}}

                                                <select name="poste" class="form-control">
                                                    <option value="membre">Postuler</option>
                                                    <option value="Vice President">Vice Président</option>
                                                    <option value="Trésorier">Trésorier</option>
                                                    <option value="Adjoint Trésorier">Adjoint Trésorier</option>
                                                    <option value="Secretaire">Secrétaire</option>
                                                    <option value="Adjoint Secretaire">Adjoint Secrétaire</option>
                                                    <option value="Commission D'Organisation">Commission D'organisation</option>
                                                    <option value="Commission Sportive">Commission Sportive</option>
                                                    <option value="Commission Culturelle">Commission Culturelle</option>
                                                    <option value="Commission Pedagogique">Commission Pédagogique</option>
                                                    <option value="Commission Féminine">Commission Féminine </option>
                                                    <option value="Commission Sociale">Commission Sociale</option>
                                                    <option value="Commission au Compte">Commission au compte</option>
                                                    <option value="Conseil d'administration">Conseil D'administration</option>
                                                    <option value="Relation Extérieure">Relation Extérieur</option>
                                                </select>
                                            </div>
                                        </div>

                                        <h4> </h4>
                                        <button type="submit" class="btn btn-primary ml-3">Je postule</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Sidenav-->
            <!-- BODY avec 8 colonnes-->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary" style="color:white; font-size: 18px; font-weight:bold;">
                        Liste des postulants
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                        <div class="container mt-2">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                </div>
                            </div>


                            <table class="table table-bordered table-striped">
                                <tr>
                                    {{-- <th>id</th> --}}
                                    <th>Prenom Nom</th>
                                    <th>Telephone</th>
                                    <th>Poste</th>
                                    <th>Actions</th>
                                </tr>
                                @foreach ($postulers as $postuler)
                                    <tr>
                                        {{-- <td>{{ $postuler->id }}</td> --}}
                                        <td>{{ $postuler->prenom }} {{ $postuler->nom }}</td>
                                        <td>{{ $postuler->telephone }}</td>
                                        <td>{{ $postuler->poste }}</td>
                                        <td>
                                            <form action="{{ route('postulers.destroy', $postuler->id) }}" method="Post" autocomplete="off">
                                                {{-- <a class="btn btn-primary" href="{{ route('postulers.edit',$postuler->id) }}">Edit</a> --}}
                                                {{-- <a class="btn btn-primary" href="{{ route('postulers.show', $postuler->id) }}">Show</a> --}}
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            </p>
                            {{-- <a href="#" class="btn btn-primary">Read More !</a> --}}
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <br />
        <!-- End Body-->


        <div class="container-fluid p-0">
            <div class="row" style="margin-top: 20px;">
                <footer class="bg-dark text-center text-white">
                    <!-- Grid container -->
                    <div class="container p-4 pb-0">

                    </div>
                    <!-- Grid container -->

                    <!-- Copyright -->
                    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                        © 2020 Copyright:
                        <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
                    </div>
                    <!-- Copyright -->
                </footer>
            </div>
        </div>



</body>

</html>
