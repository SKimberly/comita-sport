<div class="modal fade" id="editTalla" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header btn-comita text-white">
        <h5 class="modal-title" id="exampleModalLabel">Editar Talla</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('admin.tallas.update', 'test') }}" class="bg-white shadow rounded py-3 px-4">
				@method('PUT') @csrf
				<div class="form-group">
                <input type="hidden" id="talla_id" name="talla_id" >
		            <label for="nombre">Nombre:</label>
		            <input class="form-control bg-light shadow-sm {{ $errors->has('nombre') ? ' is-invalid' : 'border-0' }}"
		                    id="nombre" name="nombre"
		                    placeholder="Ingrese el nombre de la talla" value="{{ old('nombre') }}" >
		            @if ($errors->has('nombre'))
		                    <span class="invalid-feedback" role="alert">
		                    	<strong>{{ $errors->first('nombre') }}</strong>
		                    </span>
		            @endif
		        </div>
		        <div class="form-group">
		            <label for="descripcion">Descripción</label>
                    <textarea class="form-control {{ $errors->has('descripcion') ? ' is-invalid' : 'border-1' }}" rows="2" name="descripcion" id="descripcion"  placeholder="Ingrese una breve descripción de la talla" >{{ old('descripcion') }}</textarea>
                    @if ($errors->has('descripcion'))
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $errors->first('descripcion') }}</strong>
		                </span>
		            @endif
		        </div>
                <button class="btn btn-block btn-comita text-white" type="submit" >
                  ACTUALIZAR
                </button>
                <a href="{{ route('admin.tallas.index') }}" class="btn btn-block btn-outline-comita" >
                  CANCELAR
                </a>
			     </form>
      	</div>
    </div>
  </div>
</div>