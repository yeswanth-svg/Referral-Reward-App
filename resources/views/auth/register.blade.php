@extends('layouts.main')
@section('content')
<section class="page-title centred">
    <div class="pattern-layer" style="background-image: url(assets/images/background/page-title.jpg);"></div>
    <div class="auto-container">
        <div class="content-box">
            <h1>My Account</h1>
            <ul class="bread-crumb clearfix">
                <li><i class="flaticon-home-1"></i><a href="{{route('welcome')}}">Home</a></li>
                <li>My Account</li>
            </ul>
        </div>
    </div>
</section>
<section class="myaccount-section p-4">
    <div class="auto-container">
        <div class="row mx-auto">
            <div class="col-lg-6 mx-auto col-md-12 col-sm-12 inner-column">
                <div class="inner-box login-inner">
                    <div class="upper-inner">
                        <h3>Create An Account</h3>
                        <p>Register to access all your resources</p>
                    </div>
                    <form method="POST" action="{{ route('register') }}" class="default-form"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mx-auto">
                            @if(Session::has('error'))
                                <div class="alert alert-danger">{{ Session::get('error') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Your name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email address</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input id="c_password" type="password" class="form-control" name="password_confirmation"
                                required>

                        </div>

                        <div class="form-group">
                            <label>Area / Village</label>
                            <input id="area" type="text" class="form-control @error('area') is-invalid @enderror"
                                name="area" value="{{ old('area') }}" required autocomplete="area" autofocus>

                            @error('area')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="city">City</label>
                            <select id="city" class="form-control" name="city" required autofocus>
                                <option value="" disabled selected>Select your city</option>
                                <option value="Visakhapatnam">Visakhapatnam</option>
                                <option value="Amaravati">Amaravati</option>
                                <option value="Guntur">Guntur</option>
                                <option value="Vijayawada">Vijayawada</option>
                                <option value="Nellore">Nellore</option>
                                <option value="Kurnool">Kurnool</option>
                                <option value="Anantapur">Anantapur</option>
                                <option value="Tirupati">Tirupati</option>
                                <option value="Eluru">Eluru</option>
                                <option value="Rajamahendravaram">Rajamahendravaram</option>
                                <option value="Bhimavaram">Bhimavaram</option>
                                <option value="Kakinada">Kakinada</option>
                                <option value="Ongole">Ongole</option>
                                <option value="Chittoor">Chittoor</option>
                                <option value="Kadapa">Kadapa</option>
                                <option value="Tenali">Tenali</option>
                                <option value="Tadipatri">Tadipatri</option>
                                <option value="Gannavaram">Gannavaram</option>
                                <option value="Dharmavaram">Dharmavaram</option>
                                <option value="Narsapur">Narsapur</option>
                                <option value="Yellamanchili">Yellamanchili</option>
                                <option value="Bapatla">Bapatla</option>
                                <option value="Srikakulam">Srikakulam</option>
                                <option value="Gajuwaka">Gajuwaka</option>
                                <option value="Madanapalle">Madanapalle</option>
                                <option value="Kavali">Kavali</option>
                                <option value="Pamarru">Pamarru</option>
                                <option value="Nuzvid">Nuzvid</option>
                                <option value="Tadepalligudem">Tadepalligudem</option>
                                <option value="Chilakaluripet">Chilakaluripet</option>
                                <option value="Gudivada">Gudivada</option>
                                <option value="Mandapeta">Mandapeta</option>
                                <option value="Nandigama">Nandigama</option>
                                <option value="Sullurpeta">Sullurpeta</option>
                                <option value="Jaggayyapeta">Jaggayyapeta</option>
                                <option value="Guntakal">Guntakal</option>
                                <option value="Anakapalle">Anakapalle</option>
                                <option value="Kurnool City">Kurnool City</option>
                                <option value="Kodad">Kodad</option>
                                <option value="Adoni">Adoni</option>
                                <option value="Narsipatnam">Narsipatnam</option>
                                <option value="Macherla">Macherla</option>
                                <option value="Giddalur">Giddalur</option>
                                <option value="Yemmiganur">Yemmiganur</option>
                                <option value="Pithapuram">Pithapuram</option>
                                <option value="Vuyyuru">Vuyyuru</option>
                                <option value="Rayachoty">Rayachoty</option>
                                <option value="Malleswaram">Malleswaram</option>
                                <option value="Paderu">Paderu</option>
                                <option value="Kanigiri">Kanigiri</option>
                                <option value="Gudur">Gudur</option>
                                <option value="Parvathipuram">Parvathipuram</option>
                                <option value="Satyavedu">Satyavedu</option>
                                <option value="Tuni">Tuni</option>
                                <option value="Khammam">Khammam</option>
                                <option value="Nidadavole">Nidadavole</option>
                                <option value="Srikalahasti">Srikalahasti</moption>
                                <option value="Vemulawada">Vemulawada</option>
                                <option value="Dondaparthy">Dondaparthy</option>
                                <option value="Rajahmundry">Rajahmundry</option>
                                <option value="Kakinada Rural">Kakinada Rural</option>
                                <option value="Nagari">Nagari</option>
                                <option value="Thondamanu">Thondamanu</option>
                                <option value="Yeluru">Yeluru</option>
                                <option value="Gajapati Nagar">Gajapati Nagar</option>
                                <option value="Vanamamalai">Vanamamalai</option>
                                <option value="Kurnool District">Kurnool District</option>
                                <option value="Bhimavaram Rural">Bhimavaram Rural</option>
                                <option value="Peddapuram">Peddapuram</option>
                                <option value="Narsapuram Rural">Narsapuram Rural</option>
                                <option value="Narasaraopet">Narasaraopet</option>
                                <option value="Srikakulam Rural">Srikakulam Rural</option>
                                <option value="Kurnool Urban">Kurnool Urban</option>
                                <option value="Sullurpeta Rural">Sullurpeta Rural</option>
                                <option value="Kurnool Rural">Kurnool Rural</option>
                                <option value="Eluru Rural">Eluru Rural</option>
                                <option value="Khammam Rural">Khammam Rural</option>
                                <option value="Kurnool Urban">Kurnool Urban</option>
                                <option value="Sullurpeta Rural">Sullurpeta Rural</option>
                                <option value="Kurnool Rural">Kurnool Rural</option>
                                <option value="Eluru Rural">Eluru Rural</option>
                                <option value="Khammam Rural">Khammam Rural</option>
                                <option value="Kurnool Urban">Kurnool Urban</option>
                                <option value="Sullurpeta Rural">Sullurpeta Rural</option>
                                <option value="Kurnool Rural">Kurnool Rural</option>
                                <option value="Eluru Rural">Eluru Rural</option>
                                <option value="Khammam Rural">Khammam Rural</option>

                            </select>

                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="aadhar_number">Aadhar Number</label>
                            <input id="aadhar_number" type="text"
                                class="form-control @error('aadhar_number') is-invalid @enderror" name="aadhar_number"
                                value="{{ old('aadhar_number') }}" required autocomplete="aadhar_number">

                            @error('aadhar_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label>Profile Pic</label>
                            <input id="image" type="file" accept=".jpg,.png"
                                class="form-control @error('image') is-invalid @enderror" name="image"
                                value="{{ old('image') }}" required autocomplete="image" autofocus>

                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="theme-btn-two">Register<i
                                    class="flaticon-right-1"></i></button>
                        </div>
                    </form>
                    <div class="lower-inner centred">
                        <span>or</span>
                        <p>Already have an account? <a href="{{route('login')}}">Log In Now</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function () {
        // Destroy nice-select if it has already been applied
        $('#city').niceSelect('destroy');

        // Re-initialize nice-select for all other select boxes except the city
        $('select').not('#city').niceSelect();
    });


</script>
@endsection