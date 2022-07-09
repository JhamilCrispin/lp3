@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Clientes Registrados') }}
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if(count($usuarios)==0)
                            -no hay citas Registradas
                        @else
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Usuario</th>
                                    <th scope="col">tipo</th>
                                    <th scope="col">email</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @foreach ($usuarios as $usuario)
                                        <td>{{$usuario['id']}}</td>
                                        <td>{{$usuario['nombre']}} {{$usuario['apellido']}}</td>
                                        <td>{{$usuario['tipo']}}</td>
                                        <td>{{$usuario['email']}}</td>
                                        <td>
                                            <button href="" class="btn btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{$usuario->id}}">
                                                <i class="fa-solid fa-wrench"></i></button>

                                            <!-- Modal de Actualizar -->
                                            <div class="modal fade" id="editModal{{$usuario->id}}" tabindex="-1"
                                                 aria-labelledby="editModal" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Actualizar
                                                                Cliente</h5>
                                                            <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <label class="col-md-4 col-form-label text-md-end"></label>
                                                        <form method="POST" action="{{ route('administrador.actualizar',$usuario->id) }}">
                                                            @csrf @method('PUT')

                                                                <div class="row mb-3">
                                                                    <label for="tipo"
                                                                           class="col-md-4 col-form-label text-md-end">{{ __('tipo') }}</label>

                                                                    <div class="col-md-6">
                                                                        <select name="tipo" class="form-select" aria-label=".form-select-sm example">
                                                                            <option selected>Seleccionar tipo</option>
                                                                            <option value="administrador">empresa</option>
                                                                            <option value="empleado">empleado</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            <div class="row mb-3">
                                                                <label for="empresa"
                                                                       class="col-md-4 col-form-label text-md-end">{{ __('empresa') }}</label>

                                                                <div class="col-md-6">
                                                                    <input id="empresa" type="empresa"
                                                                           class="form-control @error('empresa') is-invalid @enderror"
                                                                           name="empresa" value="" required
                                                                           autocomplete="name" autofocus>

                                                                    @error('dni')
                                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                                    @enderror
                                                                </div>


                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                <button type="submit" class="btn btn-primary" value="Guardar">
                                                                    {{ __('Actualizar') }}
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        </th>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

