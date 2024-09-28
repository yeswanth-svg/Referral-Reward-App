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
                <h5>Credits for Products</h5>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" id="tickersTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Credits</th>
                                <th class="">Action</th>
                            </tr>
                        </thead>
                        <tbody id="ihub-news-records">
                            @foreach($credits as $credit)
                                <tr class="gradeX" style="cursor: pointer;">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$credit->service_name}}</td> <!-- Replace with actual product name -->
                                    <td>{{$credit->credit_value}}</td>
                                    <td class="">
                                        <button type="button" class="btn btn-dark btn-sm btn-block" id="edit_button"
                                            data-bs-toggle="modal" data-bs-target="#editRecord" data-id="{{$credit->id}}"
                                            data-credit_value="{{$credit->credit_value}}">
                                            <i class="fa fa-edit"> </i> Edit
                                        </button>
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

<!-- Edit Record Modal -->
<div class="modal fade" id="editRecord" tabindex="-1" aria-labelledby="editRecord" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Edit Credits</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.credits-update') }}" method="post" id="editRecordForm">
                    @csrf
                    <input type="hidden" name="id" id="edit_id">

                    <div class="row mb-2">
                        <div class="col-12">
                            <h4><label for="credit_value" class="form-label">Credits</label></h4>
                            <input type="number" class="form-control" name="credit_value" id="edit_credit_value"
                                required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="editRecordForm" class="btn btn-primary">Save changes</button>
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

        $('#editRecord').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var id = button.data('id');
            var credit_value = button.data('credit_value');

            $('#edit_id').val(id);
            $('#edit_credit_value').val(credit_value);
        });
    });
</script>
@endsection