<div class="modal fade" id="formTaskModal" tabindex="-1" aria-labelledby="formTaskModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Registro de tareas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('tasks.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">{{ __('Titulo') }}</label>
                        <input type="text"
                               name="title"
                               id="title"
                               required autocomplete="name" autofocus
                               class="form-control @error('title') is-invalid @enderror"
                               value="{{ old('title') }}"
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
                                  id="description"
                                  name="description"
                                  rows="3">
                        </textarea>
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


