<div class="modal fade" id="verDeta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header btn-comita text-white">
        <h5 class="modal-title" id="exampleModalLabel">Detalle del Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
			<div class="form-group row">
	            <label for="pronom" class="col-sm-4 col-form-label text-md-right"><strong></strong>{{ __('Nombre:') }}</strong></label>
	            <div class="col-sm-8">
	                <input type="text" class="form-control bg-light border-0" id="pronom" name="pronom">
	            </div>
	        </div>
	        <div class="form-group row">
	            <label for="descripcion" class="col-sm-4 col-form-label text-md-right"><strong></strong>{{ __('Descripcion:') }}</strong></label>
	            <div class="col-sm-8">
	            	<textarea class="form-control bg-light border-0" rows="2" id="prodes" name="prodes"></textarea>
	            </div>
	        </div>
	        <div class="form-group row">
	            <label for="prosto" class="col-sm-4 col-form-label text-md-right"><strong></strong>{{ __('Stock:') }}</strong></label>
	            <div class="col-sm-8">
	                <input type="text" class="form-control bg-light border-0" id="prosto" name="prosto">
	            </div>
	        </div>
	        <div class="form-group row">
	            <label for="descripcion" class="col-sm-4 col-form-label text-md-right"><strong></strong>{{ __('Oferta:') }}</strong></label>
	            <div class="col-sm-8">
	            	<textarea class="form-control bg-light border-0" rows="2" id="profer" name="profer"></textarea>
	            </div>
	        </div>
      	</div>
    </div>
  </div>
</div>