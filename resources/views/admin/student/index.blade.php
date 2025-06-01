<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student List</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <style>

        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .nxl-container {
            margin: 20px;
        }
        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
            border-bottom: 2px solid #0056b3;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            padding: 15px;
        }
        .card-body {
            padding: 20px;
        }
        .btn-back {
            margin-bottom: 20px;
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-back:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .table {
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
        }
        .table th, .table td {
            text-align: left;
            vertical-align: middle;
            padding: 12px;
            border-bottom: 1px solid #dee2e6;
        }
        .table thead th {
            background-color: #fff;
            color: black;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f2f2f2;
        }
        .table-hover tbody tr:hover {
            background-color: #e9ecef;
        }
        .table-actions {
            display: flex;
            gap: 10px;
        }
    </style>
</head>
<body>

<main class="nxl-container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="mb-0">Student List</h3>
            <a href="{{ route('file.index') }}" class="btn btn-secondary btn-back">Back</a>
        </div>

        <div class="card-body">
            <!-- Sana filtrlarini qo'shish -->
            <form id="filter-form" method="GET" action="{{ route('students.index') }}" class="mb-3">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="start_date">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date"
                               value="{{ request('start_date') ?: \Carbon\Carbon::now()->subWeek()->format('Y-m-d') }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="end_date">End Date</label>
                        <input type="date" class="form-control" id="end_date" name="end_date"
                               value="{{ request('end_date') ?: \Carbon\Carbon::now()->format('Y-m-d') }}">
                    </div>
                    <div class="form-group col-md-4">
                     <button type="submit" class="btn  btn-primary mt-4">Filter</button>
                    </div>
                </div>

            </form>

            <!-- Jadval -->
            <table id="students-table" class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Number</th>
                    <th>Name</th>
                    <th>A1</th>
                    <th>A2</th>
                    <th>Maj1</th>
                    <th>Maj2</th>
                    <th>Maj3</th>
                    <th>Total Score</th>
                    <th>Phone</th>
                    <th>School</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->number ?? 0 }}</td>
                        <td>{{ $student->name  ?? 0}}</td>
                        <td>{{ $student->a1  ?? 0}}</td>
                        <td>{{ $student->a2  ?? 0}}</td>
                        <td>{{ $student->maj1 ?? 0 }}</td>
                        <td>{{ $student->maj2  ?? 0}}</td>
                        <td>{{ $student->maj3  ?? 0}}</td>
                        <td>{{ $student->total_score ?? 0}}</td>
                        <td>{{ $student->phone  ?? 0}}</td>
                        <td>{{ $student->school  ?? 0}}</td>
                        <td class="table-actions">
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>

<!-- jQuery va DataTables JS fayllarini o'z vaqtida yuklash -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<!-- DataTables-ni ishga tushirish -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#students-table').DataTable({
            "order": [[0, "asc"]], // "Number" ustuni bo'yicha saralash
            "paging": true,        // Sahifalashni yoqish
            "searching": true,     // Qidiruv funksiyasini yoqish
            "info": true,          // Jadval haqida ma'lumot ko'rsatish
            "lengthChange": true,  // Sahifada nechta qator ko'rsatilishini o'zgartirish
            "columnDefs": [
                { "orderable": false, "targets": 10 } // "Actions" ustunini saralanmaydigan qilib belgilash
            ],
            "language": {
                "lengthMenu": "Show _MENU_ entries per page",
                "zeroRecords": "No students found",
                "info": "Showing page _PAGE_ of _PAGES_",
                "infoEmpty": "No records available",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "search": "Search:",
                "paginate": {
                    "first": "First",
                    "last": "Last",
                    "next": "Next",
                    "previous": "Previous"
                }
            }
        });
    });
</script>

</body>
</html>
