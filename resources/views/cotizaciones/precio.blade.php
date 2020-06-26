<div class="modal fade" id="crearMe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header btn-comita text-white">
        <h5 class="modal-title" id="exampleModalLabel">
            <ul style="color: cyan;">
              <li>1) Concuerde mediante los mensajes el precio.</li>
              <li>3) Establesca el precio total de la cotización.</li>
              <li>2) Concuerde la fecha de entrega.</li>
            </ul>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('admin.cotizacion.money','#me') }}" class="was-validated" enctype="multipart/form-data" >
          @csrf
          <input type="hidden" value="{{ $cotizacion->id }}" name="cotizacion_id" >
          <div class="modal-body bg-light">
              <div class="form-group row">
                  <label for="precio" class="col-sm-6 col-form-label text-md-right"><strong>{{ __('Precio total de la cotización:') }}</strong></label>
                  <div class="col-sm-6">
                      <div class="input-group">
                       <input type="number" class="form-control bg-light   @error('precio') is-invalid @enderror" name="precio" value="{{ old('precio',$cotizacion->precio) }}" min="0" required>
                        <div class="input-group-prepend">
                              <span class="input-group-text">Bs.</span>
                        </div>
                      @error('precio')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                      </div>
                  </div>
              </div>
              <hr class="mt-0 mb-3">
              <div class="form-group row">
                  <label for="fecha" class="col-sm-6 col-form-label text-md-right"><strong>{{ __('Fecha de entrega de la cotización:') }}</strong></label>
                  <div class="col-sm-6">
                      <div class="input-group">
                       <input type="date" class="form-control bg-light   @error('fecha') is-invalid @enderror" name="fecha" value="{{ old('fecha',$cotizacion->fecha) }}" required>
                      @error('fecha')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                      </div>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
              <button class="btn   btn-comita text-white " type="submit" >
                ENVIAR
              </button>
              <a href="{{ route('admin.cotizaciones.index') }}" class="btn   btn-outline-comita "  >
                CANCELAR
              </a>
          </div>
      </form>
    </div>
  </div>
</div>
