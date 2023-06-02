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
</head>

<body>
    {{-- !START NAVBAR --}}
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">GESTION DES ETUDIANTS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Liste des etudiants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Liste des documents</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Profile</a>
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
                                                this.closest('form').submit();">
                                <i class="fa-solid fa-right-from-bracket"></i> {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </li>


                </ul>
            </div>
        </div>
    </nav>
    {{-- !END NAVBAR --}}


    {{-- !TABLE --}}

    <div class="my-5 ms-5 me-5">
        <button type="button" class="btn btn-outline-success mb-1" data-bs-toggle="modal"
            data-bs-target="#exampleModal">
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
                        <td>{{ $user->Class }}</td>
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

    {{-- !END TABLE --}}

    {{-- !MODAL --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <label for="inputEmail4" class="form-label">CIN</label>
                            <input type="text" name="cin" class="form-control" id="inputEmail4">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" name="cne" class="form-label">CNE</label>
                            <input type="text" class="form-control" id="inputPassword4">
                        </div>

                        <div class="col-md-6">
                            <label for="inputPassword4" name="first_name"class="form-label">First name</label>
                            <input type="text" class="form-control" id="inputPassword4">
                        </div>
                        <div class="col-md-6">
                            <label for="inputAddress" name="lastname"class="form-label">Last name</label>
                            <input type="text" class="form-control" id="inputAddress">
                        </div>
                        <div class="col-md-12">
                            <label for="inputAddress" name="lastname"class="form-label">Email</label>
                            <input type="email" class="form-control" id="inputAddress">
                        </div>
                        <div class="col-md-4">
                            <label for="inputState" class="form-label">Class</label>
                            <select id="inputState" name="Class" class="form-select">
                                <option selected>Choose...</option>
                                <option value="s1">S1</option>
                                <option value="s2">S2</option>
                                <option value="s3">S3</option>
                                <option value="s4">S4</option>
                            </select>
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
    {{-- !END MODAL --}}
    PROF
</body>

</html>
