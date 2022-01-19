@extends('layout.master2')

@section('content')
<div class="page-content d-flex align-items-center justify-content-center">

  <div class="row w-100 mx-0 auth-page">
    <div class="col-md-8 col-xl-6 mx-auto">
      <div class="card">
        <div class="row">
          <div class="col-md-4 pr-md-0">
            <div class="auth-left-wrapper" style="background-image: url({{ url('https://via.placeholder.com/219x452') }})">

            </div>
          </div>
          <div class="col-md-8 pl-md-0">
            <div class="auth-form-wrapper px-4 py-5">
              <a href="#" class="noble-ui-logo logo-light d-block mb-2 font-weight-bold">
                Mgov<span>App</span>
              </a>
              <h5 class="text-muted font-weight-normal mb-4">Create a free account.</h5>

              <form class="forms-sample" method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                  <label for="exampleInputUsername1">Username</label>
                  <input type="text" class="form-control" id="exampleInputUsername1" name="name" autocomplete="Username" placeholder="Username">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" name="password" autocomplete="current-password" placeholder="Password">
                </div>

                <div class="mt-3">
                  <button type="submit" class="btn btn-primary mr-2 mb-2 mb-md-0">Register</button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection