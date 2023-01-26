<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	<div class="container">
		<a class="navbar-brand" href='{{ route('website') }}'>Hotel Sea Palace</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="oi oi-menu"></span> Menu
		</button>

		<div class="collapse navbar-collapse" id="ftco-nav">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active"><a  href="{{route('website')}}"class="nav-link">Home</a></li>
				<li class="nav-item"><a href="{{route('website.rooms')}}" class="nav-link">Rooms</a></li>
				<li class="nav-item"><a href="{{route('website.about')}}" class="nav-link">About</a></li>
				<li class="nav-item"><a href="{{route('website.contact')}}" class="nav-link">Contact</a></li>
				@auth
				<li class="nav-item"><a href="{{route('user.profile')}}" class="nav-link">{{auth()->user()->name}}'s Profile</a></li>
				<li class="nav-item"><a href="{{route('user.logout')}}" class="nav-link">Logout</a></li>
				@else
				<li class="nav-item"><a href='blog.html' class="nav-link" data-toggle="modal" data-target="#registration">Signup</a></li>
				<li class="nav-item"><a href='contact.html' class="nav-link" class="btn btn-primary" data-toggle="modal" data-target="#login">Login</a></li>
				@endauth
			</ul>
		</div>
	</div>
</nav>

<!-- Modal for Signup-->
<div class="modal fade" id="registration" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Create your account or Signup</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<form method="post" action="{{route('user.registration')}}" enctype="multipart/form-data">
					@csrf

					Name: <input type="text" name="name" required class="form-control" placeholder="Enter Your Name">
					Email: <input type="email" name="email" class="form-control" required placeholder="Enter Your Email">
					Password: <input type="password" name="password" class="form-control" min="4" placeholder="Enter Your Password">
					Contact No: <input type="number" name="contact" required class="form-control" placeholder="Enter Your Contact No">
					Address: <input type="text" name="address" required class="form-control" placeholder="Enter Your Address">
					Gender:<br>
					<input type="radio" name="gender" value="Male">Male<br>
					<input type="radio" name="gender" value="Female">Female<br>
					<input type="radio" name="gender" value="Other">Other<br>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Register</button>
						<button type="reset" class="btn btn-secondary">Reset</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal for Login -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Please Login</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{route('user.login')}}" method="post">
					@csrf
					<label>Email:</label>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="email"name="email" required class="form-control" placeholder="Please Enter Your Email">

					</div>
					<label>Password:</label>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" required class="form-control" placeholder="Please Enter Your Password" name="password">
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Login</button>
					</div>
					<p>Don't have any account?Signup</p>
				</form>
			</div>
		</div>
	</div>
</div>
