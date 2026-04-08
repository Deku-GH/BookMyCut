<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Barber Dashboard</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Style -->
    <style>
        body {
            background-color: #f5f5f5;
        }

        .sidebar {
            height: 100vh;
            background: #111;
            color: white;
            padding: 20px;
        }

        .sidebar a {
            color: white;
            display: block;
            margin: 15px 0;
            text-decoration: none;
        }

        .sidebar a:hover {
            color: #ffc107;
        }

        .card {
            border: none;
            border-radius: 10px;
        }

        .topbar {
            background: white;
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>

<body>

<div class="container-fluid">
    <div class="row">

        <!-- Sidebar -->
        <div class="col-md-2 sidebar">
            <h4>Barber</h4>

            <a href="#">Dashboard</a>
            <a href="#">Appointments</a>
            <a href="#">Clients</a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-danger mt-3 w-100">Logout</button>
            </form>
        </div>

        <!-- Main -->
        <div class="col-md-10">

            <!-- Topbar -->
            <div class="topbar d-flex justify-content-between align-items-center">
                <h4>Dashboard</h4>
                <span>Welcome, {{ auth()->user()->ferstname }}</span>
            </div>

            <!-- Content -->
            <div class="p-4">

                <div class="row">

                    <!-- Card 1 -->
                    <div class="col-md-4">
                        <div class="card p-3 shadow-sm">
                            <h5>Total Appointments</h5>
                            <h2>12</h2>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="col-md-4">
                        <div class="card p-3 shadow-sm">
                            <h5>Today Appointments</h5>
                            <h2>3</h2>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="col-md-4">
                        <div class="card p-3 shadow-sm">
                            <h5>Total Clients</h5>
                            <h2>8</h2>
                        </div>
                    </div>

                </div>

                <!-- Table -->
                <div class="mt-5">
                    <h4>Recent Appointments</h4>

                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th>Client</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>Ali</td>
                                <td>2026-04-10</td>
                                <td><span class="badge bg-success">Done</span></td>
                            </tr>

                            <tr>
                                <td>Yassine</td>
                                <td>2026-04-11</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
</div>

</body>
</html>