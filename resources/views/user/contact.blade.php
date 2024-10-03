@extends('layouts.main')
@section('content')

<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f8f9fa;
    }

    .contact-section {
        padding: 60px 0;
    }

    .contact-form {
        background-color: #fff;
        padding: 30px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
    }

    .contact-form h4 {
        font-size: 1.75rem;
        margin-bottom: 20px;
    }

    .form-control {
        border-radius: 10px;
        padding: 15px;
        font-size: 1rem;
        margin-bottom: 20px;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: none;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        padding: 10px 25px;
        font-size: 1.1rem;
        border-radius: 10px;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .map-container iframe {
        width: 100%;
        height: 634px;
        border: 0;
        border-radius: 12px;
    }

    .contact-section .row {
        gap: 30px;
        /* Adding space between the map and the form */
    }
</style>


<!-- Contact Section -->
<section class="contact-section">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container">
        <div class="row">
            <!-- Map Section -->
            <div class="col-md-5">
                <div class="map-container">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3806.667689862088!2d83.20597221500442!3d17.806166684306526!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a395bb6a0ba70d1%3A0x1711e307e92fb565!2s17%C2%B048'22.2%22N%2083%C2%B012'21.5%22E!5e0!3m2!1sen!2sin!4v1696332823161!5m2!1sen!2sin"
                        width="100%" height="646px" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>

                </div>
            </div>

            <!-- Contact Form Section -->
            <div class="col-md-6">
                <div class="contact-form">
                    <h4>Contact Us</h4>
                    <form action="{{ route('send.contact.email') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name"
                                required value="{{ auth()->check() ? auth()->user()->name : '' }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Your Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Enter your email" required
                                value="{{ auth()->check() ? auth()->user()->email : '' }}">
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject"
                                placeholder="Enter the subject" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Your Message</label>
                            <textarea class="form-control" id="message" name="message" rows="5"
                                placeholder="Enter your message" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection