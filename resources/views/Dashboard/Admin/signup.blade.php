@extends('Dashboard.layouts.master2')
@section('css')
    <style>
        .signup-form{display: none;}
    </style>
<!-- Sidemenu-respoansive-tabs css -->
<link href="{{URL::asset('Dashboard/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection
@section('content')
		<div class="container-fluid">
			<div class="row no-gutter">
				<!-- The image half -->
				<div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
					<div class="row wd-100p mx-auto text-center">
						<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
							<img src="{{URL::asset('Dashboard/img/media/login.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
						</div>
					</div>
				</div>
				<!-- The content half -->
				<div class="col-md-6 col-lg-6 col-xl-5 bg-white">
					<div class="login d-flex align-items-center py-2">
						<!-- Demo content-->
						<div class="container p-0">
							<div class="row">
								<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
									<div class="card-sigin">
										<div class="mb-5 d-flex"> <a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('Dashboard/img/brand/favicon.png')}}" class="sign-favicon ht-40" alt="logo"></a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Va<span>le</span>x</h1></div>
										<div class="main-signup-header">
											<h2 class="text-primary">Get Started</h2>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">{{__('Dashboard/login_trans.select_options')}}</label>
                                                <select class="form-control" id="selectOption">
                                                    <option selected disabled>{{__('Dashboard/login_trans.select_list')}}</option>
                                                    <option value="admin">{{__('Dashboard/login_trans.Admin')}}</option>
                                                    <option value="patient">التسجيل مريض</option>
                                                </select>
                                            </div>




                                            <div class="signup-form" id="admin" >
                                                <h5 class="font-weight-normal mb-4">Signup Please</h5>
                                                <form method="POST" action="{{ route('register.admin') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>Firstname &amp; Lastname</label>
                                                        <input class="form-control" placeholder="Enter your firstname and lastname" type="text" name="name" :value="old('name')" required autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input class="form-control" placeholder="Enter your email" type="email" name="email" :value="old('email')" >
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input class="form-control" placeholder="Enter your password" type="password" name="password">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>ConfirmPassword</label> <input class="form-control" placeholder="ConfirmPassword" type="password" name="password_confirmation">
                                                    </div>
                                                    <button class="btn btn-main-primary btn-block" type="submit">Create Account</button>
                                                    <div class="row row-xs">
                                                        <div class="col-sm-6">
                                                            <button class="btn btn-block"><i class="fab fa-facebook-f"></i> Signup with Facebook</button>
                                                        </div>
                                                        <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                            <button class="btn btn-info btn-block"><i class="fab fa-twitter"></i> Signup with Twitter</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="main-signup-footer mt-5">
                                                    <p>Already have an account? <a href="">Sign In</a></p>
                                                </div>
                                            </div>






                                            <div class="signup-form" id="patient" >
                                                <h5 class="font-weight-normal mb-4">Signup Please</h5>
                                                <form method="POST" action="{{ route('register.user') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>Firstname &amp; Lastname</label>
                                                        <input class="form-control" placeholder="Enter your firstname and lastname" type="text" name="name" :value="old('name')" required autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input class="form-control" placeholder="Enter your email" type="email" name="email" :value="old('email')" >
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input class="form-control" placeholder="Enter your password" type="password" name="password">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>ConfirmPassword</label> <input class="form-control" placeholder="ConfirmPassword" type="password" name="password_confirmation">
                                                    </div>
                                                    <button class="btn btn-main-primary btn-block" type="submit">Create Account</button>
                                                    <div class="row row-xs">
                                                        <div class="col-sm-6">
                                                            <button class="btn btn-block"><i class="fab fa-facebook-f"></i> Signup with Facebook</button>
                                                        </div>
                                                        <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                            <button class="btn btn-info btn-block"><i class="fab fa-twitter"></i> Signup with Twitter</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="main-signup-footer mt-5">
                                                    <p>Already have an account? <a href="">Sign In</a></p>
                                                </div>
                                            </div>




                                        </div>
									</div>
								</div>
							</div>
						</div><!-- End -->
					</div>
				</div><!-- End -->
			</div>
		</div>
@endsection
@section('js')
    <script>
        $('#selectOption').change(function (){
            var myID = $(this).val();
            $('.signup-form').each(function(){
                myID === $(this).attr('id') ? $(this).show() : $(this).hide();
            });
        });
    </script>
@endsection
