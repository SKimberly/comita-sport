<div class="modal fade" id="resPago" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header btn-comita text-white">
        <h5 class="modal-title" id="exampleModalLabel">
            <h2 style="color: cyan;" class="text-center">
              Respuesta de la imagen de pago
            </h2>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <div class="modal-body bg-light">
              <div class="form-group row">
                  <label for="codigo" class="col-sm-4 col-form-label text-md-right"><strong>{{ __('Respuesta:') }}</strong></label>
                  <div class="col-sm-8">
                      <div class="input-group">
                          <textarea rows="2" class="form-control bg-light border-0"  name="respuesta_id" id="respuesta_id" readonly > </textarea>
                      </div>
                  </div>
              </div>
        	</div>
          <div class="modal-footer">
              <a href=" " class="btn   btn-outline-comita "  >
                ACEPTAR
              </a>
          </div>
      </form>
    </div>
  </div>
</div>
