<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@400;500;800&family=Red+Hat+Text:wght@400;500;700&display=swap" rel="stylesheet">
    <title>Smart Parking</title>
</head>

<body style="background-color: #E7EFF6;" id="home">

    <!-- navbar -->
    <header>
        <nav class="navbar navbar-expand navbar-dark shadow p-3 mb-5" style="background-color: #2A4D69;">
            <div class="nav-item">
                <span class="navbar-brand ">Smart Parking</span>
            </div>
            <div class=" navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link " href="#home">Awal </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">Tentang </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Hubungi </a>
                </li>
            </div>
            <div class="navbar-nav ml-auto">
                <div class="dropdown">
                    <a class="btn rounded-pill align-middle shadow-sm" href="{{ route('login') }}" aria-haspopup="true" aria-expanded="false" style="background-color: #63ACE5;">
                        <span class="txt-button" style="color: white;">Pesan Parkir</span>
                    </a>
                </div>
            </div>
        </nav>
    </header>
    <!-- penutup navbar -->

    <!-- sesi home -->
    <home>
        <div class="container-fluid text-center">
            <div class="home">
                <div class="header_home">
                    <h1 class="judul_home">Temukan dan Bayar <br> Untuk Tempat Parkir Anda !</span></h1>
                    <h5> Lokasi smart parking yang tersedia di mall Jakarta </h5>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="card-deck ">
                        <div class="card shadow">
                            <img class="card-img-top" src="{{ asset('img/mall/pacific_place.jpg') }}" alt="Card image cap">
                        </div>
                        <div class="card shadow ">
                            <img class="card-img-top" src="{{ asset('img/mall/gi.png') }}" alt=" Card image cap">
                        </div>
                        <div class="card shadow ">
                            <img class="card-img-top" src="{{ asset('img/mall/pim.jpg') }}" alt=" Card image cap">
                        </div>
                        <div class="card shadow ">
                            <img class="card-img-top" src="{{ asset('img/mall/plaza_indonesia.jpg') }}" alt=" Card image cap">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </home>
    <!-- penutup sesi home -->

    <!-- sesi about us -->

    <div class="" id="about"></div>
    <aboutus>
        <div class="container">
            <h1 class=" judul_aboutus text-center p-5"> Mengapa Harus <br> Menggunakan Smart Parking ?</h1>
            <div class=" card-deck">
                <div class="card shadow">
                    <div class="card-body text-center">
                        <img class=" card-img-top" src="{{ asset('img/icon/mobil.png') }}" alt="Card image cap" style="height: 60px ; width: 50px;">
                        <h5 class="card-title">Parkir Lebih Mudah</h5>
                        <p class="card-text text-left">Anda bisa memilih parkir
                            dimanapun anda berada.
                            Dan anda bisa tahu tempat yang kosong untuk mobil anda.</p>
                    </div>
                </div>
                <div class="card shadow">
                    <div class="card-body text-center">
                        <img class="card-img-top" src="{{ asset('img/icon/waktu.png') }}" alt="Card image cap" style="height: 65px ; width: 83px;">
                        <h5 class="card-title">Menghemat Waktu</h5>
                        <p class="card-text text-left">Anda tidak perlu memerlukan waktu yang lama untuk mencari tempat parkir yang kosong.</p>
                    </div>
                </div>
                <div class="card shadow">
                    <div class="card-body text-center">
                        <img class="card-img-top" src="{{ asset('img/icon/pay.png') }}" alt="Card image cap" style="height: 68px ; width: 87px;">
                        <h5 class="card-title">Bayar Secara Online</h5>
                        <p class="card-text text-left">Anda bisa membayar secara online menggunakan M-Banking.</p>
                    </div>
                </div>
            </div>
        </div>
    </aboutus>
    <!-- penutup sesi about us -->

    <!-- sesi contact -->
    <contact id="contact">
        <div class=" container d-flex justify-content-center">
            <div class="card shadow border-0">
                <div class="card-body ">
                    <div class="card-title rounded-pill text-center shadow-sm" style="background-color: #ADCBE3;">
                        <h5 class="text-center" style="color: black;">Hubungi Kami</h5>
                    </div>
                    <div class="card-body  p-5">
                        <div class="row ml-auto">
                            <div class="col text-center">
                                <div class="aa">
                                    <img class="card-img-top1" src="{{ asset('img/icon/email_contact.png') }}" style="height: 91px ; width: 91px;">
                                    <br>
                                    <h6> PRODUCT </h6> <a> smartparking@gmail.com <br> 24 Jam</a>
                                </div>
                            </div>
                            <div class="col text-center">
                                <div class="bb">
                                    <img class="card-img-top2" src="{{ asset('img/icon/smartphone.png') }}" style="height: 91px ; width: 91px;">
                                    <br>
                                    <h6 class="h6"> PRODUCT </h6> <a> +62 813-1123-321 <br> 24 Jam</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </contact>
    <!-- penutup contact -->
    <img class="wave" src="{{ asset('img/bg/wave.png') }}">
    <!-- copyright -->
    <copyright>
        <div class="container-fluid text-center p-4" style="background-color: #18364F; height: 80px ; max-width: 100%;">
            <a style="color: white;">©Smart Parking</a>
        </div>
    </copyright>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src=" https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
</body>

</html>