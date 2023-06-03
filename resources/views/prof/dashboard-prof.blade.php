<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PROFESSEUR</title>

    {{-- BOOTSTRAP --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
    </script>

    {{-- FONTAWESOME --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css"
        integrity="sha512-SgaqKKxJDQ/tAUAAXzvxZz33rmn7leYDYfBP+YoMRSENhf3zJyx3SBASt/OfeQwBHA1nxMis7mM3EV/oYT6Fdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#exampleModal').modal('show');
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
</head>

<body>
    {{-- !START NAVBAR --}}
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand text-primary fw-bold" href="#">Gestion Des
                Etudiants</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav active" aria-current="true">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-2">
                            <div class="fw-bold"><a href="" style="text-decoration: none;">Cours</a></div>
                            {{-- <a class="nav-link" href="#">Cours</a> --}}
                        </div>
                        <span class="badge bg-primary rounded-pill">{{ count($cours) }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start ms-5">
                        <div class="ms-2 me-2">
                            <div class="fw-bold"><a href="" style="text-decoration: none;"> Etudiants</a></div>

                            {{-- <div class="fw-bold">Etudiants</div> --}}
                        </div>
                        <span class="badge bg-primary rounded-pill">{{ count($users) }}</span>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#">Liste des etudiants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Liste des documents</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Profile</a>
                    </li> --}}

                </ul>
            </div>
            <div class=" justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                style="text-decoration: none;">
                                <i class="fa-solid fa-right-from-bracket"></i> {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- !END NAVBAR --}}





    {{-- !TABLE 1 --}}

    <div class="my-5 ms-5 me-5">
        <button type="button" class="btn btn-outline-success mb-1" data-bs-toggle="modal"
            data-bs-target="#exampleModal">
            <i class="fa-solid fa-plus"></i>
        </button>
        <table id="example" class="table table-hover table-bordered text-center table-responsive">
            <thead class="table table-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Semestre</th>
                    <th scope="col">Filiere</th>
                    <th scope="col">Module</th>
                    <th scope="col">Course name</th>
                    <th scope="col">Nombre de Telechargement</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cours as $cour)
                    <tr>
                        <th scope="row">#</th>
                        <td>{{ $cour->semestre }}</td>
                        <td>{{ $cour->filiere }}</td>
                        <td>{{ $cour->module }}</td>
                        <td>{{ $cour->cours_name }}</td>
                        <td>{{ $cour->read_cours_count }}</td>
                        <td>
                            {{-- <button type="button" class="btn btn-primary text-light" data-bs-toggle="modal"
                                data-bs-target="#showModal{{ $cour->id }}"><i
                                    class="fa-solid fa-download"></i></button> --}}
                            <a href="{{ asset($cour->cours_body) }}" class="btn btn-primary" target="_blank"><i
                                    class="fa-solid fa-download"></i></a>
                            <button type="button" class="btn btn-warning text-light" data-bs-toggle="modal"
                                data-bs-target="#updateModal{{ $cour->id }}"><i
                                    class="fa-solid fa-pen"></i></button>
                            <button type="button" class="btn btn-danger text-light" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $cour->id }}"><i
                                    class="fa-solid fa-trash"></i></button>
                            <button type="button" class="btn btn-success text-light"><i
                                    class="fa-solid fa-comment"></i></button>

                            {{-- <button class="btn btn-primary dropdown-toggle dropdown-toggle-split" type="button"
                                id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                more
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><button class="dropdown-item" type="button">Option 1</button></li>
                                <li><button class="dropdown-item" type="button">Option 2</button></li>
                                <li><button class="dropdown-item" type="button">Option 3</button></li>
                            </ul> --}}
                        </td>
                    </tr>
                    {{--  --}}
                    <div class="modal modal-lg fade" id="showModal{{ $cour->id }}" data-bs-backdrop="static"
                        tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true" data-bs-keyboard="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="showModalLabel">View course</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="row g-3">
                                        <div class="row mt-1">
                                            <div class="col-md-4">
                                                <label for="inputEmail4" class="form-label">Filiere</label>
                                                <input type="text" value="{{ $cour->filiere }}"
                                                    class="form-control" id="inputEmail4" disabled>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="inputPassword4" class="form-label">Module</label>
                                                <input type="text" value="{{ $cour->module }}"
                                                    class="form-control" id="inputPassword4" disabled>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="inputAddress" class="form-label">Semestre</label>
                                                <input type="text" value="{{ $cour->semestre }}"
                                                    class="form-control" id="inputAddress" disabled>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-2">
                                            <label for="cours_name" class="form-label">File name</label>
                                            <input type="text" value="{{ $cour->cours_name }}"
                                                class="form-control" id="cours_name" disabled>
                                        </div>
                                        <div class="col-12 mt-3">
                                            <a href="{{ asset($cour->cours_body) }}" class="btn btn-primary w-100"
                                                target="_blank">Open PDF</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--  --}}
                    <div class="modal fade" id="deleteModal{{ $cour->id }}" data-bs-backdrop="static"
                        tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true" data-bs-keyboard="false">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="{{ route('cours.destroye', $cour->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}
                                    @method('DELETE')
                                    @csrf
                                    <div class="modal-header">
                                        <h4 class="modal-title">
                                            {{ __('Supprimer cours') }}</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Voulez-vous supprimer le cours
                                        <b>{{ $cour->cours_name }}</b>?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn gray btn-outline-secondary"
                                            data-bs-dismiss="modal">{{ __('Anuller') }}</button>
                                        <button type="submit"
                                            class="btn gray btn-outline-danger">{{ __('Supprimer') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{--  --}}
                    <div class="modal modal-lg fade" id="updateModal{{ $cour->id }}" data-bs-backdrop="static"
                        tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
                        data-bs-keyboard="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update course</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('cours.update', $cour->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="filiere" class="form-label">Filiere</label>
                                                <select class="form-select" name="filiere"
                                                    aria-label="Default select example">
                                                    <option value="">Choose</option>
                                                    <option value="Genie informatique">Génie informatique</option>
                                                    <option value="Genie elecctrique">Génie électrique</option>
                                                    <option value="Genie mecanique">Génie mécanique</option>
                                                    <option value="Genie industrielle">Génie industrielle</option>
                                                </select>
                                                @error('filiere')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="module" class="form-label">Module</label>
                                                <input class="form-select" type="search" list="dropdownList"
                                                    placeholder="Search module" name="module" id="module">
                                                <datalist id="dropdownList">
                                                    <option value="">Choose</option>
                                                    <option value="Java">Java</option>
                                                    <option value="Python">Python</option>
                                                    <option value="Laravel">Laravel</option>
                                                    <option value="HTML">HTML</option>
                                                    <option value="CSS">CSS</option>
                                                    <option value="MySQl">MySQl</option>
                                                    <option value="Langage C">Langage C</option>
                                                </datalist>
                                                @error('module')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="semestre" class="form-label">Semestre</label>
                                                <select class="form-select" name="semestre" id="semestre"
                                                    aria-label="Default select example">
                                                    <option value="">Choose</option>
                                                    <option value="S1">S1</option>
                                                    <option value="S2">S2</option>
                                                    <option value="S3">S3</option>
                                                    <option value="S4">S4</option>
                                                </select>
                                                @error('semestre')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mt-2 ">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="cours_name" class="form-label">File name</label>
                                                    <input class="form-control" name="cours_name" type="text"
                                                        id="cours_name" value="{{ $cour->cours_name }} ">
                                                    @error('cours_name')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="cours_body" class="form-label">Upload your
                                                        file</label>
                                                    <input class="form-control" name="cours_body" type="file"
                                                        id="cours_body" accept=".pdf, .doc, .docx, .xls, .xlsx">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-12">
                                                <button class="btn btn-success w-100" type="submit">submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
            {{-- <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
            </tfoot> --}}
        </table>
    </div>

    {{-- !END TABLE --}}


    {{-- !TABLE STUDENT --}}
    <div class="my-5 ms-5 me-5">
        <button type="button" class="btn btn-outline-success mb-1" data-bs-toggle="modal"
            data-bs-target="#addStudentModal">
            <i class="fa-solid fa-plus"></i>
        </button>
        <table class="table table-hover">
            <thead class="table table-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">CIN</th>
                    <th scope="col">CNE</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Class</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">1</th>
                        <td>{{ $user->cin }}</td>
                        <td>{{ $user->cne }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->lastname }}</td>
                        <td>{{ $user->semestre }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <button type="button" class="btn btn-success text-light">view</button>
                            <button type="button" class="btn btn-warning text-light">Update</button>
                            <button type="button" class="btn btn-danger text-light">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- !END TABLE STUDENT --}}

    {{-- ?---------------------------- MODALS COUSRSE ----------------------------? --}}
    {{-- !MODAL ADD STUDENT --}}
    <div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add student</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('etudiant.add') }}" method="POST" class="row g-3">
                        @csrf
                        <div class="col-md-6">
                            <label for="cin" class="form-label">CIN</label>
                            <input type="text" name="cin" class="form-control" id="cin">
                            @error('cin')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="cne" class="form-label">CNE</label>
                            <input type="text" name="cne" class="form-control" id="cne">
                            @error('cne')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="filiere" class="form-label">Filiere</label>
                            <select class="form-select" name="filiere" aria-label="Default select example">
                                <option value="">Choose</option>
                                <option value="Genie informatique">Génie informatique</option>
                                <option value="Genie elecctrique">Génie électrique</option>
                                <option value="Genie mecanique">Génie mécanique</option>
                                <option value="Genie industrielle">Génie industrielle</option>
                            </select>
                            @error('filiere')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="first_name" class="form-label">First name</label>
                            <input type="text" name="first_name" class="form-control" id="first_name">
                            @error('first_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="lastname"class="form-label">Last name</label>
                            <input type="text" name="lastname" class="form-control" id="lastname">
                            @error('lastname')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="semestre" class="form-label">Semestere</label>
                            <select id="semestre" name="semestre" class="form-select">
                                <option selected>Choose </option>
                                <option value="s1">S1</option>
                                <option value="s2">S2</option>
                                <option value="s3">S3</option>
                                <option value="s4">S4</option>
                            </select>
                            @error('semestre')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            {{-- <div class="col-md-12">
                                <label for="filiere" class="form-label">Email</label>
                                <input type="filiere" name="filiere" class="form-control" id="filiere">
                                @error('filiere')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div> --}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- !END MODAL ADD STUDENT --}}
    {{-- ?---------------------------- END MODAL STUDENT ---------------------------? --}}


    {{-- !---------------------------- MODALS COUSRSE ----------------------------! --}}
    {{-- !MODAL ADD COURSE --}}
    <div class="modal modal-lg fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add course</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('cours.add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <label for="filiere" class="form-label">Filiere</label>
                                <select class="form-select" name="filiere" aria-label="Default select example">
                                    <option value="">Choose</option>
                                    <option value="Genie informatique">Génie informatique</option>
                                    <option value="Genie elecctrique">Génie électrique</option>
                                    <option value="Genie mecanique">Génie mécanique</option>
                                    <option value="Genie industrielle">Génie industrielle</option>
                                </select>
                                @error('filiere')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="module" class="form-label">Module</label>
                                <input class="form-select" type="search" list="dropdownList"
                                    placeholder="Search module" name="module" id="module">
                                <datalist id="dropdownList">
                                    <option value="">Choose</option>
                                    <option value="Java">Java</option>
                                    <option value="Python">Python</option>
                                    <option value="Laravel">Laravel</option>
                                    <option value="HTML">HTML</option>
                                    <option value="CSS">CSS</option>
                                    <option value="MySQl">MySQl</option>
                                    <option value="Langage C">Langage C</option>
                                </datalist>
                                @error('module')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="semestre" class="form-label">Semestre</label>
                                <select class="form-select" name="semestre" id="semestre"
                                    aria-label="Default select example">
                                    <option value="">Choose</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                    <option value="S4">S4</option>
                                </select>
                                @error('semestre')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-2 ">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="cours_name" class="form-label">File name</label>
                                    <input class="form-control" name="cours_name" type="text" id="cours_name">
                                    @error('cours_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="cours_body" class="form-label">Upload your file</label>
                                    <input class="form-control" name="cours_body" type="file" id="cours_body"
                                        accept=".pdf, .doc, .docx, .xls, .xlsx">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <button class="btn btn-success w-100" type="submit">submit</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    {{-- !MODAL ADD COURSE END --}}
    {{-- ?MODAL SHOW COURSE --}}
    {{-- <div class="modal modal-lg fade" id="showModal{{ $cour->id }}" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="showModalLabel" aria-hidden="true" data-bs-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="showModalLabel">View course</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3">
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Filiere</label>
                            <input type="text" value="{{ $cour->filiere }}" class="form-control"
                                id="inputEmail4" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Module</label>
                            <input type="text" value="{{ $cour->module }}" class="form-control"
                                id="inputPassword4" disabled>
                        </div>
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Semestre</label>
                            <input type="text" value="{{ $cour->semestre }}" class="form-control"
                                id="inputAddress" disabled>
                        </div>
                        <div class="col-12">
                            <label for="cours_name" class="form-label">File name</label>
                            <input type="text" value="{{ $cour->cours_name }}" class="form-control"
                                id="cours_name" disabled>
                        </div>
                        <div class="col-12">
                            <a href="{{ asset($cour->cours_body) }}" class="btn btn-primary w-100"
                                target="_blank">Open PDF</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- ?END MODAL SHOW --}}
    {{-- *MODAL UPDATE COURSE --}}
    {{-- <div class="modal modal-lg fade" id="updateModal{{ $cour->id }}" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update course</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('cours.add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <label for="filiere" class="form-label">Filiere</label>
                                <select class="form-select" name="filiere" aria-label="Default select example">
                                    <option value="">Choose</option>
                                    <option value="Genie informatique">Génie informatique</option>
                                    <option value="Genie elecctrique">Génie électrique</option>
                                    <option value="Genie mecanique">Génie mécanique</option>
                                    <option value="Genie industrielle">Génie industrielle</option>
                                </select>
                                @error('filiere')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="module" class="form-label">Module</label>
                                <select class="form-select" name="module" id="module"
                                    aria-label="Default select example">
                                    <option value="">Choose</option>
                                    <option value="Java">Java</option>
                                    <option value="Python">Python</option>
                                    <option value="Laravel">Laravel</option>
                                    <option value="HTML">HTML</option>
                                    <option value="CSS">CSS</option>
                                    <option value="MySQl">MySQl</option>
                                    <option value="Langage C">Langage C</option>
                                </select>
                                @error('module')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="semestre" class="form-label">Semestre</label>
                                <select class="form-select" name="semestre" id="semestre"
                                    aria-label="Default select example">
                                    <option value="">Choose</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                    <option value="S4">S4</option>
                                </select>
                                @error('semestre')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-2 ">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="cours_name" class="form-label">File name</label>
                                    <input class="form-control" name="cours_name" type="text" id="cours_name">
                                    @error('cours_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="cours_body" class="form-label">Upload your file</label>
                                    <input class="form-control" name="cours_body" type="file" id="cours_body"
                                        accept=".pdf, .doc, .docx, .xls, .xlsx">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <button class="btn btn-success w-100" type="submit">submit</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div> --}}

    {{-- *END MODAL UPDATE --}}
    {{-- !MODAL DELETE COURSE --}}
    {{-- <div class="modal fade" id="deleteModal{{ $cour->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('cours.destroye', $cour->id) }}" method="POST"
                    enctype="multipart/form-data">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    @method('DELETE')
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">
                            {{ __('Supprimer cours') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <Span aria-hidden="true">&times;</Span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Voulez-vous supprimer le cours
                        <b>{{ $cour->cours_name }}</b>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn gray btn-outline-secondary"
                            data-dismiss="modal">{{ __('Anuller') }}</button>
                        <button type="submit" class="btn gray btn-outline-danger">{{ __('Supprimer') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
    {{-- !END MODAL DELETE --}}
    {{-- !---------------------------- END MODALS COUSRSE ----------------------------! --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
