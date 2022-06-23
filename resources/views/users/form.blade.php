<div class="modal fade" id="formUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registro de usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('users.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('Nombre') }}</label>
                        <input type="name"
                               name="name"
                               required autocomplete="name" autofocus
                               class="form-control @error('name') is-invalid @enderror"
                               id="name"
                               value="{{ old('name') }}"
                               aria-describedby="name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Correo electronico') }}</label>
                        <input type="email"
                               name="email"
                               required autocomplete="name" autofocus
                               class="form-control @error('email') is-invalid @enderror"
                               id="email"
                               value="{{ old('email') }}"
                               aria-describedby="emailHelp">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Contraseña') }}</label>
                        <input type="password"
                               name="password"
                               required autocomplete="new-password" autofocus
                               class="form-control @error('password') is-invalid @enderror"
                               id="password"
                               aria-describedby="emailHelp">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">{{ __('Confirmar contraseña') }}</label>
                        <input type="password"
                               name="password_confirmation"
                               required autocomplete="password_confirmation" autofocus
                               class="form-control"
                               id="password_confirmation">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="phone_number" class="form-label">{{ __('Telefono') }}</label>
                        <input type="text"
                               name="phone_number"
                               required autocomplete="phone_number" autofocus
                               class="form-control  @error('phone_number') is-invalid @enderror"
                               id="phone_number-confirm"
                               value="{{ old('phone_number') }}"
                               aria-describedby="emailHelp">
                        @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="role" class="form-label">{{ __('Rol') }}</label>
                        <select required class="form-select  @error('role') is-invalid @enderror" name="role">
                            <option selected>Elija una opción</option>
                            <option value="{{\App\User::USER}}">Usuario estandar</option>
                            <option value="{{ \App\User::ADMIN }}">Administrador</option>
                        </select>
                        @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div>{{ __('Estado') }}</div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status" checked
                                   value="1">
                            <label class="form-check-label @error('status') is-invalid @enderror"
                                   for="status">Activo</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input @error('status') is-invalid @enderror" type="radio"
                                   name="status" id="status"
                                   value="0">
                            <label class="form-check-label" for="status">Inactivo</label>
                        </div>
                        @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="text-end">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


