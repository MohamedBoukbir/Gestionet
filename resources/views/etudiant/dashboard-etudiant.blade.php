<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ETUDIANT</title>

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
            <a class="navbar-brand text-primary fw-bold" href="#">Liste des cours</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav active" aria-current="true">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-2">
                            <div class="fw-bold"><a href="" style="text-decoration: none;">Cours</a></div>
                        </div>
                        <span class="badge bg-primary rounded-pill">{{ count($cours) }}</span>
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

    <div class="my-5 ms-5 me-5">
        <table id="example" class="table table-hover table-bordered text-center table-responsive">
            <thead class="table table-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Semestre</th>
                    <th scope="col">Filiere</th>
                    <th scope="col">Module</th>
                    <th scope="col">Course name</th>
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
                        <td>
                            <a href="{{ route('increment-lecture', ['cours' => $cour->id]) }}" class="btn btn-primary"
                                target="_blank"><i class="fa-solid fa-download"></i></a>

                            <a class="btn btn-success"
                                href="{{ route('etudiant.comment', ['cours_id' => $cour->id]) }}"><i
                                    class="fa-solid fa-comment"></i></a>
                            {{-- <a class="btn btn-success" href="#"><i class="fa-solid fa-comment"></i></a> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- ?COMMENTS --}}
    <h4 class="text-primary m-3 fw-bold "
        style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Comments</h4>
    @if (count($comments) > 0)
        <form id="myForm" method="POST" action="{{ route('comment') }}" class="p-4">
            @csrf
            @foreach ($comments as $comment)
                <div class="testimonial-item bg-light rounded p-3 mt-1">
                    <div class="d-flex align-items-center">
                        <div class="w-100">
                            <h5 class="mb-1 fw-bold " style="font-family: serif;">
                                {{ $comment->lastname . ' ' . $comment->first_name }}</h5>
                            <small class="ms-2 text-secondary"
                                style="font-family: sans-serif;">{{ $comment->comment_body }}</small>
                            <span class="d-flex justify-content-end text-secondary"
                                style="font-family: serif;">{{ \Carbon\Carbon::parse($comment->created_at)->format('M-d-Y') }}
                                at {{ \Carbon\Carbon::parse($comment->created_at)->format('H:i ') }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="form-floating" style="display: flex; align-items: end;">
                <textarea class="form-control mt-2" name="comment_body" placeholder="Leave a comment here" id="floatingTextarea2"
                    style="height: 100px"></textarea>
                <button type="submit" class="btn btn-success ms-1" style="height: 100px"><i
                        class="fa-solid fa-paper-plane"></i></button>
                <label for="floatingTextarea2">Add comment </label>
            </div>
        </form>
    @else
        <div style="display: flex; justify-content: center;">
            <p class="text text-secondary">no comments yet</p>
        </div>
        <form id="myForm" method="POST" action="{{ route('comment') }}" class="p-4">
            @csrf
            <div class="form-floating" style="display: flex; align-items: end;">
                <textarea class="form-control mt-2" name="comment_body" placeholder="Leave a comment here" id="floatingTextarea2"
                    style="height: 100px"></textarea>
                <button type="submit" class="btn btn-success ms-1" style="height: 100px"><i
                        class="fa-solid fa-paper-plane"></i></button>
                <label for="floatingTextarea2">Add comment </label>
            </div>
        </form>
    @endif
    <script>
        const textarea = document.getElementById('floatingTextarea2');
        const form = document.getElementById('myForm');
        textarea.addEventListener('keydown', function(event) {
            if (event.key === 'Enter' && !event.shiftKey) {
                event.preventDefault(); // Prevent line break
                form.submit(); // Submit the form
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
