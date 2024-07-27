<header class="header sticky-bar">
    <div class="container background-body">
        <div class="main-header">
            <div class="header-left">
                <div class="header-logo">
                    <a class='d-flex' href='{{ url('/') }}'>
                        <img class="light-mode" alt="Venue" src="{{ asset('assets/imgs/template/logo.svg') }}" style="height: 30px;" />
                    </a>
                </div>
                <div class="header-nav">
                    <nav class="nav-main-menu">
                        <ul class="main-menu">
                            <li><a href='{{ url('/') }}'>Home</a></li>
                            <li><a href='{{ url('/') }}'>Venue</a></li>
                            <li><a href='contact.html'>Api Doc</a></li>
                            <li><a href='https://meusamhosseini.ir'>About Us</a></li>
                            <li><a href='tel::09100433256'>Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="header-right">
                <div class="d-none d-xxl-inline-block align-middle mr-15">
                    <a class="btn btn-default btn-signin" href="#">Signin</a>
                </div>
            </div>
        </div>
    </div>
</header>