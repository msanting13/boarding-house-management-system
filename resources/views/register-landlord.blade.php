@extends('layouts.main-site-layout')
@section('content')
        <!--================Breadcrumb Area =================-->
        <section class="breadcrumb_area">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">Become A Lanlord</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Become A Lanlord</li>
                    </ol>
                </div>
            </div>
        </section>
        <!--================Breadcrumb Area =================-->

        <!--================ About History Area  =================-->
        <section class="about_history_area section_gap">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 d_flex align-items-center">
                        <div class="about_content ">
                            <h2 class="title title_color">Become <br>a Landlord?</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio reiciendis pariatur cum quod natus praesentium atque esse quaerat neque, possimus deleniti, eaque impedit mollitia consequatur! Hic architecto error harum iusto.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <form class="bg-light text-dark p-4" action="{{ route('landlord.auth.register') }}" method="POST">
                            @csrf
                            <h2 class="text-center mb-3">Landlord Registration</h2>
                            <div class="form-group row mb-3">
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('given_name') is-invalid @enderror" name="given_name" placeholder="First name" value="{{ old('give_name') }}">
                                    @error('given_name')
                                        <span class="feedback-invalid">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('family_name') is-invalid @enderror" name="family_name" placeholder="Last name" value="{{ old('family_name') }}">
                                    @error('family_name')
                                        <span class="feedback-invalid">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control @error('contact_number') is-invalid @enderror" name="contact_number" placeholder="Contact Number" value="{{ old('contact_number') }}">
                                @error('contact_number')
                                    <span class="feedback-invalid">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Address" value="{{ old('address') }}">
                                @error('address')
                                    <span class="feedback-invalid">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}">
                                @error('email')
                                    <span class="feedback-invalid">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
                                @error('password')
                                    <span class="feedback-invalid">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                              <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm password">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="icheck-primary">
                                          <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                          <label for="agreeTerms">
                                           I agree to the <a href="#">terms</a>
                                          </label>
                                        </div>
                                      </div>
                                      <!-- /.col -->
                                      <div class="col-4">
                                        <button type="submit" class="genric-btn primary radius">Register</button>
                                      </div>
                                      <!-- /.col -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!--================ About History Area  =================-->
@endsection