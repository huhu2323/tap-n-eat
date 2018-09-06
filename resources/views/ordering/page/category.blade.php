@include ('ordering.layouts.head')

<body class="category-bg">
<div class="category-overlay">
	
</div>			
	@foreach($categories as $category )
		<div class="card category-card-orders">
			<img class="card-img-top pic-height" src="{{ asset('assets/img/login-bg.jpg') }}" alt="image">
				<div class="card-body">
					<strong> <h2 class="card-title">{{$category->name}}</h2></strong>
					<h4 class="card-title">{{$category->description}}</h4>						
				</div>
		</div>
	@endforeach

<div id="container-floating">
  <div class="nd5 nds" data-toggle="tooltip" data-placement="left" data-original-title="Simone">
    <img class="reminder">
    <p class="letter"><a href="http://localhost/tap_n_eat/public/ordering/product" class="fcolor">M</a></p>
  </div>

  <div class="nd4 nds" data-toggle="tooltip" data-placement="left" data-original-title="contract@gmail.com">
    <img class="reminder">
    <p class="letter"><a href="#" class="fcolor">E</a></p>
  </div>

  <div class="nd3 nds" data-toggle="tooltip" data-placement="left" data-original-title="Reminder">
    <!--<img class="reminder" src="{{ asset('assets/img/icons/ic_reminders_speeddial_white_24dp.png') }}" />-->
    <img class="reminder">
    <p class="letter">N</p>
  </div>{{-- 
{{route('customerOrder')}} --}}
  <div class="nd1 nds" data-toggle="tooltip" data-placement="left" data-original-title="Edoardo@live.it">
    <img class="reminder">
    <p class="letter"><a href="http://localhost/tap_n_eat/public/ordering" class="fcolor">
    U</a></p>
  </div>

  <div id="floating-button" data-toggle="tooltip" data-placement="left" data-original-title="Create">
    <p class="plus"><i class="fa fa-bars" style="font-size: 25px; margin-top: 28px;"></i></p>
    <div class="edit plus"> <i class="fa fa-remove" style="font-size: 25px;  margin-top: 33px;"></i> </div>
  </div>
</div>


</body>
</html>