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


    {{-- <script>
        $(document).ready(function() {
            $('#addStudentModal').modal('show');
        });
    </script> --}}

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
                            <div class="fw-bold"><a href="{{ route('prof') }}" style="text-decoration: none;">Cours</a>
                            </div>
                        </div>
                        <span class="badge bg-primary rounded-pill">0</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start ms-5">
                        <div class="ms-2 me-2">
                            <div class="fw-bold"><a href="{{ route('students.index') }}" style="text-decoration: none;">
                                    Student</a></div>

                        </div>
                        <span class="badge bg-primary rounded-pill">{{ count($users) }}</span>
                    </li>
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

    {{-- !TABLE STUDENT --}}
    <div class="my-5 ms-5 me-5">
        <button type="button" class="btn btn-outline-success mb-1" data-bs-toggle="modal"
            data-bs-target="#addStudentModal">
            <i class="fa-solid fa-plus"></i> Add student
        </button>
        <table id="example" class="table table-hover table-bordered text-center table-responsive">
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
                            <a class="btn btn-success" href="#"><i class="fa-solid fa-eye"></i></a>
                            <button type="button" class="btn btn-warning text-light" data-bs-toggle="modal"
                                data-bs-target="#"><i class="fa-solid fa-pen"></i></button>
                            <button type="button" class="btn btn-danger text-light" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $user->id }}"><i
                                    class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                    <div class="modal fade" id="deleteModal{{ $user->id }}" data-bs-backdrop="static"
                        tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true" data-bs-keyboard="false">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="{{ route('etudiant.destroye', $user->id) }}" method="POST"
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
                                        Voulez-vous supprimer l'etudiant
                                        <b>{{ $user->first_name }} {{ $user->lastname }}</b>?
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
                        <div class="col-md-6">
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
                        </div>
                        <div class="col-md-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="modal-footer">
                            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- !END MODAL ADD STUDENT --}}
    {{-- ?---------------------------- END MODAL STUDENT ---------------------------? --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
