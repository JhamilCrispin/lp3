@extends('layouts.app')
@section('content')


<!-- featured section starts  -->

<section class="feature" id="featured">

    <h1 class="heading"> <span> Trabajos </span> </h1>

    <div class="row">
        @if(count($detalles)==0)
            -Este trabajo no cuenta con antecedentes
        @else
        @foreach($detalles as $detalle)

            <div class="image-container">

                <div class="big-image">
                    <img src="{{asset($detalle->img)}}" alt="">
                </div>


            </div>

            <div class="content">

                <h3>{{$detalle->titulo}}</h3>
                <h5>{{$detalle->fecha}}</h5>
                @if($detalle->experiencia=='si')
                    <span>{{$detalle->descripcion}}</span>
                @else
                    <span>No tiene experiencia</span>
                @endif
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <span>(50+) {{$detalle->nombre.' '.$detalle->apellido}}</span>
                </div>
                <p>{{$detalle->descripcion}}!!</p>

            </div>

        @endforeach
    </div>
    @endif

</section>
@endsection
