<div class="container-fluid">
  <div class="row h-100 justify-content-center align-items-center"> 
    <div class="col-md-8 col-lg-6">
				<form class="form-login" action="{{ route('login') }}" method="POST">
					{{csrf_field()}}
					<div class="form-group">
						<label for="username">Email:</label>
						<input type="text" name="email" id="email" placeholder="Email..." class="form-control">
					</div>
						<div class="form-group">
						<label for="Password">Password:</label>
						<input type="password" name="password" id="password" placeholder="Password..." class="form-control">
					</div>
					<center>
						<button type="submit" class="btn btn-primary">Login</button>
						<!--<a href="#" class="btn btn-primary" role="button" aria-pressed="true">Forgot Password</a>-->
					</center>
				</form>
			</div>
		</div>
