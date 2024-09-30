@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<h1 class="mb-4">Welcome to the Admin Dashboard</h1>

<div class="row">
    <!-- Total Users Card -->
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm border-0 rounded-lg">
            <div class="card-header bg-info text-white d-flex align-items-center">
                <i class="fas fa-users fa-2x me-2"></i>
                <h5 class="mb-0">Total Users</h5>
            </div>
            <div class="card-body">
                <h2 class="card-title">{{ $total_partners }}</h2>
                <p class="card-text">Total number of registered users.</p>
            </div>
        </div>
    </div>

    <!-- Total Services Card -->
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm border-0 rounded-lg">
            <div class="card-header bg-success text-white d-flex align-items-center">
                <i class="fas fa-concierge-bell fa-2x me-2"></i>
                <h5 class="mb-0">Total Services</h5>
            </div>
            <div class="card-body">
                <h2 class="card-title">{{ $total_services }}</h2>
                <p class="card-text">Total number of available services.</p>
            </div>
        </div>
    </div>

    <!-- Total Leads Card -->
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm border-0 rounded-lg">
            <div class="card-header bg-warning text-white d-flex align-items-center">
                <i class="fas fa-bullhorn fa-2x me-2"></i>
                <h5 class="mb-0">Total Leads</h5>
            </div>
            <div class="card-body">
                <h2 class="card-title">{{ $total_leads }}</h2>
                <p class="card-text">Total number of leads generated.</p>
            </div>
        </div>
    </div>
    <!-- Total Credits-->
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm border-0 rounded-lg">
            <div class="card-header bg-primary text-white d-flex align-items-center">
                <i class="fas fa-coins fa-2x me-2"></i>
                <h5 class="mb-0">Total Credits</h5>
            </div>
            <div class="card-body">
                <h2 class="card-title">{{ $total_credits }}</h2>
                <p class="card-text">Total amount of available credits.</p>
            </div>
        </div>
    </div>

</div>
@endsection