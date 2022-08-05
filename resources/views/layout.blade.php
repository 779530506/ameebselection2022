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


                <div class="card border-primary  mb-2" style="max-width: 18rem;">
                    <div class="card-header bg-primary" style="color:white;">
                        Voter Ici:
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
                                <form action="{{ route('votes.store') }}" method="POST" autocomplete="off" >
                                    @csrf
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>N* carte</strong>
                                                <input type="int" name="numeroCarte" class="form-control"
                                                    placeholder="9945">
                                                @error('numeroCarte')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <strong>Tel:</strong>
                                                <input type="text" name="telephone" class="form-control"
                                                    placeholder="779530506">
                                                @error('telephone')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group"><br>
                                                {{-- <strong>Votre choix:</strong><br> --}}
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="president"
                                                        value="amadou" id="flexRadioDefault1">
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Amadou I SARR
                                                    </label>
                                                </div>
                                                <br>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="alsane"
                                                        name="president" id="flexRadioDefault2" checked>
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        Alsane SARR
                                                    </label><br><br>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="null"
                                                        name="president" id="flexRadioDefault2" checked>
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        Bulletin Null
                                                    </label><br>
                                                </div>
                                                @error('president')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <h4> </h4>
                                        <button type="submit" class="btn btn-primary ml-3">Je vote</button>
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
                        Resultats: Nombre de votants {{ $total}}
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            Amadou I Sarr : <strong style="color:red; ">  {{ $countAmadou }}</strong> voix ......soit <span style="color:green; font-size:1.3em ">{{round($countAmadou  * 100 / $total,2)}} % </span><br><br>
                            Alsane Sarr : <strong style="color:red; ">{{ $countAlsane }}</strong> voix ......soit <span style="color:green; font-size:1.3em ">{{round($countAlsane  * 100 / $total,2)}} %</span><br><br>
                            Bulletin Null : <strong style="color:red;"> {{ $null }}</strong> voix .....soit <span style="color:green; font-size:1.3em "> {{round($null  * 100 / $total,2)}} %</span>
                        </p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header bg-primary" style="color:white; font-size: 18px; font-weight:bold;">
                        Liste des votants
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
                                    <th>Numero Carte membre</th>
                                    <th>President</th>
                                    <th>Actions</th>
                                </tr>
                                @foreach ($votes as $vote)
                                    <tr>
                                        {{-- <td>{{ $vote->id }}</td> --}}
                                        <td>{{ $vote->numeroCarte }}</td>
                                        <td>{{ $vote->president }}</td>
                                        <td>
                                            <form action="{{ route('votes.destroy', $vote->id) }}" method="Post" autocomplete="off">
                                                {{-- <a class="btn btn-primary" href="{{ route('votes.edit',$vote->id) }}">Edit</a> --}}
                                                {{-- <a class="btn btn-primary" href="{{ route('votes.show', $vote->id) }}">Show</a> --}}
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
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
                        © 2022 Copyright:
                        <a class="text-white" href="https://mdbootstrap.com/">AMEEBS</a>
                    </div>
                    <!-- Copyright -->
                </footer>
            </div>
        </div>



</body>

</html>
