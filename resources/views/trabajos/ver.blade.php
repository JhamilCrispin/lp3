@extends('layouts.app')
@section('content')
<!-- arrival section starts  -->
<!-- gallery section starts  -->

<section class="gallery" id="gallery">

    <h1 class="heading"> <span> product gallery </span><button type="button" class="btn btn-success pull-right" data-bs-toggle="modal"
                                                               data-bs-target="#insertModal">Agregar
        </button> </h1>

    <ul class="controls">
        <li class="btn button-active" data-filter="all">all</li>
        <li class="btn" data-filter="pesado">pesado</li>
        <li class="btn" data-filter="hogar">hogar</li>
        <li class="btn" data-filter="cuidado">cuidado</li>
        <li class="btn" data-filter="profesional">profesional</li>
        <li class="btn" data-filter="{{Auth::user()->id}}">Mis trabajos</li>
    </ul>

    <div class="image-container">
        @foreach($trabajos as $trabajo)
        <div class="box {{$trabajo->categoria}}">
            <a href=" {{route('publicacion',$trabajo->id)}}">
            <div class="image">
                <img src="{{asset($trabajo->img)}}" alt="">
            </div></a>
            <div class="info">
                <div class="subInfo">
                    <h3>{{$trabajo->trabajo}}@if(Auth::user()->id==$trabajo->idUsuario)
                            <a type="submit" style="color: #dedddd"
                                    data-bs-toggle="modal" data-bs-target="#deleteModal{{$trabajo->id}}">
                                <i class="fas fa-trash"></i></a>
                        @endif</h3>

                    <strong class="title"><p>{{$trabajo->categoria}}</p></strong>
                    @if(Auth::user()->id==$trabajo->idUsuario)
                        <button href="" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#editModal{{$trabajo->id}}">
                            <i class="fas fa-edit"></i></button>
                    @endif
                </div>
                <div class="subInfo">

                    <p>{{$trabajo->descripcion}}</p>
                    <strong class="price"><span>S/.{{$trabajo->precio}}</span> </strong>
                    @if($trabajo->experiencia=='no')
                        <p>{{'No cuenta con experiencia'}}</p>
                    @else
                        @if($trabajo->precio=='100')
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half"></i>
                            </div>
                        @elseif($trabajo->precio=='200')
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half"></i>
                            </div>
                        @elseif($trabajo->precio>='300')
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half"></i>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
            <div class="modal fade" id="editModal{{$trabajo->id}}" tabindex="-1"
                 aria-labelledby="editModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Actualizar
                                Trabajo</h5>
                            <button type="button" class="btn-close"
                                    data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <img src="{{asset($trabajo->img)}}" alt="">
                        <label class="col-md-4 col-form-label text-md-end"></label>
                        <form method="post" action="{{route('trabajos.actualizar',$trabajo->id)}}" accept-charset="UTF-8" enctype="multipart/form-data">
                            {{csrf_field()}} @method('PUT')
                            <div class="row mb-3">
                                <label for="trabajo" class="col-md-4 col-form-label text-md-end">{{ __('Nombre de trabajo') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="trabajo" class="form-control @error('trabajo') is-invalid @enderror" value="{{$trabajo->trabajo}}" placeholder="Ingrese Nombre"><br>
                                    @error('trabajo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <label for="descripcion" class="col-md-4 col-form-label text-md-end">{{ __('descripcion') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{$trabajo->descripcion}}" placeholder="Ingrese Descripcion"><br>
                                    @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <label for="experiencia" class="col-md-4 col-form-label text-md-end">{{ __('experiencia') }}</label>
                                <div class="col-md-6">
                                    <select name="experiencia" class="form-control" aria-label=".form-select-sm example">
                                        <option value="si">si</option>
                                        <option value="no">no</option>
                                    </select>
                                    <label for="categoria" class="col-md-4 col-form-label text-md-end">{{ __('') }}</label>
                                </div>

                                <label for="precio" class="col-md-4 col-form-label text-md-end">{{ __('precio') }}</label>
                                <div class="col-md-6">
                                    <input type="number" name="precio" class="form-control @error('precio') is-invalid @enderror" value="{{$trabajo->precio}}" placeholder="Cuanto desea ganar?"><br>
                                    @error('precio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <label for="precio" class="col-md-4 col-form-label text-md-end">{{ __('Imagen') }}</label>
                                <div class="col-md-6">
                                    <input type="file" name="img" class="form-control @error('img') is-invalid @enderror" value="{{$trabajo->img}}" ><br>
                                    @error('img')
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

            <!-- Modal de Eliminar -->
            <div class="modal fade" id="deleteModal{{$trabajo->id}}" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModal">Eliminar Registro</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <p>¿Estas seguro de eliminar?</p>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cerrar</button>

                            <form id="formDelete" action="{{route('trabajos.destroy',$trabajo->id)}}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

<!-- gallery section ends -->
    <!-- Modal de Insertar -->
    <div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="insertModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo Trabajo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <label class="col-md-4 col-form-label text-md-end"></label>
                <form method="post" action="{{route('trabajos.guardar')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row mb-3">
                        <label for="trabajo" class="col-md-4 col-form-label text-md-end">{{ __('trabajo') }}</label>
                        <div class="col-md-6">
                            <input type="text" name="trabajo" class="form-control @error('trabajo') is-invalid @enderror" value="{{old('trabajo')}}" placeholder="Ingrese trabajo"><br>
                            @error('trabajo')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <label for="descripcion" class="col-md-4 col-form-label text-md-end">{{ __('descripcion') }}</label>
                        <div class="col-md-6">
                            <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{old('descripcion')}}" placeholder="Ingrese Descripcion"><br>
                            @error('descripcion')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <label for="experiencia" class="col-md-4 col-form-label text-md-end">{{ __('experiencia') }}</label>
                        <div class="col-md-6">
                            <select name="experiencia" class="form-control" aria-label=".form-select-sm example">
                                <option value="si">si</option>
                                <option value="no">no</option>
                            </select>
                            <label for="categoria" class="col-md-4 col-form-label text-md-end">{{ __('') }}</label>
                        </div>
                        <label for="categoria" class="col-md-4 col-form-label text-md-end">{{ __('categoria') }}</label>
                        <div class="col-md-6">
                            <select name="categoria" class="form-control" aria-label=".form-select-sm example">
                                <option selected>Seleccionar tipo</option>
                                <option value="pesado">pesado</option>
                                <option value="hogar">hogar</option>
                                <option value="cuidado">cuidado</option>
                                <option value="profesional">profesional</option>
                            </select>
                            <label for="categoria" class="col-md-4 col-form-label text-md-end">{{ __('') }}</label>
                        </div>

                        <label for="precio" class="col-md-4 col-form-label text-md-end">{{ __('precio') }}</label>
                        <div class="col-md-6">
                            <input type="number" name="precio" class="form-control @error('precio') is-invalid @enderror" value="{{old('precio')}}" placeholder="Cuanto desea ganar?"><br>
                            @error('precio')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <label for="img" class="col-md-4 col-form-label text-md-end">{{ __('IMG') }}</label>
                        <div class="col-md-6">
                            <input type="file" name="img" class="form-control @error('img') is-invalid @enderror" value="{{old('img')}}" placeholder=""><br>
                            @error('img')
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


@endsection
