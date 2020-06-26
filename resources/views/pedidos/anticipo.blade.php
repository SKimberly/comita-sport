<div class="modal fade" id="crearAnt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header btn-comita text-white">
        <h5 class="modal-title" id="exampleModalLabel">
            <ul style="color: cyan;">
              <li>1) Registre el anticipo de la cotización.</li>
              <li>2) Agregue un descuento si desea.</li>
            </ul>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('admin.pedidos.anticipo','#anti') }}" class="was-validated" enctype="multipart/form-data" >
          @csrf
          <input type="hidden" value="{{ $cotizacion->id }}" name="cotizacion_id" >
          <div class="modal-body bg-light">
              <div class="form-group row">
                  <label for="anticipo" class="col-sm-6 col-form-label text-md-right"><strong>{{ __('Anticipo de la cotización:') }}</strong></label>
                  <div class="col-sm-6">
                      <div class="input-group">
                       <input type="number" class="form-control bg-light   @error('anticipo') is-invalid @enderror" name="anticipo" value="{{ old('anticipo',$cotizacion->anticipo) }}" min="0" required >
                        <div class="input-group-prepend">
                              <span class="input-group-text">Bs.</span>
                        </div>
                      @error('anticipo')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                      </div>
                  </div>
              </div>
              <hr class="mt-0 mb-3">
              <div class="form-group row">
                  <label for="descuento" class="col-sm-6 col-form-label text-md-right"><strong>{{ __('¿Algún descuento?:') }}</strong></label>
                  <div class="col-sm-6">
                      <div class="input-group">
                       <input type="number" class="form-control bg-light   @error('descuento') is-invalid @enderror" name="descuento" value="{{ old('descuento',$cotizacion->descuento) }}" min="0" >
                        <div class="input-group-prepend">
                              <span class="input-group-text">Bs.</span>
                        </div>
                      @error('descuento')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                      </div>
                  </div>
              </div>
        	</div>
          <div class="modal-footer">
              <button class="btn btn-comita text-white " type="submit" >
                AGREGAR ANTICIPO
              </button>
              <a href=" " class="btn   btn-outline-comita "  >
                CANCELAR
              </a>
          </div>
      </form>
    </div>
  </div>
</div>
