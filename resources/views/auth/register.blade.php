@extends('layouts.app')

@section('content')
<section class="my-lg-14 my-8">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-6 col-lg-4 order-lg-1 order-2">
                <!-- img -->
                <img src="{{ asset('/theme/images/signup-g.svg') }}" alt="" class="img-fluid">
            </div>
            <!-- col -->
            <div class="col-12 col-md-6 offset-lg-1 col-lg-4 order-lg-2 order-1">
                <div class="mb-lg-9 mb-5">
                    <h1 class="mb-1 h2 fw-bold">Sign Up</h1>
                    <p>Welcome ! Enter your details  to get started.</p>
                </div>
                <!-- form -->
                <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate>
                    @csrf
                    <div class="row g-3">
                        <!-- Name -->
                        <div class="col-12 col-md-6">
                            <label for="formSignupFname" class="form-label visually-hidden">First Name</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="formSignupFname" name="first_name" placeholder="First Name" value="{{ old('first_name') }}" required>
                            @error('first_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="formSignupLname" class="form-label visually-hidden">Last Name</label>
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="formSignupLname" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}" required>
                            @error('last_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Email and Phone Number -->
                        <div class="col-12">
                            <label for="formSignupEmail" class="form-label visually-hidden">Email Address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="formSignupEmail" name="email" placeholder="Email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="formSignupPhone" class="form-label visually-hidden">Phone Number</label>
                            <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="formSignupPhone" name="phone_number" placeholder="Phone Number" value="{{ old('phone_number') }}">
                            @error('phone_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- County -->
                        <div class="col-12 col-md-6">
                            <label for="formSignupCounty" class="form-label visually-hidden">County</label>
                            <select class="form-control" name="county" id="county" required>
                                <option value="Baringo">Baringo</option>
                                <option value="Bomet">Bomet</option>
                                <option value="Bungoma">Bungoma</option>
                                <option value="Busia">Busia</option>
                                <option value="Elgeyo-Marakwet">Elgeyo-Marakwet</option>
                                <option value="Embu">Embu</option>
                                <option value="Garissa">Garissa</option>
                                <option value="Homa Bay">Homa Bay</option>
                                <option value="Isiolo">Isiolo</option>
                                <option value="Kajiado">Kajiado</option>
                                <option value="Kakamega">Kakamega</option>
                                <option value="Kericho">Kericho</option>
                                <option value="Kiambu">Kiambu</option>
                                <option value="Kilifi">Kilifi</option>
                                <option value="Kirinyaga">Kirinyaga</option>
                                <option value="Kisii">Kisii</option>
                                <option value="Kisumu">Kisumu</option>
                                <option value="Kitui">Kitui</option>
                                <option value="Kwale">Kwale</option>
                                <option value="Laikipia">Laikipia</option>
                                <option value="Lamu">Lamu</option>
                                <option value="Machakos">Machakos</option>
                                <option value="Makueni">Makueni</option>
                                <option value="Mandera">Mandera</option>
                                <option value="Marsabit">Marsabit</option>
                                <option value="Meru">Meru</option>
                                <option value="Migori">Migori</option>
                                <option value="Mombasa">Mombasa</option>
                                <option value="Murang'a">Murang'a</option>
                                <option value="Nairobi City">Nairobi City</option>
                                <option value="Nakuru">Nakuru</option>
                                <option value="Nandi">Nandi</option>
                                <option value="Narok">Narok</option>
                                <option value="Nyamira">Nyamira</option>
                                <option value="Nyandarua">Nyandarua</option>
                                <option value="Nyeri">Nyeri</option>
                                <option value="Samburu">Samburu</option>
                                <option value="Siaya">Siaya</option>
                                <option value="Taita-Taveta">Taita-Taveta</option>
                                <option value="Tana River">Tana River</option>
                                <option value="Tharaka-Nithi">Tharaka-Nithi</option>
                                <option value="Trans Nzoia">Trans Nzoia</option>
                                <option value="Turkana">Turkana</option>
                                <option value="Uasin Gishu">Uasin Gishu</option>
                                <option value="Vihiga">Vihiga</option>
                                <option value="Wajir">Wajir</option>
                                <option value="West Pokot">West Pokot</option>
                            </select>
                            @error('county')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Address -->
                        <div class="col-12 col-md-6">
                            <label for="formSignupAddress" class="form-label visually-hidden">Address</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="formSignupAddress" name="address" placeholder="Address" value="{{ old('address') }}" required>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- City -->
                        <div class="col-12">
                            <label for="formSignupCity" class="form-label visually-hidden">City</label>
                            <input type="text" class="form-control @error('city') is-invalid @enderror" id="formSignupCity" name="city" placeholder="City" value="{{ old('city') }}" required>
                            @error('city')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Password and Confirm Password -->
                        <div class="col-12">
                            <div class="password-field position-relative">
                                <label for="formSignupPassword" class="form-label visually-hidden">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror fakePassword" id="formSignupPassword" name="password" placeholder="Enter password" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <span><i class="bi bi-eye-slash passwordToggler" data-target="#formSignupPassword"></i></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="password-field position-relative">
                                <label for="formSignupPasswordConfirm" class="form-label visually-hidden">Confirm Password</label>
                                <input type="password" class="form-control" id="formSignupPasswordConfirm" name="password_confirmation" placeholder="Confirm Password" required>
                                <span><i class="bi bi-eye-slash passwordToggler" data-target="#formSignupPasswordConfirm"></i></span>
                            </div>
                        </div>
                        <!-- Submit Button -->
                        <div class="col-12 d-grid">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>

                        <!-- Terms and Privacy -->
                        <div class="col-12 text-center mt-3">
                            <p>
                                <small>
                                    By continuing, you agree to our
                                    <a href="#!">Terms of Service</a>
                                    &amp;
                                    <a href="#!">Privacy Policy</a>
                                </small>
                            </p>
                        </div>

                        <!-- Log In Link -->
                        <div class="col-12 text-center mt-3">
                            <p>Already have an account? <a href="{{ route('login') }}">Log In</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const passwordTogglers = document.querySelectorAll('.passwordToggler');

        passwordTogglers.forEach(toggler => {
            toggler.addEventListener('click', function () {
                const targetSelector = this.getAttribute('data-target');
                const targetInput = document.querySelector(targetSelector);

                if (targetInput.type === 'password') {
                    targetInput.type = 'text';
                    this.classList.remove('bi-eye-slash');
                    this.classList.add('bi-eye');
                } else {
                    targetInput.type = 'password';
                    this.classList.remove('bi-eye');
                    this.classList.add('bi-eye-slash');
                }
            });
        });
    });
</script>
@endsection
