<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HuanuCorked</title>
    <!--=============== BOXICONS ===============-->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- owl carousel css file cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <!-- custom css file link  -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- custom java modal-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</head>
<body>

<!-- header section starts  -->

<header>

    <div class="header-1">

        <a href="#" class="logo"> <i class="fas fa-shopping-bag"></i>  HuanuCorked </a>

        <div class="form-container">
            <form action="">
                <input type="search" placeholder="Buscar Trabajador" id="search" />
                <label for="search" class="fas fa-search"></label>
            </form>
        </div>

    </div>

    <div class="header-2">

        <div id="menu" class="fas fa-bars"></div>

        <nav class="navbar">
            <ul>
                <li><a class="active" href="{{route('home')}}">Inicio</a></li>
                <li><a href=""></a></li>
                @if(Auth::user()->tipo =='empresa')
                <li><a href="{{route('administrador.mostrar')}}">Contratar Personal</a></li>
                @endif
                <li><a href="{{route('trabajos.ver')}}">Trabajos</a></li>
                <li><a href="#deal">Otros</a></li>
            </ul>
        </nav>

        <div class="icons">
            <h3 for="search" class="">{{Auth::user()->tipo}}</h3>
            <a href="#" class="fas fa-shopping-cart"></a>
            <a class="nav__link" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                <i class='bx bxs-log-out-circle' ></i> <span class="nav__name"></span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

        </div>

    </div>

</header>

<!-- Contenido -->

@yield('content')

<!-- Contenido end  -->

<section class="newsletter">

    <h1>Notificaciones en tu correo</h1>
    <p>Introdusca su correo</p>
    <form action="">
        <input type="email" placeholder="enter your email">
        <input type="submit" class="btn">
    </form>

</section>

<section class="footer">

    <div class="box-container">

        <div class="box">
            <a href="#" class="logo"> <i class="fas fa-shopping-bag"></i>  HuanuCorked </a>
            <p>Una página diseñada para sus necesidades laborales con la finalidad de dar oportunidades para todos los que deseen publicar en nuestra plataforma.</p>
        </div>

        <div class="box">
            <h3>links</h3>
            <a href="/home">inicio</a>
            <a href="">Trabajos</a>
            <a href="#">Empresas</a>
            <a href="#">Tipos</a>
            <a href="#">Otros</a>
        </div>

        <div class="box">
            <h3>contact us</h3>
            <p> <i class="fas fa-home"></i>
                mumbai, maharashtra,
                india - 400104
            </p>
            <p> <i class="fas fa-phone"></i>
                +910000000
            </p>
            <p> <i class="fas fa-globe"></i>
                xyz@yoursite.com
            </p>
        </div>

    </div>

    <h1 class="credit"> created by <span>mr. web designer</span> | all rights reserved. </h1>

</section>
<!-- footer section ends -->


<!-- jquery cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- owl carousel js file cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<!-- custom js file link  -->
<script src="{{ asset('js/base.js') }}"></script>

</body>
</html>
