<div class="modal fade" id="crearCo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header btn-comita text-white">
        <h5 class="modal-title" id="exampleModalLabel">Crear nueva cotización</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('admin.cotizaciones.store','#co') }}" class="bg-white shadow rounded py-3 px-4 was-validated" enctype="multipart/form-data" >
          @csrf
          <div class="modal-body">
              <div class="form-group row">
                  <label for="email" class="col-sm-5 col-form-label text-md-right"><strong>{{ __('Nombre de la cotización:') }}</strong></label>
                  <div class="col-sm-7">
                      <input type="text" class="form-control bg-light   @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}"  autocomplete="nombre" autofocus placeholder="Nombre de la cotización" >

                      @error('nombre')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
          </div>
          <div class="modal-footer">
              <button class="btn   btn-comita text-white " type="submit" >
                CREAR
              </button>
              <a href="{{ route('admin.cotizaciones.index') }}" class="btn   btn-outline-comita "  >
                CANCELAR
              </a>
          </div>
      </form>
    </div>
  </div>
</div>
