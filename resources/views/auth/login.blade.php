@extends('layouts.app')

@section('content')
<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container-fluid">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="mb-4 text-center">
							<img src="{{asset('admin/images/morden-logo.png')}}" width="180" alt="" />
						</div>
						<div class="card">
							<div class="card-body">
								<div class="border p-4 rounded">

									<div class="form-body">
										<form class="row g-3" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="col-12">
												<label for="inputEmailAddress" class="form-label">Email Address{{ __('Email Address') }}</label>
												<input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
													id="inputEmailAddress" placeholder="Email Address" required="true">
                                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                                </div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Enter
													Password</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" name="password"
														class="form-control border-end-0 @error('password') is-invalid @enderror" id="inputChoosePassword"
														placeholder="Enter Password" required="true">
													<a href="javascript:;" class="input-group-text bg-transparent"><i
															class="bx bx-hide"></i></a>
                                                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
												</div>
											</div>
											
                                            <div class="row mb-3">
                            <div class="col-md-12 ">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-12 offset-md-4">
                                <button type="submit" class="btn btn-block btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
											
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>

	</div>
	<!--end wrapper-->
@endsection
