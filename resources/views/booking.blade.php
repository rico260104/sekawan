<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Booking - Pemesanan</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    {{-- datatable --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Trackku</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="#!">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Tracking</div>
                        <a class="nav-link" href="/">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Booking</div>
                        <a class="nav-link" href="charts.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Booking
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Admin
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Booking</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Booking</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="{{ route('booking.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-3">
                                        <select class="form-select" aria-label="Default select example" name="mobil">
                                            <option selected>Nama Mobil</option>
                                            <option value="Avanza">Avanza </option>
                                            <option value="Xenia">Xenia </option>
                                            <option value="Ayla">Ayla </option>
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <select class="form-select" aria-label="Default select example" name="nopol">
                                            <option selected>Nomer Polisi</option>
                                            <option value="A 1324 ZX">A 1324 ZX </option>
                                            <option value="B 2435 NM">B 2435 NM </option>
                                            <option value="L 3546 AS">L 3546 AS </option>
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <input type="datetime-local" class="form-control" placeholder="Tanggal"
                                            name="tgl_sewa" id="timeInput" onchange="timeIn()">
                                    </div>
                                    <div class="col-3">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-4">
                                        <select class="form-select" aria-label="Default select example" name="mobil">
                                            <option selected>Nama Sopir</option>
                                            <option value="1">Budi Santoso </option>
                                            <option value="2">Suprianto </option>
                                            <option value="3">Made Gede  </option>
                                        </select>
                                    </div>
                               
                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- table --}}
                    <div class="card mb-4">
                        <div class="card-body">
                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama Kendaraan</th>
                                        <th>Nomer Polisi</th>
                                        <th>Tanggal Sewa</th>
                                        <th>Tanggal Kembali </th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $booking)
                                        <tr>
                                            <td>{{ $booking->name }}</td>
                                            <td>{{ $booking->nopol }}</td>
                                            <td>{{ $booking->tgl_sewa }}</td>
                                            <td>{{ $booking->tgl_kembali }}</td>
                                            <td>
                                                @if ($booking->status == null)
                                                    Belum DiSetujui
                                                    @elseif ($booking->status == 0) 
                                                    Tidak DiSetujui 
                                                    @elseif ($booking->status == 1) 
                                                    DiKonfirmasi
                                                    @else 
                                                    DiSetujui
                                                @endif
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2024</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    {{-- datatable --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>

    <script>
        $('#example').DataTable({

        })

        function timeIn() {
            let timeInput = document.getElementById('timeInput');
            let timeValue = timeInput.value;
            console.log(timeValue);
        }
    </script>
</body>

</html>
