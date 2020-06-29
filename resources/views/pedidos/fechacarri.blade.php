<div class="modal fade" id="crearFecha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header btn-comita text-white">
        <h5 class="modal-title" id="exampleModalLabel">
            <ul style="color: cyan;">
              <li>1) El anticipo del carrito de compras es opcional.</li>
              <li>2) Registre la fecha de entrega de la venta.</li>
              <li>2) La fecha de entrega es obligatorio.</li>
            </ul>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('admin.pedidos.carrifecha','#cafex') }}" class="was-validated" enctype="multipart/form-data" >
          @csrf

          <div class="modal-body bg-light">
            <input type="hidden" name="carrito_id" id="carrito_id">

              <div class="form-group row">
                  <label for="fecha" class="col-sm-6 col-form-label text-md-right"><strong>{{ __('Fecha de entrega:') }}</strong></label>
                  <div class="col-sm-6">
                      <div class="input-group">
                       <input type="date" class="form-control bg-light   @error('fecha_entrega') is-invalid @enderror" name="fecha_entrega" value="{{ old('fecha_entrega' ) }}"   required >
                      @error('fecha_entrega')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                      </div>
                  </div>
              </div>
              <hr class="mt-0 mb-3">
              <div class="form-group row">
                  <label for="anticipo" class="col-sm-6 col-form-label text-md-right"><strong>{{ __('Anticipo del carrito de compras:') }}</strong></label>
                  <div class="col-sm-6">
                      <div class="input-group">
                       <input type="number" class="form-control bg-light   @error('anticipo') is-invalid @enderror" name="anticipo" value="{{ old('anticipo') }}" min="0"  >
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

          </div>
          <div class="modal-footer">
              <button class="btn btn-comita text-white " type="submit" >
                ENVIAR A VENTAS
              </button>
              <a href=" " class="btn   btn-outline-comita "  >
                CANCELAR
              </a>
          </div>
      </form>
    </div>
  </div>
</div>