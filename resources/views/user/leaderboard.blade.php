@extends('layouts.app')
@section('content')
<!-- Include FontAwesome for medal icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<!-- Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<!-- Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<div class="container my-5">

    <div class="ibox">
        <div class="ibox-title d-flex justify-content-between align-items-center">
            <h5>Leaderboard</h5>
            <p><span class="fs-4 fw-bold text-info">Your Postion : {{$userPosition}}</span></p>
        </div>
        <div class="ibox-content">
            <!-- City Selection Form -->
            <form method="GET" action="{{ route('admin.leaderboard') }}">
                <div class="form-group col-md-4" style="margin-left:25pc;">
                    <select id="city" class="form-control" name="city" onchange="this.form.submit()">
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
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover dataTables-example" id="tickersTable">
                    <thead class="table-dark  text-center">
                        <th>Rank</th>
                        <th>User</th>
                        <th>City / Region</th>
                        <th>Total Credits</th>

                        <th>Referral Code</th>
                        </tr>
                    </thead>
                    <tbody id="leaderboard-body" class="text-center">
                        @foreach($topUsers as $index => $user)
                            <tr>
                                <td>
                                    @if($index + 1 === 1)
                                        <i class="fas fa-crown text-warning rank-medal"></i>
                                    @elseif($index + 1 === 2)
                                        <i class="fas fa-medal  rank-medal" style="color: #a09a9a !important;"></i>
                                    @elseif($index + 1 === 3)
                                        <i class="fas fa-medal rank-medal" style="color: #CD7F32 !important;"></i>
                                    @else
                                        {{ $index + 1 }}
                                    @endif
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{$user->city}}</td>
                                <td>{{ $user->total_credits }}</td>
                                <td>{{ $user->referral_code }}</td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>

</div>
<script>

    $(document).ready(function () {
        $(".alert").delay(2000).slideUp(200, function () {
            $(this).alert('close');
        });
        $('.dataTables-example').DataTable({
            pageLength: 10,
            responsive: true,
        });
        $('[data-toggle="tooltip"]').tooltip();

    });

    $(document).ready(function () {
        $('#city').select2({
            placeholder: "Select your city",
            allowClear: true
        });
    });


</script>
@endsection