<div class="modal fade" id="crearMe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header btn-comita text-white">
        <h5 class="modal-title" id="exampleModalLabel">Una vez conversado con el cliente actualiza el precio total de la cotización.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('admin.cotizacion.money','#me') }}" class="was-validated" enctype="multipart/form-data" >
          @csrf
          <input type="hidden" value="{{ $cotizacion->id }}" name="cotizacion_id" >
          <div class="modal-body bg-light">
              <div class="form-group row">
                  <label for="precio" class="col-sm-4 col-form-label text-md-right"><strong></strong>{{ __('Cotización:') }}</strong></label>
                  <div class="col-sm-8">
                      <div class="input-group">
                        <div class="input-group-prepend">
                              <span class="input-group-text">Precio total</span>
                        </div>
                       <input type="number" class="form-control bg-light   @error('precio') is-invalid @enderror" name="precio" value="{{ old('precio') }}"  >
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
