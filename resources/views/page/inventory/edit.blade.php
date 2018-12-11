 

@extends ('layouts.master')

@section ('contents')
	<div class="panel panel-headline">
		<div class="panel-heading">
			<h3 class="panel-title"><b>{{ isset($_GET['trashed']) ? 'Trashed ' : '' }}Inventory</b></h3>
			<p class="panel-subtitle">Date: {{ \Carbon\Carbon::today()->toFormattedDateString() }}</p>
		</div>

		<div class="panel panel-inside">
			<h1> HAYME DITO UNG EDIT </h1>
			<H1> NEW FORM </H1>
			<H1> HINDI KO ALAM KONG tama BA </H1>
			<H1> WAG MO KAMI E BASH</H1>
			<H3> YUN LANG FOOOO!!!! </H3>
		</div>
		

	<div class="pagination-container">
		<div class="pagination">
			
		</div>
	</div>
	
@endsection

@include ('layouts.notification')
inven