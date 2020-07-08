<div class="modal fade" id="pagarDeuda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header btn-comita text-white">
        <h5 class="modal-title" id="exampleModalLabel">
            <ul style="color: cyan;">
              <li>1) Registre el pago del pedido.</li>
            </ul>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('admin.ventas.carripago','#vego') }}" class="was-validated" enctype="multipart/form-data" >
          @csrf

          <div class="modal-body bg-light">
            <input type="hidden" name="carrito_id" id="carrito_id">
              <div class="form-group row">
                  <label for="anticipo" class="col-sm-6 col-form-label text-md-right"><strong>{{ __('Registrar pago del pedido:') }}</strong></label>
                  <div class="col-sm-6">
                      <div class="input-group">
                       <input type="number" class="form-control bg-light" name="pago" required >
                        <div class="input-group-prepend">
                              <span class="input-group-text">Bs.</span>
                        </div>
                      </div>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="fecha" class="col-sm-6 col-form-label text-md-right"><strong>{{ __('Fecha de entrega:') }}</strong></label>
                  <div class="col-sm-6">
                      <div class="input-group">
                       <input type="text" class="form-control bg-light border-0" name="fecha" id="fecha" readonly>
                      </div>
                  </div>
              </div>
              <div class="form-group row">
                    <label for="fecha_entrega" class="col-sm-6 col-form-label text-md-right"><strong>{{ __('¿Cambiar fecha de entrega?') }}</strong></label>
                    <div class="col-sm-6">
                        <div class="input-group">
                         <input type="date" class="form-control bg-light" name="fecha_entrega">
                        </div>
                    </div>
              </div>

          </div>
          <div class="modal-footer">
              <button class="btn btn-comita text-white " type="submit" >
                REGISTRAR PAGO
              </button>
              <a href=" " class="btn   btn-outline-comita "  >
                CANCELAR
              </a>
          </div>
      </form>
    </div>
  </div>
</div>
