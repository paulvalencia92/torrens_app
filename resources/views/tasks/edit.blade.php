@extends('layouts.app')

@section('content')
    <div class="container">

        <h2>Actualizar tarea</h2>
        <hr>
        <div class="row justify-content-center">

            {{--            <div class="col-md-12 text-end mb-4">--}}
            {{--                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formTaskModal">--}}
            {{--                    Crear tarea--}}
            {{--                </button>--}}
            {{--            </div>--}}

            <form method="POST" action="{{ route('tasks.update',$task) }}">

                @csrf
                @method("PUT")

                <div class="mb-3">
                    <label for="title" class="form-label">{{ __('Titulo') }}</label>
                    <input type="text"
                           name="title"
                           id="title"
                           required autocomplete="name" autofocus
                           class="form-control @error('title') is-invalid @enderror"
                           value="{{ old('name', $task->title) }}"
                           aria-describedby="title">
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="description" class="form-label">Descripción</label>
                    <textarea class="form-control  @error('description') is-invalid @enderror"
                              value="{{ old('description', $task->description) }}"
                              id="description"
                              name="description"
                              rows="3">
                        </textarea>
                </div>


                <div class="text-end">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Actualizar cambios</button>
                </div>

            </form>


        </div>
    </div>

@endsection






























