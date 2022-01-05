@if ($errors->any())
	<div class="alert alert-danger" role="alert">
		<strong>Failed!</strong>
		<ul>
			@foreach (array_unique($errors->all()) as $error)
				<li class="font-weight-bold">{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif