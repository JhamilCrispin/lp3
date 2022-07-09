
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
                <li><a href="#featured">Empresas</a></li>
                <li><a href="{{route('trabajos.ver')}}">Trabajos</a></li>
                <li><a href="#deal">Otros</a></li>
            </ul>
        </nav>

        <div class="icons">
            <a href="#" class="fas fa-heart"></a>
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

<!-- featured section starts  -->

<section class="feature" id="featured">

    <h1 class="heading"> <span> Trabajos </span> </h1>

    <div class="row">
@foreach($trabajador as $trabajo)
        <div class="image-container">

            <div class="big-image">
                <img src="{{asset($trabajo->img)}}" alt="">
            </div>

            <div class="small-image">
                <img class="image-active" src="{{asset($trabajo->img)}}" alt="">
                <img src="{{asset($trabajo->img)}}" alt="">
                <img src="{{asset($trabajo->img)}}" alt="">
                <img src="{{asset($trabajo->img)}}" alt="">
            </div>

        </div>

        <div class="content">

            <h3>{{$trabajo->trabajo}}</h3>
            @if($trabajo->experiencia=='si')
            <span>Tiene experiencia</span>
            @else
                <span>No tiene experiencia</span>
            @endif
                <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <span>(50+) {{$trabajo->nombre.' '.$trabajo->apellido}}</span>
            </div>
            <p>{{$trabajo->descripcion}}!!</p>
            <p>Email de contacto: {{$trabajo->email}}</p>
            <strong class="price">S./{{$trabajo->precio}}<span>{{$trabajo->precio*2}}</span> </strong>
            <a href="mailto:{{$trabajo->email}}"><button class="btn">Contactar</button></a>
            <a href="{{route('detalles.mostrar',$trabajo->id)}}"><button class="btn">Detalles</button></a>
            <a href="{{route('detalles.mostrar',$trabajo->id)}}"><button class="btn">Detalles</button></a>

        </div>


            <!-- Modal de Sintomas -->
            <div class="modal fade" id="sintomaModal{{$trabajo->id}}" tabindex="-1" aria-labelledby="sintomaModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Agregar nueva mascota</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <label class="col-md-4 col-form-label text-md-end"></label>
                        <form method="POST" action="/detalles/{{$trabajo->id}}">
                            @csrf
                            <div class="row mb-3">
                                <label for="titulo" class="col-md-4 col-form-label text-md-end">{{ __('Titulo de la publicacion') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror" value="{{old('titulo')}}" ><br>
                                    @error('titulo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <label for="descripcion" class="col-md-4 col-form-label text-md-end">{{ __('descripcion') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="descripcion" class="form-control @error('detalles') is-invalid @enderror" value="{{old('descripcion')}}" ><br>
                                    @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="submit" class="btn btn-primary" value="Guardar">
                                    {{ __('Publicar') }}
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!-- Cierre modal siontoma -->
        @endforeach
    </div>

</section>

<!-- featured section ends -->

<!-- newsletter section starts  -->
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
