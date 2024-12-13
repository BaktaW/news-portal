@extends('layouts.app')

@section('title', 'Login - PT. Winnicode Garuda Teknologi')
<section class="background-radial-gradient overflow-hidden">

@section('content')

    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5" style="font-family: Raleway;">
        <div class="row gx-lg-5 align-items-center mb-5">
            <div class="col-lg-6 mb-5 mb-lg-0 position-relative" style="margin: 0 auto;">
                <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
                <div class="card bg-glass">
                    <div class="card-body px-4 py-5 px-md-5">
                        <h1 style="text-align: center;">Login</h1>
                        <div style="text-align: center;">
                            <p>Please login to your account</p>
                        </div>

                        <!-- Display Errors -->
                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Login Form -->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control" required autofocus>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>

                            <!-- Submit button -->
                            <div style="text-align: center;">
                                <button type="submit" class="btn btn-primary btn-block mb-4">
                                    Login
                                </button>
                            </div>

                            <!-- Register link
                            <div style="text-align: center;">
                                <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
                            </div>-->
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
    .background-radial-gradient {
        background-color: hsl(218, 41%, 15%);
        background-image: radial-gradient(650px circle at 0% 0%,
                hsl(218, 41%, 35%) 15%,
                hsl(218, 41%, 30%) 35%,
                hsl(218, 41%, 20%) 75%,
                hsl(218, 41%, 19%) 80%,
                transparent 100%),
            radial-gradient(1250px circle at 100% 100%,
                hsl(218, 41%, 45%) 15%,
                hsl(218, 41%, 30%) 35%,
                hsl(218, 41%, 20%) 75%,
                hsl(218, 41%, 19%) 80%,
                transparent 100%);
    }

    #radius-shape-1 {
        height: 220px;
        width: 220px;
        top: -60px;
        left: -130px;
        background: radial-gradient(#44006b, #ad1fff);
        overflow: hidden;
    }

    #radius-shape-2 {
        border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
        bottom: -60px;
        right: -110px;
        width: 300px;
        height: 300px;
        background: radial-gradient(#44006b, #ad1fff);
        overflow: hidden;
    }

    .bg-glass {
        background-color: hsla(0, 0%, 100%, 0.9) !important;
        backdrop-filter: saturate(200%) blur(25px);
    }
</style>
    </section>
@endsection

