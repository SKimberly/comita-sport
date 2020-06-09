<div class="modal fade" id="crearPro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header btn-comita text-white">
        <h5 class="modal-title" id="exampleModalLabel">Crear nuevo producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('admin.productos.store','#pro') }}" class="bg-white shadow rounded py-3 px-4 was-validated" enctype="multipart/form-data" >
          @csrf
          <div class="modal-body">
              <div class="form-group row">
                  <label for="email" class="col-sm-5 col-form-label text-md-right"><strong></strong>{{ __('Nombre del producto:') }}</strong></label>
                  <div class="col-sm-7">
                      <input type="text" class="form-control bg-light   @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}"  autocomplete="nombre" autofocus placeholder="Nombre del nuevo producto">
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
              <a href="{{ route('admin.productos.index') }}" class="btn   btn-outline-comita "  >
                CANCELAR
              </a>
          </div>
      </form>
    </div>
  </div>
</div>
@push('scripts')
<script type="text/javascript">
 $(function () {
    //Initialize Select2 Elements
    $('.select2').select2({
      theme: "classic",
    })
    $('#descuento').ionRangeSlider({
      min     : -0,
      max     : 50,
      from    : 0,
      type    : 'single',
      step    : 1,
      postfix : '%',
      prettify: false,
      hasGrid : true
    })
    $("[name='oferta']").bootstrapSwitch();
  })
</script>
@endpush