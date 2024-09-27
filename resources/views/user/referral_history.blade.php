@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Referral History</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Referral History</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Your Recent Referral History</h5>
                </div>
                <div class="card-body">
                    <table id="zero-config" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th data-ordering="false">ID</th>
                                <th>Client Name</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>Project Type</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($referrals as $key => $referral)
                                                        <tr>
                                                            <td>{{ $key + 1 }}</td>
                                                            <td>{{ $referral->name }}</td>
                                                            <td>{{ $referral->phone_number }}</td>
                                                            <td>{{ $referral->email }}</td>
                                                            <td>{{ $referral->project_type  }}</td>
                                                            @if ($referral->status == 'in_progress')
                                                                <td class="text-info fw-bold">In Progress</td>
                                                            @elseif ($referral->status == 'completed')
                                                                <td class="text-success fw-bold">Completed</td>
                                                            @elseif ($referral->status == 'not_started')
                                                                <td class="text-warning fw-bold">Not Started</td>
                                                            @else
                                                                <td class="text-danger fw-bold">Cancelled</td>
                                                            @endif

                                                            <td>
                                                                @php
                                                                    $datetime = \Carbon\Carbon::createFromDate($referral->created_at);
                                                                    echo $datetime->format('d/m/y');
                                                                @endphp
                                                            </td>
                                                        </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    new DataTable('#zero-config');
</script>
@endsection