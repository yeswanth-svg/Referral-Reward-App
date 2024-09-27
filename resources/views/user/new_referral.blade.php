@extends('layouts.app')
@section('content')

<!-- Bootstrap 5 CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Google Fonts for modern typography -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<!-- Font Awesome for modern icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<!-- Custom CSS for animations and styling -->
<style>
    body {
        font-family: 'Poppins', sans-serif;
    }

    .myaccount-section {
        background-color: #f8f9fa;
        min-height: 100vh;
        display: flex;
        align-items: center;
    }

    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        background: #fff;
        overflow: hidden;
    }

    .card-header {
        background: linear-gradient(135deg, #4e54c8, #8f94fb);
        padding: 30px;
        color: white;
        text-align: center;
        font-size: 1.5rem;
        font-weight: bold;
        border-bottom: none;
    }

    .card-body {
        padding: 40px;
    }

    .form-group {
        position: relative;
        margin-bottom: 1.5rem;
    }

    .form-control {
        padding-left: 45px;
        height: 50px;
        border: 1px solid #ccc;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #8f94fb;
        box-shadow: none;
    }

    .form-group i {
        position: absolute;
        top: 50%;
        left: 15px;
        transform: translateY(-50%);
        color: #888;
    }

    .theme-btn {
        background-color: #4e54c8;
        color: white;
        padding: 12px 25px;
        border: none;
        border-radius: 25px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .theme-btn:hover {
        background-color: #8f94fb;
    }

    .invalid-feedback {
        font-size: 0.875rem;
        color: #e3342f;
    }

    /* Smooth fade-in animations */
    .fade-in {
        animation: fadeIn 1.5s ease;
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: translateY(10px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Mobile responsiveness */
    @media (max-width: 768px) {
        .card-body {
            padding: 30px;
        }

        .form-control {
            height: 45px;
        }
    }
</style>

<section class="myaccount-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8 col-sm-12 fade-in">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-user-plus"></i> New Referral Form
                    </div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success fade-in">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger fade-in">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('new_referral') }}" class="needs-validation" novalidate>
                            @csrf

                            <!-- Name Field with Icon -->
                            <div class="form-group">
                                <i class="fas fa-user"></i>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" placeholder="Client Name" required>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <!-- Phone Number Field with Icon -->
                            <div class="form-group">
                                <i class="fas fa-phone"></i>
                                <input id="phone_number" type="text"
                                    class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                                    value="{{ old('phone_number') }}" placeholder="7788994455" required>
                                @error('phone_number')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Email Field with Icon -->
                            <div class="form-group">
                                <i class="fas fa-envelope"></i>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" placeholder="Client Email" required>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>



                            <!-- Project Type Field with Icon -->
                            <div class="form-group">
                                <i class="fas fa-map-marker-alt"></i>
                                <input id="project_type" type="text"
                                    class="form-control @error('project_type') is-invalid @enderror" name="project_type"
                                    value="{{ old('project_type') }}" placeholder=" Project Type" required>
                                @error('project_type')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="text-center mt-4">
                                <button type="submit" class="theme-btn">
                                    Submit a New Referral <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bootstrap 5 JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection