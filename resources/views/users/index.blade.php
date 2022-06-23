@extends('layouts.app')

@section('content')
    <div class="container">

        <h2>Lista de usuarios</h2>
        <hr>
        <div class="row justify-content-center">

            @component('components.alert-component')@endcomponent

            @admin
            <div class="col-md-12 text-end mb-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formUserModal">
                    Crear usuario
                </button>
            </div>
            @endadmin

            @include('users.form')


            <table class="table table-striped table-hover table-bordered">
                <thead>
                <tr>
                    <th scope="col">Nombre completo</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Email</th>
                    <th scope="col">Estado</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->phone_number }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <button class="btn btn-{{ $user->status ? 'outline-success' : 'outline-danger' }}">
                                {{ $user->status ? 'Activo' : 'Inactivo' }}
                            </button>
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
        const myModal = new bootstrap.Modal(document.getElementById('formUserModal'))
        myModal.show()
        @endif
    </script>
@endpush
