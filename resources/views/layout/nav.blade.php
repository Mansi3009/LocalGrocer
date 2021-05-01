@section('content')

<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
<a class="navbar-brand" href="">Local Grocer</a>
	
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
</button>
		
<div class="collapse navbar-collapse bg-dark" id="navbarCollapse">		
	<ul class="navbar-nav mr-auto">
		<li class="nav-item active">
			<a class="nav-link" href="#">Dashboard</a>
		</li>
		
		<li class="nav-item">
			<a class="nav-link" href="{{route('user')}}">Users</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="{{route('productview')}}">Products</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="{{route('categoryview')}}">Category</a>
		</li>

		
        @if(auth()->user())
            <li class="nav-item">
				<a class="nav-link" href="#">Log Out</a>
			</li>
        @else
			<li class="nav-item">
				<a class="nav-link" href="#">Login</a>
			</li>   
		@endif

		</ul>

	<form class="form-inline mt-5 mt-md-0 ">
		<input class="form-control mr-sm-2" style="width: 350px;" type="text" 	placeholder="Search">
		<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	</form>
	</div>
</nav>

	
