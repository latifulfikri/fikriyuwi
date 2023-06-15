<nav class="navbar navbar-expand-lg bg-theme fixed-top">
    <div class="container">
        <a class="navbar-brand link-theme" href="#"><span class="text-heading"><img src="{{ url('assets/img/logo.png') }}" alt=""> FIKRIYUWI</span></a>
        <button class="navbar-toggler border-0 rounded-circle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-ellipsis-vertical text-highlight"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item mx-md-4">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item mx-md-4">
                    <a class="nav-link" href="#experience">Experience</a>
                </li>
                <li class="nav-item mx-md-4">
                    <a class="nav-link" href="#portfolio">Portfolio</a>
                </li>
                <li class="nav-item mx-md-4">
                    <a class="nav-link" href="#reachme">Reach Me</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <a href="{{ $contacts[0]->contact_link }}" target="_blank" class="link link-theme me-4"><i class="fw-bolder {{ $contacts[0]->contact_icon }}"></i></a>
                <a href="{{ $contacts[1]->contact_link }}" target="_blank" class="link link-theme"><i class="fw-bolder {{ $contacts[1]->contact_icon }}"></i></a>
            </form>
        </div>
    </div>
</nav>
