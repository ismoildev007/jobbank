@extends('layouts.layout')

@section('content')
    <style>


        .card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            padding: 20px;
            margin: 20px;
        }

        .card-header {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 15px;
            color: #333;
        }

        .card-body {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .file-upload {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
        }

        .file-upload input[type="file"] {
            display: none;
        }

        .file-upload:hover {
            background-color: #0056b3;
        }

        .nxl-container {
            position: relative;
            top: 90px !important;
            margin-left: 280px;
            min-height: calc(100vh - 80px);
            transition: all .3s ease;
        }

    </style>
    <main class="nxl-container">
        <div class="nxl-content">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="card mt-2">
                <div class="card-header">
                    Natijani Yuklash
                </div>
                <form action="{{ route('file.import') }}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="card-body">
                        <label for="fileInput" class="file-upload">
                            <span id="fileLabel">Fayl tanlang</span>
                            <input name="file" type="file" id="fileInput" onchange="updateFileName()">
                        </label>
                    </div>

                    <button type="submit">Import Students</button>
                </form>
            </div>
        </div>
        <!-- [ Footer ] start -->
        <footer class="footer">
            <p class="fs-11 text-muted fw-medium text-uppercase mb-0 copyright">
                <span>Copyright ©</span>
                <script>
                    document.write(new Date().getFullYear());
                </script>
            </p>
            <div class="d-flex align-items-center gap-4">
                <a href="javascript:void(0);" class="fs-11 fw-semibold text-uppercase">Help</a>
                <a href="javascript:void(0);" class="fs-11 fw-semibold text-uppercase">Terms</a>
                <a href="javascript:void(0);" class="fs-11 fw-semibold text-uppercase">Privacy</a>
            </div>
        </footer>
        <!-- [ Footer ] end -->
    </main>

    <script>
        function updateFileName() {
            const fileInput = document.getElementById('fileInput');
            const fileLabel = document.getElementById('fileLabel');

            if (fileInput.files.length > 0) {
                fileLabel.textContent = fileInput.files[0].name;
            } else {
                fileLabel.textContent = 'Fayl tanlang';
            }
        }
    </script>
@endsection

