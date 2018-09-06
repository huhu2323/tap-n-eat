@extends ('ordering.layouts.master')


@section ('content')
<div class="container">
  <div class="row">
    <div class="offset-4 col-4 text-center">
      <img height="150" src="{{ asset('assets/img/logo-png-light.png') }}">
    </div>
  </div>
</div>

<!--START OF CAROUSEL-->
<div id="presentation">
  <div id="demo" class="carousel slide adds" data-ride="carousel">

    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ul>

    <div class="carousel-inner all-adds" >

      <div class="carousel-item active">
        <img src="{{ asset('assets/img/login-bg.jpg') }}" alt="MIRIEO ADDS" class="all-adds" >
        <div class="carousel-caption adds-align">
          <h1><a href="#" class="link-layout text-center">MIRIEO ADDS1<d/dasa></h1>
          <p>ADDS HERE</p>
        </div>   
      </div>
     
      <div class="carousel-item">
        <img src="{{ asset('assets/img/login-bg.jpg') }}" alt="MIRIEO ADDS" class="all-adds" >
        <div class="carousel-caption adds-align">
          <h1><a href="#" class="link-layout text-center">MIRIEO ADDS2<d/dasa></h1>
          <a tabindex="0" class="btn btn-lg btn-danger" role="button" data-toggle="popover" data-trigger="focus" title="Dismissible popover" data-content="And here's some amazing content. It's very engaging. Right?">Dismissible popover</a>
        </div>   
      </div>
      
    <div class="carousel-item">
        <img src="{{ asset('assets/img/login-bg.jpg') }}" alt="MIRIEO ADDS" class="all-adds" >
        <div class="carousel-caption adds-align">
          <h1><a href="#" class="link-layout text-center">MIRIEO ADDS3<d/dasa></h1>
          <p>ADDS HERE</p>
        </div>   
      </div>
    </div>

    
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
    </a>
  </div>
</div>
<!--END OF CAROUSEL-->
@endsection

@section ('menu')
  @include('ordering.layouts.menu')
@endsection