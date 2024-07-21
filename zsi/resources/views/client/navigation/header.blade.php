<header class="header position-relative z-9">
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-dark navbar-theme-primary fixed-top headroom">
        <div class="container position-relative">
            <a class="navbar-brand mr-lg-3" href="">
                <img class="navbar-brand-dark" src="" alt="">
                <img class="navbar-brand-light" src="" alt="">
            </a>
            <div class="navbar-collapse collapse" id="navbar-default-primary">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="#">
                                <img src="" alt="menuimage">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <i class="fas fa-times" data-toggle="collapse" role="button"
                               data-target="#navbar-default-primary" aria-controls="navbar-default-primary"
                               aria-expanded="false" aria-label="Toggle navigation"></i>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav navbar-nav-hover ml-auto">
                    <li class="nav-item dropdown">
                        <a href="{{ route('/') }}" class="nav-link">
                            <span class="nav-link-inner-text">Home</span>
                        </a>

                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" data-toggle="dropdown" role="button">
                            <span class="nav-link-inner-text">About Us </span>
                            <i class="fas fa-angle-down nav-link-arrow ml-1"></i>
                        </a>
                        <ul class="dropdown-menu">

                            <li><a class="dropdown-item" href="{{route('/about/overview/')}}">Overview</a></li>
                            <li><a class="dropdown-item" href="{{ route('/events/') }}">Events</a></li>

                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('/courses/') }}">Courses & Training</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <span class="nav-link-inner-text">Publications</span>
                            <i class="fas fa-angle-down nav-link-arrow ml-1"></i>
                        </a>
                        <ul class="sub-menu dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('/articles/') }}">Articles</a></li>
                            <li><a class="dropdown-item" href="">Resources</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="">Membership</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('/contact/') }}">Contact Us</a></li>
                </ul>
            </div>
            <div class="d-flex align-items-center">
                <button class="navbar-toggler ml-2" type="button" data-toggle="collapse" data-target="#navbar-default-primary" aria-controls="navbar-default-primary" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </nav>
</header>
