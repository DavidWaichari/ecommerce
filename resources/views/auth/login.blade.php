@extends('layouts.app')

@section('content')
 <!-- section -->
 <section class="my-lg-14 my-8">
    <div class="container">
       <!-- row -->
       <div class="row justify-content-center align-items-center">
          <div class="col-12 col-md-6 col-lg-4 order-lg-1 order-2">
             <!-- img -->
             <img src="{{ asset('/theme/images/signin-g.svg') }}" alt="" class="img-fluid">
          </div>
          <!-- col -->
          <div class="col-12 col-md-6 offset-lg-1 col-lg-4 order-lg-2 order-1">
             <div class="mb-lg-9 mb-5">
                <h1 class="mb-1 h2 fw-bold">Sign in</h1>
                <p>Welcome back! Enter your email to get started.</p>
             </div>

             <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
                @csrf <!-- CSRF protection -->

                <div class="row g-3">
                   <!-- row -->

                   <div class="col-12">
                      <!-- Email input -->
                      <label for="formSigninEmail" class="form-label visually-hidden">Email address</label>
                      <input type="email" class="form-control @error('email') is-invalid @enderror" id="formSigninEmail" name="email" placeholder="Email" value="{{ old('email') }}" required>
                      @error('email')
                         <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                   </div>

                   <div class="col-12">
                      <!-- Password input -->
                      <div class="password-field position-relative">
                         <label for="formSigninPassword" class="form-label visually-hidden">Password</label>
                         <input type="password" class="form-control @error('password') is-invalid @enderror fakePassword" id="formSigninPassword" name="password" placeholder="*****" required>
                         <span><i class="bi bi-eye-slash passwordToggler"></i></span>
                         @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                         @enderror
                      </div>
                   </div>

                   <div class="d-flex justify-content-between">
                      <!-- Remember me checkbox -->
                      <div class="form-check">
                         <input class="form-check-input" type="checkbox" name="remember" id="flexCheckDefault" {{ old('remember') ? 'checked' : '' }}>
                         <label class="form-check-label" for="flexCheckDefault">Remember me</label>
                      </div>
                      <!-- Forgot password link -->
                      <div>
                         <a href="{{ route('password.request') }}">Forgot password? Reset It</a>
                      </div>
                   </div>

                   <!-- Submit button -->
                   <div class="col-12 d-grid">
                      <button type="submit" class="btn btn-primary">Sign In</button>
                   </div>

                   <!-- Sign up link -->
                   <div class="col-12 text-center mt-3">
                      Don’t have an account? <a href="{{ route('register') }}">Sign Up</a>
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
            const targetInput = document.querySelector('#formSigninPassword');

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
