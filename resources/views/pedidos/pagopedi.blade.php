<div class="modal fade" id="pedidoPago" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header btn-comita text-white">
        <h5 class="modal-title" id="exampleModalLabel">
            <h2 style="color: cyan;" class="text-center">
              Envia una imagen del depósito bancario
            </h2>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('admin.pedidos.pagar','#pepa') }}" class="was-validated" enctype="multipart/form-data" >
          @csrf
          <div class="modal-body bg-light">
            <input type="hidden" id="pedido_id" name="pedido_id" >
            <input type="hidden" id="pedido_tipo" name="pedido_tipo" >
              <div class="form-group row">
                  <label for="codigo" class="col-sm-5 col-form-label text-md-right"><strong>{{ __('Código del pedido:') }}</strong></label>
                  <div class="col-sm-7">
                      <div class="input-group">
                          <input type="text" class="form-control bg-light border-0" name="codigo" id="pedido_codigo" readonly >
                      </div>
                  </div>
              </div>
              <hr class="mt-0 mb-3">
              <div class="form-group row">
                  <label for="monto" class="col-sm-5 col-form-label text-md-right"><strong>{{ __('Monto:') }}</strong></label>
                  <div class="col-sm-7">
                      <div class="input-group">
                         <input type="number" class="form-control bg-light   @error('monto') is-invalid @enderror" name="monto" value="{{ old('monto') }}" min="0" required >
                          <div class="input-group-prepend">
                                <span class="input-group-text">Bs.</span>
                          </div>
                          @error('monto')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>
              </div>
              <hr class="mt-0 mb-3">
              <div class="form-group row">
                  <label for="descripcion" class="col-sm-5 col-form-label text-md-right"><strong>{{ __('¿Algúna descipción?:') }}</strong></label>
                  <div class="col-sm-7">
                      <div class="input-group">
                          <textarea class="form-control {{ $errors->has('descripcion') ? ' is-invalid' : 'border-1' }}" rows="2" name="descripcion"  placeholder="Ingrese alguna descripción, si desea." >{{ old('descripcion') }}</textarea>
                          @error('descripcion')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>
              </div>
              <hr class="mt-0 mb-3">
              <div class="form-group row">
                  <label for="imagen" class="col-sm-5 col-form-label text-md-right"><strong>{{ __('Foto del depósito:') }}</strong></label>
                  <div class="col-sm-7">
                      <div class="input-group">
                          <div class="custom-file mb-3">
                            <input type="file" name="imagen" class="custom-file-input" id="validatedCustomFile" required >
                            <label class="custom-file-label" for="validatedCustomFile">Elija una imagen</label>
                            @error('imagen')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
              <button class="btn btn-comita text-white " type="submit" >
                ENVIAR
              </button>
              <a href=" " class="btn   btn-outline-comita "  >
                CANCELAR
              </a>
          </div>
      </form>
    </div>
  </div>
</div>
