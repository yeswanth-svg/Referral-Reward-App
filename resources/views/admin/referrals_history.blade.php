@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{session('success')}}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{session('error')}}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="ibox">
            <div class="ibox-title d-flex justify-content-between align-items-center">
                <h5>Users</h5>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" id="tickersTable">
                    <thead>
                            <tr>
                                <th>#</th>
                                <th>Referral Name</th>
                                <th>Client Name</th>
                                <th>Client Email</th>
                                <th>Client Phone Number</th>
                                <th>Project Type</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="ihub-news-records">
                            @foreach($referrals as $referral)
                                <tr class="gradeX">
                                    <td>{{$loop->iteration}}</td>
                                    <td><img src="{{asset('uploads/profile/' . ($referral->user->image ?? 'avatar.jpg'))}}"
                                            style="width:24px; height: 24px; border-radius: 100px; margin-right:12px;"
                                            alt="">{{$referral->user->name}}</td>
                                    <td>{{$referral->name}}</td>
                                    <td>{{$referral->email}}</td>
                                    <td>{{$referral->phone_number}}</td>
                                    <td>{{$referral->project_type}}</td>
                                    <td>
                                        <form action="{{ route('admin.update-status', $referral->lead_id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" class="form-select" onchange="this.form.submit()">
                                                <option value="not_started" {{ $referral->status == 'not_started' ? 'selected' : '' }}>Not Started</option>
                                                <option value="in_progress" {{ $referral->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                                <option value="completed" {{ $referral->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                                <option value="cancelled" {{ $referral->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                            </select>
                                        </form>
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
</script>
@endsection