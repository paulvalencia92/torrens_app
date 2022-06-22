@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
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
