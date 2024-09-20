@if (count($errors))
	<div class="alert alert-danger-outline alert-dismissible fade in mb-0" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">×</span>
		</button>
		<strong>پیام خطا!</strong>
		<ul>
			@foreach($errors->all() as $error)
	        <li>{{$error}}</li>
	        @endforeach
	     </ul>
	</div>
@endif

@if (session('success'))
	<div class="alert alert-success-outline alert-dismissible fade in mb-0" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">×</span>
		</button>
		<strong>پیام موفقیت!</strong>
		<span>{{ session('success') }}</span>
	</div>
@endif


@if (session('failed'))
	<div class="alert alert-danger-outline alert-dismissible fade in mb-0" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">×</span>
		</button>
		<strong>پیام خطا!</strong>
		<span>{{ session('failed') }}</span>
	</div>
@endif


