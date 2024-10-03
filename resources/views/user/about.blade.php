@extends('layouts.main')
@section('content')

<style>
    .hero-section {
        background: #f8f9fa;
        padding: 80px 0;
        text-align: center;
    }

    .about-content {
        padding: 40px 0;
    }

    .about-content h2 {
        font-size: 2.5rem;
        margin-bottom: 20px;
    }

    .icon-box {
        font-size: 3rem;
        color: #007bff;
    }

    .card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out;
    }

    .card:hover {
        transform: translateY(-10px);
    }


    .hero-section {
        background-color: #f8f9fa;
        padding: 60px 0;
    }

    .hero-section h1 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 30px;
    }

    .about-list {
        list-style-type: disc;
        padding-left: 40px;
        font-size: 1.1rem;
        line-height: 1.8;
        text-align: left;
    }

    .about-list li {
        margin-bottom: 15px;
    }

    /* for the mission and vision css */
    .mission-vision-section {
        background-color: #f8f9fa;
        padding: 60px 0;
    }

    .mission-vision-section h2 {
        font-size: 2.5rem;
        font-weight: bold;
        color: #007bff;
    }

    .mission-vision-section h3 {
        font-size: 1.8rem;
        font-weight: bold;
        color: #343a40;
    }

    .mission-vision-section p {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #555;
    }

    .core-values-list {
        list-style-type: none;
        padding-left: 0;
        font-size: 1.1rem;
        line-height: 1.8;
    }

    .core-values-list li {
        margin-bottom: 15px;
        position: relative;
        padding-left: 30px;
    }

    .core-values-list li::before {
        content: "\2022";
        color: #007bff;
        font-weight: bold;
        font-size: 1.5rem;
        position: absolute;
        left: 0;
        top: 0;
    }

    strong {
        color: black !important;
    }
</style>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <h1 class="display-4 text-center">About Us</h1>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <ul class="about-list">
                    <li style="list-style:disc;">Founded in 2017, Desire 2 Design (D21 Engineers) has rapidly emerged as
                        a leading
                        engineering
                        and design firm in India. We specialize in offering a comprehensive range of services in
                        structural designing, architectural designing, interior designing, construction, NDT services,
                        project monitoring, and student internships. Our commitment to delivering high-quality,
                        innovative, and sustainable design solutions has earned us a strong reputation across various
                        sectors.</li>

                    <li style="list-style:disc;">Desire 2 Design has successfully completed over 300 projects in the
                        last seven years, delivering
                        excellence in structural design, architectural design, interior design, NDT services,
                        construction, and project management.</li>

                    <li style="list-style:disc;">Led by our Managing Director, Mr. S Soma Sekhar Naidu, our team of
                        dedicated professionals is
                        passionate about transforming visions into reality. We integrate cutting-edge technology with
                        industry best practices to meet and exceed client expectations in every project we undertake.
                    </li>

                    <li style="list-style:disc;">Our approach is centered around delivering precise and efficient
                        solutions that not only fulfill
                        the functional needs but also elevate aesthetic appeal. With years of expertise, we ensure
                        seamless project execution and effective project monitoring, maintaining the highest standards
                        in quality and safety.</li>

                    <li style="list-style:disc;">At Desire 2 Design, we take pride in our collaborative approach,
                        working closely with clients to
                        understand their unique needs and goals, providing tailored solutions that ensure success and
                        satisfaction. Whether it's large-scale construction, detailed interior design, or precise
                        structural engineering, we bring unmatched expertise and creativity to every project.</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="mission-vision-section">
    <div class="container">
        <!-- Mission Statement -->
        <h2 class="text-center mb-5">Mission and Vision Statements</h2>
        <div class="row mb-4">
            <div class="col-lg-6">
                <h3 class="mb-3">Mission Statement</h3>
                <p>
                    At Desire 2 Design Engineers, our mission is to empower businesses and individuals through
                    innovative technology solutions, exceptional customer service, and a commitment to excellence. We
                    strive to make a positive impact in our community and be a trusted partner for our clients.
                </p>
            </div>
            <div class="col-lg-6">
                <h3 class="mb-3">Vision Statement</h3>
                <p>
                    Our vision is to be a leading construction company, recognized for our expertise, creativity, and
                    passion for delivering exceptional results. We aim to foster a culture of innovation, collaboration,
                    and continuous learning, where our team members can grow and thrive.
                </p>
            </div>
        </div>

        <!-- Core Values Section -->
        <div class="core-values mt-5">
            <h3 class="mb-4">Core and Cultural Values</h3>
            <ul class="core-values-list">
                <li><strong>Customer Focus:</strong> Delivering exceptional service and support,
                    encouraging open
                    communication and feedback.</li>
                <li><strong>Excellence:</strong> Striving for quality and precision in everything we
                    do, recognizing and
                    rewarding outstanding performance.</li>
                <li><strong>Collaboration:</strong> Working together to achieve common goals,
                    supporting work-life
                    balance and employee well-being.</li>
                <li><strong>Giving Back:</strong> Giving back to our community through volunteer work
                    and charitable
                    initiatives.</li>
                <li><strong>Continuous Learning:</strong> Embracing growth and development
                    opportunities.</li>
                <li><strong>Integrity:</strong> Acting with honesty, transparency, and ethics.</li>
            </ul>
        </div>
    </div>
</section>





<!-- About Section -->
<section class="about-content">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-md-4">
                <i class="fas fa-users icon-box"></i>
                <h3 class="mt-3">Who We Are</h3>
                <p>We are a leading consultancy firm specializing in architectural, structural, and civil engineering
                    services, delivering solutions that shape the future.</p>
            </div>
            <div class="col-md-4">
                <i class="fas fa-briefcase icon-box"></i>
                <h3 class="mt-3">Our Services</h3>
                <p>From soil investigation to structural audits, we offer a comprehensive range of consultancy services
                    across India.</p>
            </div>
            <div class="col-md-4">
                <i class="fas fa-handshake icon-box"></i>
                <h3 class="mt-3">Our Clients</h3>
                <p>We work with esteemed clients like AIIMS, Military Engineer Services, and the Agricultural Department
                    of Andhra Pradesh.</p>
            </div>
        </div>
        <h2 class="text-center mb-5">Our Prestigeous Projects</h2>
        <div class="row">
            <!-- Card 1 -->
            <div class="col-md-4 mb-4">
                <div class="card p-3">
                    <h5 class="card-title">Provision of Mother and Child Unit - AIIMS</h5>
                    <p class="card-text"><strong>Location:</strong> AIIMS BIBINAGAR, Telangana</p>
                    <p class="card-text"><strong>Project Value:</strong> ₹ 14.3 Cr</p>
                    <p class="card-text"><strong>Consultancy Fee:</strong> ₹ 14,40,000</p>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="col-md-4 mb-4">
                <div class="card p-3">
                    <h5 class="card-title">Submarine Equipment Storage - MES</h5>
                    <p class="card-text"><strong>Location:</strong> Visakhapatnam</p>
                    <p class="card-text"><strong>Value:</strong> ₹ 12 Cr</p>
                    <p class="card-text"><strong>Consultancy Fee:</strong> ₹ 12,81,000</p>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="col-md-4 mb-4">
                <div class="card p-3">
                    <h5 class="card-title">Quarantine Facility for Sailors - MES</h5>
                    <p class="card-text"><strong>Location:</strong> INS Circar, Visakhapatnam</p>
                    <p class="card-text"><strong>Value:</strong> ₹ 12.5 Cr</p>
                    <p class="card-text"><strong>Consultancy Fee:</strong> ₹ 12,58,000</p>
                </div>
            </div>
        </div>
    </div>
</section>




@endsection