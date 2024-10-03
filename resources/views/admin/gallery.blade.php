@extends('layouts.admin')

@section('content')
<style>
    .gallery-section {
        padding: 20px;
    }

    .btn {
        transition: all 0.3s ease;
    }

    .table {
        margin-top: 20px;
        width: 100%;
        text-align: center;
    }

    .table img {
        border-radius: 5px;
        object-fit: cover;
    }

    .drag-drop-zone {
        background-color: #f8f9fa;
        border: 2px dashed #007bff;
        text-align: center;
        padding: 40px;
        border-radius: 10px;
        transition: background-color 0.3s ease;
    }

    .drag-drop-zone:hover {
        background-color: #e9ecef;
    }

    #uploadBtn {
        background-color: #28a745;
        color: white;
    }

    #uploadBtn:hover {
        background-color: #218838;
    }

    #selectFiles {
        color: white;
        background-color: #007bff;
    }

    #selectFiles:hover {
        background-color: #0056b3;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.05);
    }

    .table-hover tbody tr:hover {
        background-color: rgba(0, 123, 255, 0.1);
    }

    /* Style the DataTables search and pagination */
    .dataTables_wrapper .dataTables_filter {
        float: right;
        text-align: left;
    }

    .dataTables_wrapper .dataTables_paginate {
        float: right;
        margin-top: 10px;
    }

    /* Optional: Make the DataTables header more modern */
    .table thead {
        background-color: #343a40;
        color: white;
    }

    /* Align images in the center of the table cells */
    td img {
        display: block;
        margin: 0 auto;
        border-radius: 5px;
        width: 80px;
        height: auto;
    }
</style>
<section class="gallery-section">
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('success') }}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{ session('error') }}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Button to toggle the drag-and-drop form -->
        <button class="btn btn-primary mb-3" id="uploadBtn">Upload Images</button>

        <!-- Drag-and-Drop area (hidden by default) -->
        <div id="dragDropArea" style="display: none;">
            <form action="{{ route('admin.gallery.upload') }}" method="POST" enctype="multipart/form-data"
                id="uploadForm">
                @csrf
                <div class="drag-drop-zone p-4 border border-primary rounded">
                    <h5>Drag & Drop Images Here</h5>
                    <input type="file" name="images[]" id="fileInput" multiple hidden>
                    <button type="button" class="btn btn-secondary mt-3" id="selectFiles">Select Files</button>
                </div>

                <!-- Preview images -->
                <div class="row mt-3" id="imagePreview"></div>

                <button type="submit" class="btn btn-success mt-3 mb-3 text-center">Submit</button>
            </form>
        </div>

        <!-- Table to display uploaded images with DataTables -->
        <table id="imagesTable" class="table table-striped table-hover mt-4">
            <thead class="table-dark">
                <tr>
                    <th>Image</th>
                    <th>Uploaded Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($images as $image)
                    <tr>
                        <td><img src="{{ asset('uploads/gallery/' . $image->name) }}" alt="Image" width="100"></td>
                        <td>{{ $image->created_at->format('d M, Y') }}</td>
                        <td>
                            <form action="{{ route('admin.delete.image', $image->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

<script>
    // Toggle the drag-and-drop form
    document.getElementById('uploadBtn').addEventListener('click', function () {
        var dragDropArea = document.getElementById('dragDropArea');
        dragDropArea.style.display = (dragDropArea.style.display === 'none') ? 'block' : 'none';
    });

    // Trigger file input when clicking "Select Files"
    document.getElementById('selectFiles').addEventListener('click', function () {
        document.getElementById('fileInput').click();
    });

    // Preview selected images
    document.getElementById('fileInput').addEventListener('change', function () {
        var files = this.files;
        var previewContainer = document.getElementById('imagePreview');
        previewContainer.innerHTML = ''; // Clear previous previews

        if (files) {
            for (var i = 0; i < files.length; i++) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    var preview = document.createElement('div');
                    preview.classList.add('col-md-3', 'mb-3');
                    preview.innerHTML = `
                        <img src="${e.target.result}" class="img-fluid rounded">
                    `;
                    previewContainer.appendChild(preview);
                };
                reader.readAsDataURL(files[i]);
            }
        }
    });

    // Initialize DataTables for the images table
    $(document).ready(function () {
        $('#imagesTable').DataTable();
    });
</script>

@endsection