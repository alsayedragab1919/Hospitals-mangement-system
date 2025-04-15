@extends('Dashboard.layouts.master2')
@section('css')
    <style>
        .loginform{display: none;}
    </style>

<!-- Sidemenu-respoansive-tabs css -->
<link href="{{URL::asset('Dashboard/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}} "rel="stylesheet">
@endsection
@section('content')
		<div class="container-fluid">
			<div class="row no-gutter">
				<!-- The image half -->
				<div class="col-md-10 col-lg-10 col-xl-7 d-none d-md-flex bg-primary-transparent">
					<div class="row wd-100p mx-auto text-center">
						<div class="col-md-300 col-lg-300 col-xl-300 my-auto mx-auto wd-200p">
							<img src="{{URL::asset('Dashboard/img/media/login.png')}}" class="my-auto ht-xl-250p wd-md-250p wd-xl-250p mx-auto" alt="logo">
						</div>
					</div>
				</div>
				<!-- The content half -->
				<div class="col-md-6 col-lg-6 col-xl-5 bg-white">
					<div class="login d-flex align-items-center py-2">
						<!-- Demo content-->
						<div class="container p-0">
							<div class="row">
								<div class="col-md-11 col-lg-11 col-xl-9 mx-auto">
									<div class="card-sigin">
										<div class="mb-5 d-flex"> <a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('Dashboard/img/brand/favicon.png')}}" class="sign-favicon ht-0" alt="logo"></a><h1 class="main-logo1 ml-1 mr-1 my-auto tx-30"></h1></div>
										<div class="card-sigin">
											<div class="main-signup-header">
						            		<h2>{{trans('Dashboard/login_tarans.Welcome')}}</h2>
                                                @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">{{trans('Dashboard/login_tarans.select_options')}}</label>
                                                    <select class="form-control" id="select_options">
                                                        <option selected disabled>{{trans('Dashboard/login_tarans.select_list')}}</option>
                                                        <option value="admin">{{trans('Dashboard/login_tarans.Admin')}}</option>
														<option value="doctor">{{trans('Dashboard/login_tarans.doctor')}}</option>
														<option value="ray_employee">{{trans('Dashboard/login_tarans.login_rays')}}</option>
														<option value="Laboratories">{{trans('Dashboard/login_tarans.login_laboratory')}}</option>
														<option value="patient">{{trans('Dashboard/login_tarans.login_patient')}}</option>
                                                    </select>
                                                </div>
                                                {{--user Form--}}
                                                  <div class="loginform" id="patient">
												<h5 class="font-weight-semibold mb-4">{{trans('Dashboard/login_tarans.user')}}</h5>
                                                <form method="POST" action="{{ route('login.patient') }}">
                                                    @csrf
													<div class="form-group">
                                                        <label name="email">{{trans('Dashboard/login_tarans.Email')}}</label>
                                                        <input class="form-control" name="email"  type="email" placeholder={{trans('Dashboard/login_tarans.Email')}} :value="old('email')" required autofocus>
                                                        </div>
													<div class="form-group">
														<label name="password">{{trans('Dashboard/login_tarans.password')}}</label>
                                                        <input class="form-control"   name="password" placeholder={{trans('Dashboard/login_tarans.password')}} type="password">
													</div>
                                                    <button type="submit" class="btn btn-main-primary btn-block">{{trans('Dashboard/login_tarans.submit')}}</button>
													<div class="row row-xs">
														<div class="col-sm-6">
															<button type="submit" name="mita" class="btn btn-block"><i class="fab fa-facebook-f">{{trans('Dashboard/login_tarans.mita')}}</i></button>
														</div>
														<div class="col-sm-6 mg-t-10 mg-sm-t-0">
															<button type="submit" name="X" class="btn btn-info btn-block"><i class="fab fa-twitter"></i> {{trans('Dashboard/login_tarans.X')}}</button>
														</div>
													</div>
												</form>

												<div class="main-signin-footer mt-5">
													<p><a href="">{{trans('Dashboard/login_tarans.Forgot password')}}</a></p>
													<p> <a href="{{ url('/' . $page='signup') }}">{{trans('Dashboard/login_tarans.Create an Account')}}</a>
												</div>
                                                  </div>


                                                                      {{--Admin Form--}}
                                                  <div class="loginform" id="admin">

												<h5 class="font-weight-semibold mb-4">{{trans('Dashboard/login_tarans.Admin')}}</h5>
                                                <form method="POST" action="{{ route('login.admin') }}">
                                                    @csrf
													<div class="form-group">
														<label>{{trans('Dashboard/login_tarans.Email')}}</label>
                                                        <input class="form-control" name="email" placeholder="{{trans('Dashboard/login_tarans.Email')}}" type="email" :value="old('email')" required autofocus>
													</div>
													<div class="form-group">
														<label>{{trans('Dashboard/login_tarans.password')}}</label>
                                                        <input class="form-control"   name="password" placeholder={{trans('Dashboard/login_tarans.password')}} type="password">
													</div>
                                                    <button type="submit" class="btn btn-main-primary btn-block">{{trans('Dashboard/login_tarans.submit')}}</button>
													<div class="row row-xs">
														<div class="col-sm-6">
															<button name="mita" class="btn btn-block"><i class="fab fa-facebook-f"></i> {{trans('Dashboard/login_tarans.mita')}}</button>
														</div>
														<div class="col-sm-6 mg-t-10 mg-sm-t-0">
															<button type="submit" class="btn btn-info btn-block"><i class="fab fa-twitter"></i> {{trans('Dashboard/login_tarans.X')}}</button>
														</div>
													</div>
												</form>

												<div class="main-signin-footer mt-5">
													<p><a href="">{{trans('Dashboard/login_tarans.Forgot password')}}</a></p>
													<p> <a href="">{{trans('Dashboard/login_tarans.Create an Account')}}</a></p>
												</div>
                                            </div>


											{{--Doctor Form--}}
											<div class="loginform" id="doctor">
												<h5 class="font-weight-semibold mb-4">{{trans('Dashboard/login_tarans.doctor')}}</h5>
                                                <form method="POST" action="{{ route('login.doctor') }}">
                                                    @csrf
													<div class="form-group">
														<label>{{trans('Dashboard/login_tarans.Email')}}</label>
                                                        <input class="form-control" name="email" placeholder="{{trans('Dashboard/login_tarans.Email')}}" type="email" :value="old('email')" required autofocus>
													</div>
													<div class="form-group">
														<label>{{trans('Dashboard/login_tarans.password')}}</label>
                                                        <input class="form-control"   name="password" placeholder={{trans('Dashboard/login_tarans.password')}} type="password">
													</div>
                                                    <button type="submit" class="btn btn-main-primary btn-block">{{trans('Dashboard/login_tarans.submit')}}</button>
													<div class="row row-xs">
														<div class="col-sm-6">
															<button name="mita" class="btn btn-block"><i class="fab fa-facebook-f"></i> {{trans('Dashboard/login_tarans.mita')}}</button>
														</div>
														<div class="col-sm-6 mg-t-10 mg-sm-t-0">
															<button type="submit" class="btn btn-info btn-block"><i class="fab fa-twitter"></i> {{trans('Dashboard/login_tarans.X')}}</button>
														</div>
													</div>
												</form>

												<div class="main-signin-footer mt-5">
													<p><a href="">{{trans('Dashboard/login_tarans.Forgot password')}}</a></p>
													<p> <a href="">{{trans('Dashboard/login_tarans.Create an Account')}}</a></p>
												</div>
                                            </div>



											<div class="loginform" id="ray_employee">
												<h5 class="font-weight-semibold mb-4">{{trans('Dashboard/login_tarans.login_rays')}}</h5>
                                                <form method="POST" action="{{ route('login.ray_employee') }}">
                                                    @csrf
													<div class="form-group">
														<label>{{trans('Dashboard/login_tarans.Email')}}</label>
                                                        <input class="form-control" name="email" placeholder="{{trans('Dashboard/login_tarans.Email')}}" type="email" :value="old('email')" required autofocus>
													</div>
													<div class="form-group">
														<label>{{trans('Dashboard/login_tarans.password')}}</label>
                                                        <input class="form-control"   name="password" placeholder={{trans('Dashboard/login_tarans.password')}} type="password">
													</div>
                                                    <button type="submit" class="btn btn-main-primary btn-block">{{trans('Dashboard/login_tarans.submit')}}</button>
													<div class="row row-xs">
														<div class="col-sm-6">
															<button name="mita" class="btn btn-block"><i class="fab fa-facebook-f"></i> {{trans('Dashboard/login_tarans.mita')}}</button>
														</div>
														<div class="col-sm-6 mg-t-10 mg-sm-t-0">
															<button type="submit" class="btn btn-info btn-block"><i class="fab fa-twitter"></i> {{trans('Dashboard/login_tarans.X')}}</button>
														</div>
													</div>
												</form>

												<div class="main-signin-footer mt-5">
													<p><a href="">{{trans('Dashboard/login_tarans.Forgot password')}}</a></p>
													<p> <a href="">{{trans('Dashboard/login_tarans.Create an Account')}}</a></p>
												</div>
                                            </div>




											<div class="loginform" id="Laboratories">
												<h5 class="font-weight-semibold mb-4">{{trans('Dashboard/login_tarans.login_laboratory')}}</h5>
                                                <form method="POST" action="{{ route('login.laboratories_Employee') }}">
                                                    @csrf
													<div class="form-group">
														<label>{{trans('Dashboard/login_tarans.Email')}}</label>
                                                        <input class="form-control" name="email" placeholder="{{trans('Dashboard/login_tarans.Email')}}" type="email" :value="old('email')" required autofocus>
													</div>
													<div class="form-group">
														<label>{{trans('Dashboard/login_tarans.password')}}</label>
                                                        <input class="form-control"   name="password" placeholder={{trans('Dashboard/login_tarans.password')}} type="password">
													</div>
                                                    <button type="submit" class="btn btn-main-primary btn-block">{{trans('Dashboard/login_tarans.submit')}}</button>
													<div class="row row-xs">
														<div class="col-sm-6">
															<button name="mita" class="btn btn-block"><i class="fab fa-facebook-f"></i> {{trans('Dashboard/login_tarans.mita')}}</button>
														</div>
														<div class="col-sm-6 mg-t-10 mg-sm-t-0">
															<button type="submit" class="btn btn-info btn-block"><i class="fab fa-twitter"></i> {{trans('Dashboard/login_tarans.X')}}</button>
														</div>
													</div>
												</form>

												<div class="main-signin-footer mt-5">
													<p><a href="">{{trans('Dashboard/login_tarans.Forgot password')}}</a></p>
													<p> <a href="">{{trans('Dashboard/login_tarans.Create an Account')}}</a></p>
												</div>
                                            </div>







									</div>

							</div>
						</div><!-- End -->
					</div>
				</div><!-- End -->
			</div>
		</div>
    </div>
  </div>
</div>
@endsection
@section('js')
    <script>
        $('#select_options').change(function (){
            var myID = $(this).val();
            $('.loginform').each(function(){
           myID === $(this).attr('id') ? $(this).show() : $(this).hide();
            });
        });
    </script>
@endsection
