{!! Form::model($category, [ 'method' => 'post', 'files' => true, 'class' => 'form-horizontal bordered-row' ]) !!}

<div class="col-md-9">
	<div class="panel panel-headline">
	<div class="panel-heading">
		<h3 class="panel-title"><i class="fa {{ $icon }}"></i> {{ $title }}</h3>
	</div>
		<div class="panel-body">
			<div class="col-md-9">
				<input type="hidden" name="id" value="{{ $category->id }}">
				<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
					<div class="input-group">
						<label for="name" class="input-group-addon input-lg">Category Name: </label>
						{!! Form::text('name', null, ['class' => 'form-control input-lg', 'placeholder' => 'Input Product Name here...', 'id' => 'productname']) !!}
					</div>
					{!! $errors->has('name') ? '<span class="label label-danger">'.$errors->first('name').'</span>' : '' !!}
				</div>
				<div class="row">
					<div class="col-md-8">
						<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
							<label for="productprice">Image: </label>
							<br>
							<img src="{{ $category->image ? asset('assets/img/cat_img').'/'.$category->image : asset('assets/img/logo.jpg') }}" class="preview" style="width: 50%;">
							<div class="input-group">
								<label for="productprice" class="input-group-addon"><i class="fa fa-image"></i></label>
								{!! Form::file('image', ['class' => 'form-control image', 'placeholder' => 'Input  Image here...', 'id' => 'productprice']) !!}
							</div>
							{!! $errors->has('image') ? '<span class="label label-danger">'.$errors->first('image').'</span>' : '' !!}
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
							<label for="decription">Description: </label>
							{!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Input Product Price here...', 'id' => 'decription', 'rows' => '4']) !!}
							{!! $errors->has('description') ? '<span class="label label-danger">'.$errors->first('description').'</span>' : '' !!}
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
</div>
<div class="col-md-3">
	<div class="panel">
		<div class="panel-heading action-panel">
			<h3 class="panel-title">Actions</h3>
		</div>
		<div class="panel-body">
			<button type="submit" class="btn btn-block {{ $color }} text-center"><i class="fa {{ $icon }}" aria-hidden="true"></i>&nbsp;{{ $button }}</button>
			<a href="{{ route('category.index') }}" class="btn btn-block btn-danger text-center"><i class="fa fa-close" aria-hidden="true"></i>&nbsp;Cancel</a>
		</div>
	</div>
</div>
{!! Form::close() !!}
@section('after-script')
	<script type="text/javascript">
		function readURL(input) {

			if (input.files && input.files[0]) 
			{
				var reader = new FileReader();

				reader.onload = function(e) {
				$('.preview').attr('src', e.target.result);
				}

				reader.readAsDataURL(input.files[0]);
			}
		}

		$(".image").change(function() {
			readURL(this);
		});
	</script>
@endsection