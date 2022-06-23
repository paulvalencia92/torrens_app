@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="/css/jConfirm.css"/>
@endpush

@section('content')

    <div class="container">
            <h2>Lista de tareas</h2>
            <hr>
            <div class="row justify-content-center">

                <div class="col-md-12 text-end mb-4">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#formTaskModal">
                        Crear tarea
                    </button>
                </div>

                @include('tasks.form')

                <table class="table table-striped table-hover table-bordered col-12">
                    <thead>
                    <tr>
                        <th scope="col">Titulo</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->user->name }}</td>
                            <td>
                                <a href="{{ route('tasks.edit',$task) }}"
                                   class="btn btn-outline-info btn-sm me-2 d-inline">
                                    Editar
                                </a>
                                <a class="btn btn-outline-danger btn-sm delete-record d-inline"
                                   data-route="{{ route("tasks.destroy", $task) }}" href="#">
                                    {{ __("Eliminar") }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection


@push("js")
    <script>
        @if (count($errors) > 0)
        const myModal = new bootstrap.Modal(document.getElementById('formTaskModal'))
        myModal.show()
        @endif
    </script>
@endpush


