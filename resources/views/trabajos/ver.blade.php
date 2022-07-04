@extends('layouts.app')
@section('content')
<!-- arrival section starts  -->
@if(count($trabajos)==0)
    -no hay Mascotas Registradas
    @endif
<section class="arrival gallery"  id="gallery"><!-- id="arrival"/-->

    <h1 class="heading"> <span>Trabajos <button type="button" class="btn btn-success pull-right" data-bs-toggle="modal" data-bs-target="#insertModal"> <i  class="fas fa-plus-square"></i></button> </span> </h1>
    <ul class="controls">
        <li class="btn button-active" data-filter="all">all</li>
        <li class="btn" data-filter="phone">Pesado</li>
        <li class="btn" data-filter="laptop">Cuidado</li>
        <li class="btn" data-filter="headphone">Hogar</li>
        <li class="btn" data-filter="shoes">Especializado</li>
    </ul>
    <div class="box-container">
        @foreach ($trabajos as $trabajo)
        <div class="box">
            <div class="image">
                <img src="images/arr-img1.png" alt="">
            </div>
            <div class="info">
                <h3>{{$trabajo['nombre']}}</h3>
                <p>{{$trabajo['descripcion']}}</p>
                <div class="subInfo">
                    @if($trabajo['experiencia']=="si")
                    <strong class="price"> {{$trabajo['experiencia']}} Experiencia <span></span> </strong>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half"></i>
                        </div>
                    @else
                        <strong class="price">  <span>experiencia: {{$trabajo['experiencia']}} </span> </strong>
                    @endif

                </div>
            </div>
            <div class="overlay">
                <a href="#" style="--i:1;" class="fas fa-heart"></a>
                <a href="#" style="--i:2;" class="fas fa-shopping-cart"></a>
                <a href="#" style="--i:3;" class="fas fa-search"></a>
            </div>
        </div>
        @endforeach

    </div>
    <!-- Modal de Insertar -->
    <div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="insertModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo Trabajo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <label class="col-md-4 col-form-label text-md-end"></label>
                <form method="post" action="{{route('trabajos.guardar')}}">
                    @csrf
                    <div class="row mb-3">
                        <label for="nombre" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>
                        <div class="col-md-6">
                            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{old('nombre')}}" placeholder="Ingrese Nombre"><br>
                            @error('nombre')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <label for="descripcion" class="col-md-4 col-form-label text-md-end">{{ __('descripcion') }}</label>
                        <div class="col-md-6">
                            <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{old('descripcion')}}" placeholder="Ingrese tipo"><br>
                            @error('descripcion')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <label for="experiencia" class="col-md-4 col-form-label text-md-end">{{ __('experiencia') }}</label>
                        <div class="col-md-6">
                            <input type="number" name="experiencia" class="form-control @error('experiencia') is-invalid @enderror" value="{{old('experiencia')}}" placeholder="Ingrese Edad"><br>
                            @error('experiencia')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <label for="categoria" class="col-md-4 col-form-label text-md-end">{{ __('categoria') }}</label>
                        <div class="col-md-6">
                            <input type="text" name="categoria" class="form-control @error('raza') is-invalid @enderror" value="{{old('categoria')}}" placeholder="Ingrese Raza"><br>
                            @error('categoria')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" value="Guardar">
                            {{ __('Guardar') }}
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    </div>
    <!-- Modal de Insertar -->
</section>

<!-- arrival section ends -->
@endsection
