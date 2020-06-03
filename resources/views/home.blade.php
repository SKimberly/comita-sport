@extends('layouts.master')

@section('contenido')
@section('cabecera')
@section('titulo','La-Comita/Inicio')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-8">
            <img src="{{ asset('/img/logo1.png') }}" alt="logo la comita" class="img-fluid float-right w-50 h-75">
        </div><!-- /.col -->
        <div class="col-sm-4">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Inicio</a></li>
            <li class="breadcrumb-item active">Categorias</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="owl-carousel owl-theme">
              @foreach($categorias as $categoria)
                <div class="item text-center " style="background-color: #17a2b8;">
                    <img src="{{ $categoria->urlcate }}" alt="" class="d-block w-100" style="max-height: 250px !important;">
                    <a href="" class="text-center" >
                      <h3 style="color: white;">{{ $categoria->nombre }}</h3>
                    </a>
                </div>
              @endforeach
            </div>
          <div class="text-center">
              <a class="btn colorcard play">Iniciar</a>
              <a class="btn colorcard stop">Detener</a>
          </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script defer>
if(typeof owlCarousel === 'function') {
   $('#owl-carousel').owlCarousel({
      navigation: true,
      items:3,
      loop:true,
      margin:10,
      autoplay:true,
      autoplayTimeout:1000,
      autoplayHoverPause:true
  });
  $('.play').on('click',function(){
      owl.trigger('play.owl.autoplay',[1000])
  })
  $('.stop').on('click',function(){
      owl.trigger('stop.owl.autoplay')
  })
};
</script>
@endpush