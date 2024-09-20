@if(auth()->user()->isAdmin == 0)
	@include('admin')
@elseif(auth()->user()->isAdmin == 1)
	@include('users')
@else
  @include('welcome')
@endif
