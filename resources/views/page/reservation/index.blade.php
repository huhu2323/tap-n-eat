@extends('layouts.master');


@section ('contents')
	<div class="panel panel-headline">
		<div class="panel-heading">
			<h3 class="panel-title"><b>Reservation</b></h3>
			<p class="panel-subtitle">Date: {{ \Carbon\Carbon::today()->toFormattedDateString() }}</p>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel-body">
					
					<div class="panel panel-inside">
						<table class="table table-hover table-bordered table-striped">
							<input type="hidden" class="selected-input" data-module="category" data-id="" data-name="" data-link="{{ route('home') }}">
							<thead>
								<tr>
									<th width="25%">Member Name:</th>
									<th class="text-center" width="20%">Table Number:</th>
									<th class="text-center" width="20%">Total Person:</th>
									<th class="text-center" width="20%">Reserve Date:</th>
									<th class="text-center" width="20%">Reserve Time:</th>
									<th class="text-center" width="20%">Action</th>
								</tr>
							</thead>
							<div class="panel-body no-padding bg-primary text-center">
								<tbody>
									@if ( count($reservations) )
										@foreach ($reservations as $reservation)
											<tr  data-id="{{$reservation->id}}" data-name="{{$reservation->name}}">
												<td><span class="column-name">{{ $reservation->member_name }}</span>
												</td>
												<td class="text-center"> {{ $reservation->table_number }} </td>
												<td class="text-center"> {{ $reservation->total_person }} </td>
												<td class="text-center"> {{ $reservation->reserve_date->toFormattedDateString() }} </td>
												<td class="text-center"> {{ $reservation->reserve_time }} </td>
												<td><a href="{{ route('reservation.accept') }}" ><i class="fa fa-check" style="color:green" ></i></a>
												<a href="{{ route('reservation.reject') }}" ><i class="fa fa-ban" style="color:red"></i></a>
												</td>
											</tr>

										@endforeach

									@else
										<tr>
											<td colspan="6" class="text-center" style="font-size: 30px"> Oops! There's nothing here. </td>
										</tr>
									@endif
								</tbody>
							</div>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- 
	<div class="panel panel-headline" style="">
		<div class="panel-heading">
			<h3 class="panel-title"><b>Table Mapping</b></h3>
		</div>
		<div style="padding: 25px;">
			<button name="filter" value="1" class="new-table btn btn-primary">New Table</button>
		</div>
		<div style="padding-left: 25px; padding-right: 25px; padding-bottom: 25px; height: 500px;">
			<div style="background-color: gray; height: 100%;" class="mapping">
				<div class="grid-snap">
				  Table 1
				</div>
				<div class="grid-snap">
				  Table 2
				</div>
				<div class="grid-snap">
				  Table 3
				</div>
			</div>
		</div>
	</div>
	 -->
@endsection

@section ('after-script')
	<script type="text/javascript">
		$('.new-table').click(function() {
			x = $('.mapping').html();
			x += "<div class='grid-snap' style='position: relative; top:0px; left: 0px;'>";
			swal({
			  title: 'Table Name',
			  input: 'text',
			  inputAttributes: {
			    autocapitalize: 'off'
			  },
			  showCancelButton: true,
			  confirmButtonText: 'Look up',
			  showLoaderOnConfirm: true,
			}).then((result) => {
			  if (result.value) {
			    x += result.value;
			    x += "</div>";
				$('.mapping').html(x);
			  }
			})
		});

		interact('.grid-snap')
		  .draggable({
		  	snap: {
		      targets: [
		        interact.createSnapGrid({ x: 50, y: 50 })
		      ],
		      range: Infinity,
		      relativePoints: [ { x: 0, y: 0 } ]
		    },
		    // enable inertial throwing
		    inertia: true,
		    // keep the element within the area of it's parent
		    restrict: {
		      restriction: "parent",
		      endOnly: true,
		      elementRect: { top: 0, left: 0, bottom: 1, right: 1 }
		    },
		    // enable autoScroll
		    autoScroll: true,

		    // call this function on every dragmove event
		    onmove: dragMoveListener,
		    // call this function on every dragend event
		    onend: function (event) {
		      var textEl = event.target.querySelector('p');

		      textEl && (textEl.textContent =
		        'moved a distance of '
		        + (Math.sqrt(Math.pow(event.pageX - event.x0, 2) +
		                     Math.pow(event.pageY - event.y0, 2) | 0))
		            .toFixed(2) + 'px');
		    }
		  })
		  .resizable({
		    // resize from all edges and corners
		    edges: { left: true, right: true, bottom: true, top: true },
		    snap: {
		      targets: [
		        interact.createSnapGrid({ x: 50, y: 50 })
		      ],
		      range: Infinity,
		      relativePoints: [ { x: 0, y: 0 } ]
		    },
		    // keep the edges inside the parent
		    restrictEdges: {
		      outer: 'parent',
		      endOnly: true,
		    },

		    // minimum size
		    restrictSize: {
		      min: { width: 50, height: 50 },
		    },

		    inertia: false,
		  })
		  .on('resizemove', function (event) {
		    var target = event.target,
		        x = (parseFloat(target.getAttribute('data-x')) || 0),
		        y = (parseFloat(target.getAttribute('data-y')) || 0);

		    // update the element's style
		    target.style.width  = event.rect.width + 'px';
		    target.style.height = event.rect.height + 'px';

		    // translate when resizing from top or left edges
		    x += event.deltaRect.left;
		    y += event.deltaRect.top;

		    target.style.webkitTransform = target.style.transform =
		        'translate(' + x + 'px,' + y + 'px)';

		    target.setAttribute('data-x', x);
		    target.setAttribute('data-y', y);
		  });

		  function dragMoveListener (event) {
		    var target = event.target,
		        // keep the dragged position in the data-x/data-y attributes
		        x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx,
		        y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy;

		    // translate the element
		    target.style.webkitTransform =
		    target.style.transform =
		      'translate(' + x + 'px, ' + y + 'px)';

		    // update the posiion attributes
		    target.setAttribute('data-x', x);
		    target.setAttribute('data-y', y);
		  }

		  // this is used later in the resizing and gesture demos
		  window.dragMoveListener = dragMoveListener;
	
		
	</script>
@endsection

@include ('layouts.notification')