<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard </title>
    <link rel="stylesheet" href="mazer/assets/css/main/app.css">
    <link rel="stylesheet" href="mazer/assets/css/main/app-dark.css">
    <link rel="shortcut icon" href="mazer/assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="mazer/assets/images/logo/favicon.png" type="image/png">

    <link rel="stylesheet" href="mazer/assets/css/shared/iconly.css">
</head>

<body>
    <div id="app">

        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <table>
                            <tr>

                                <td class="text-primary fw-bold" style="font-size:20px; width:30px; height:15px">
                                    App
                                </td>
                                <td class="mb-5" style="margin-left: -20px">
                                    <img src="mazer/assets/images/bg/kilau.jpeg" style="width: 140px; height:50px">
                                </td>
                            </tr>
                        </table>
                        <div class="theme-toggle d-flex gap-2  align-items-center mt-2">

                            <div class="form-check form-switch fs-6">
                                <input class="form-check-input  me-0 " type="checkbox" id="toggle-dark">
                                <label class="form-check-label"></label>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>
                        <li class="sidebar-item active ">
                            <a href="dashboard" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="program" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Program</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="layout-page">


            <div id="main">
                <header class="mb-3">
                    <a href="#" class="burger-btn d-block d-xl-none">
                        <i class="bi bi-justify fs-3"></i>
                    </a>
                </header>
                <div class="page-heading">
                    <h4>Dashboard </h4>
                </div>
                <div class="page-content">




                    <section class="row">
                        <div class="col-12 col-lg-12 mt-3">
                            <div class="row">
                                <div class="col-6 col-lg-3 col-md-6">
                                    <div class="card">
                                        <div class="card-body px-4 py-4-5">
                                            <div class="row">
                                                <div
                                                    class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                                    <div class="stats-icon purple mb-2">
                                                        <i class="iconly-boldBookmark"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                    <h6 class="text-muted font-semibold">Total Program</h6>
                                                    <h4 class="font-extrabold mb-0">{{ $jumlahProgram }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8106.422429771728!2d108.32261587936122!3d-6.330614748087197!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6eb954f082d9cf%3A0x2c7c13ed336affef!2sKilau%20Cabang%20Indramayu!5e0!3m2!1sen!2sid!4v1719934803843!5m2!1sen!2sid"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>


                    </section>
                </div>
            </div>

            {{-- FOOTER --}}
        </div>
    </div>
    <script src="mazer/assets/js/bootstrap.js"></script>
    <script src="mazer/assets/js/app.js"></script>

    <!-- Need: Apexcharts -->
    <script src="mazer/assets/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="mazer/assets/js/pages/dashboard.js"></script>

</body>

</html>
