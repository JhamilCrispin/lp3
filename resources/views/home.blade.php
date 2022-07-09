@extends('layouts.app')

@section('content')

    <!-- home section starts  -->

    <section class="home" id="home">

        <div class="home-slider owl-carousel">

            <div class="item">
                <img src="{{asset('img/cualidades-de-una-enfermera.jpg')}}" alt="">
                <div class="content">
                    <h3>Cuidado de Casa</h3>
                    <p>Personas de confianza para tu hogar.</p>
                    <a href="{{route('trabajos.ver')}}"><button class="btn">Ver</button></a>
                </div>
            </div>
            <div class="item">
                <img src="{{asset('img/VDAYYZEE55EJZMSTBPWGQUF2SQ.jpg')}}" alt="">
                <div class="content">
                    <h3>Trabajos de construccion</h3>
                    <p>Personas de confianza para tu centro laboral.</p>
                    <a href="{{route('trabajos.ver')}}"><button class="btn">Ver</button></a>
                </div>
            </div>
            <div class="item">
                <img src="{{asset('img/Atención-cliente-hotel.jpg')}}" alt="">
                <div class="content">
                    <h3>Atencion de cliente</h3>
                    <p>Las personas más calificadas para tus necesidades</p>
                    <a href="{{route('trabajos.ver')}}"><button class="btn">Ver</button></a>
                </div>
            </div>
            <div class="item">
                <img src="{{asset('img/aptitudes-profesionales.jpg')}}" alt="">
                <div class="content">
                    <h3>Profesionales a tu disposicion</h3>
                    <p>Los mejores profecionales de la region con nosotros.</p>
                    <a href="{{route('trabajos.ver')}}"><button class="btn">Ver</button></a>
                </div>
            </div>




        </div>

    </section>

    <!-- home section ends -->
@endsection
