
<!DOCTYPE html>
<html lang="en" style="font-size: 13px;font-family: Raleway, sans-serif;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="eQbXORxuUVwgAEXrCIIraBitvMoWKe7Q6NfM5mcS">
    <link rel="icon" href="https://winnicode.com/mazer/images/logo.png" />
    <title>PT . Winnicode Garuda Teknologi</title>
    <meta name="description" content="Winnicode Merupakan Layanan Media dan Media Digital yang bergerak di bidang Publikasi yang memiki peran penting dalam jurnalistik dan wadah Digital.">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

    <!--template publikasi-->
    <!-- Vendor css -->
    <link rel="stylesheet" href="https://winnicode.com/template-publikasi/src/vendors/@mdi/font/css/materialdesignicons.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
</head>

<body class="d-flex flex-column min-vh-100" style="font-family: Raleway, sans-serif;">
    <style>
    /* Add the below transitions to allow a smooth color change similar to lyft */
    .navbar {
        -webkit-transition: all 0.6s ease-out;
        -moz-transition: all 0.6s ease-out;
        -o-transition: all 0.6s ease-out;
        -ms-transition: all 0.6s ease-out;
        transition: all 0.6s ease-out;
    }

    .navbar.scrolled {
        background: rgb(68, 68, 68);
        /* IE */
        background: rgb(0, 0, 0);
        /* NON-IE */
    }
</style>
<nav class="navbar navbar-dark navbar-expand-md py-3" style="font-family: Raleway, sans-serif;padding-left: 35px;padding-right: 35px;background: rgb(0, 0, 0);">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="https://winnicode.com/mazer/images/nav-banner-logo.png" alt="Logo" width="270" height="108" class="">
        </a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navcol-2"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse p-4" style="font-size: 14px;" id="navcol-2">
            <ul class="navbar-nav fw-bold ms-auto">
                <li class="nav-item fw-bold"><a class="nav-link active" data-bss-hover-animate="pulse" href="/">BERANDA</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        PENGUMUMAN
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="https://winnicode.com/daftar-magang-mbkm">Informasi Pendaftaraan Magang</a></li>
                        <li><a class="dropdown-item" href="https://winnicode.com/informasi">Informasi Statistik Magang</a></li>
                        <li><a class="dropdown-item" href="https://winnicode.com/pengumuman/peserta">Informasi Peserta Magang</a></li>
                        <li><a class="dropdown-item" href="https://winnicode.com/pengumuman/bantuan">Informasi Bantuan Support</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        INFORMASI
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/PDF/company-profile.pdf">Profile Perusahaan</a></li>
                        <li><a class="dropdown-item" href="https://winnicode.com/informasi/struktur-organisasi">Struktur Perusahaan</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        BERITA
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="http://127.0.0.1:8000/articles">Artikel</a></li>
                        <li><a class="dropdown-item" href="http://127.0.0.1:8000/articles">Berita</a></li>
                    </ul>
                </li>
                <li class="nav-item fw-bold"><a class="nav-link" data-bss-hover-animate="pulse" href="/tentang">TENTANG</a></li>
                
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">MASUK</a>
                    </li>
                @else
                    <!-- Items to show when logged in -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">DASHBOARD</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('articles.createNew') }}">CREATE</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="form-inline">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link">LOGOUT</button>
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<script>
    /**
     * Listen to scroll to change header opacity class
     */
    function checkScroll() {
        var startY = $('.navbar').height() * 2; //The point where the navbar changes in px

        if ($(window).scrollTop() > startY) {
            $('.navbar').addClass("scrolled");
        } else {
            $('.navbar').removeClass("scrolled");
        }
    }

    if ($('.navbar').length > 0) {
        $(window).on("scroll load resize", function() {
            checkScroll();
        });
    }
</script>    
<main class="py-4">
        @yield('content')
    </main>
    <footer class="text-white" style="font-family: Raleway;padding-left: 35px;padding-right: 35px;  background: rgb(0, 0, 0);">
    <div class="container py-4 py-lg-5">
        <div class="row justify-content-center">
            <div class="col-sm-4-text-center  col-md-3 text-lg-start d-flex flex-column">
                <h3 class="fs-6 text-white">TAUTAN</h3>
                <ul class="list-unstyled">
                    <li data-bss-hover-animate="pulse">
                        <a class="navbar-brand" href="https://winnicode.com">
                            <svg width="1.2em" height="1.2em" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                                <g id="SVGRepo_bgCarrier" stroke-width="0" />

                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                                <g id="SVGRepo_iconCarrier">
                                    <g id="style=fill">
                                        <g id="web">
                                            <g id="Vector">
                                                <path d="M15.3222 10.383C15.3796 10.9457 15.4125 11.4903 15.4125 12C15.4125 12.9541 15.2972 14.0315 15.1208 15.1208C14.0315 15.2972 12.9541 15.4125 12 15.4125C11.0502 15.4125 9.97313 15.2975 8.87911 15.1205C8.70281 14.0312 8.5875 12.954 8.5875 12C8.5875 11.4905 8.62039 10.9458 8.67789 10.383C9.82608 10.5668 10.9715 10.6875 12 10.6875C13.0286 10.6875 14.174 10.5668 15.3222 10.383Z" fill="#ffffff" />
                                                <path d="M16.8752 10.0994C16.9462 10.7579 16.9875 11.399 16.9875 12C16.9875 12.8769 16.8997 13.8389 16.7599 14.8153C18.7425 14.4016 20.575 13.8731 21.5567 13.5722C21.8739 13.475 21.9986 13.4363 22.1658 13.3694C22.2494 13.336 22.326 13.302 22.4259 13.2543C22.4748 12.843 22.5 12.4244 22.5 12C22.5 10.878 22.324 9.79714 21.9982 8.78346L21.9133 8.81017C20.8868 9.12245 18.9652 9.6745 16.8752 10.0994Z" fill="#ffffff" />
                                                <path d="M21.4017 7.31948C20.3698 7.63221 18.579 8.14039 16.6599 8.53603C16.2178 5.84926 15.443 3.16951 15.0702 1.95598C17.8422 2.80227 20.1273 4.76467 21.4017 7.31948Z" fill="#ffffff" />
                                                <path d="M15.1117 8.82229C14.0253 8.99781 12.9513 9.1125 12 9.1125C11.0487 9.1125 9.97477 8.99781 8.88843 8.8223C9.30471 6.28005 10.0478 3.68306 10.4278 2.44333C10.525 2.12606 10.5637 2.00144 10.6306 1.83418C10.664 1.75062 10.698 1.67398 10.7457 1.57414C11.157 1.52518 11.5756 1.5 12 1.5C12.4434 1.5 12.8803 1.52748 13.3093 1.58083C13.3184 1.61564 13.3268 1.64679 13.3351 1.67626C13.3597 1.76333 13.3982 1.8857 13.4628 2.09104L13.4696 2.11261C13.7935 3.14223 14.6519 6.01401 15.1117 8.82229Z" fill="#ffffff" />
                                                <path d="M7.34004 8.536C7.7801 5.86107 8.54986 3.19576 8.92192 1.98181L8.92983 1.95597C6.15777 2.80225 3.8727 4.76465 2.59835 7.31946C3.63018 7.63219 5.42095 8.14036 7.34004 8.536Z" fill="#ffffff" />
                                                <path d="M2.00184 8.78345C1.67598 9.79714 1.5 10.878 1.5 12C1.5 12.4389 1.52693 12.8715 1.57923 13.2963L1.74471 13.3515L1.74603 13.3519L1.74765 13.3525L1.74879 13.3528C1.80205 13.3705 3.36305 13.886 5.41878 14.3975C5.99886 14.5418 6.61307 14.6844 7.24006 14.8151C7.10025 13.8388 7.0125 12.8769 7.0125 12C7.0125 11.3988 7.05374 10.7577 7.12472 10.0994C5.03428 9.67436 3.11218 9.12212 2.08597 8.80989L2.07883 8.80771L2.00184 8.78345Z" fill="#ffffff" />
                                                <path d="M12 16.9875C12.8769 16.9875 13.8389 16.8997 14.8153 16.7599C14.4016 18.7425 13.8731 20.575 13.5722 21.5566C13.475 21.8739 13.4363 21.9985 13.3694 22.1658C13.336 22.2494 13.302 22.326 13.2543 22.4259C12.843 22.4748 12.4244 22.5 12 22.5C11.5756 22.5 11.157 22.4748 10.7457 22.4259C10.698 22.326 10.664 22.2494 10.6306 22.1658C10.5637 21.9986 10.525 21.8739 10.4278 21.5567C10.1269 20.5751 9.59846 18.7427 9.18478 16.7603C10.1579 16.8996 11.1201 16.9875 12 16.9875Z" fill="#ffffff" />
                                                <path d="M5.0385 15.9259C3.73853 15.6024 2.63135 15.2775 1.95597 15.0702C2.97258 18.4002 5.59982 21.0274 8.92983 22.044L8.92192 22.0182C8.59705 20.9582 7.96897 18.7917 7.52191 16.4784C6.6525 16.3103 5.80722 16.1171 5.0385 15.9259Z" fill="#ffffff" />
                                                <path d="M22.0182 15.0781C20.9582 15.403 18.7915 16.0311 16.4781 16.4781C16.0311 18.7915 15.403 20.9581 15.0781 22.0182L15.0702 22.044C18.4002 21.0274 21.0274 18.4002 22.044 15.0702L22.0182 15.0781Z" fill="#ffffff" />
                                                <path d="M1.6103 13.323C1.64665 13.3277 1.67628 13.3327 1.68611 13.3349C1.69472 13.337 1.70821 13.3406 1.7131 13.3419L1.72391 13.345L1.72973 13.3468L1.73585 13.3487L1.74098 13.3503C1.7381 13.3494 1.67976 13.3348 1.6103 13.323Z" fill="#ffffff" />
                                            </g>
                                        </g>
                                    </g>
                                </g>

                            </svg> https://winnicode.com/</a>
                    </li>
                </ul>
                <ul class="list-unstyled">
                    <li data-bss-hover-animate="pulse">
                        <a class="navbar-brand" href="https://www.instagram.com/winnicodeofficial/">
                            <svg class="bi bi-instagram" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" data-bss-hover-animate="pulse">
                                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z">
                                </path>
                            </svg> Instagram Winnicode Garuda Teknologi</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-4-text-center col-md-2 text-lg-start d-flex flex-column">
                <h3 class="fs-6 text-white">SITEMAP</h3>
                <ul class="list-unstyled">
                    <li data-bss-hover-animate="pulse"><a class="link-light" href="/">Beranda</a></li>
                    <li data-bss-hover-animate="pulse"><a class="link-light" href="/informasi-magang">Informasi Magang</a></li>
                    <li data-bss-hover-animate="pulse"><a class="link-light" href="/pengumuman">Pengumuman</a></li>
                    <li data-bss-hover-animate="pulse"><a class="link-light" href="/tentang">Tentang</a></li>
                </ul>
            </div>
            <div class="col-sm-4-text-center col-md-3 text-lg-start d-flex flex-column">
                <h3 class="fs-6 text-white">KONTAK KAMI</h3>
                <ul class="list-unstyled">
                    <li>Bagian Kominfo</li>
                    <li>Divisi Development</li>
                    <li>E-Mail: winnicodegarudaofficial@gmail.com</li>
                    <li>Alamat: Bantul,Yogyakarta</li>
                    <li>CalL Center: 6285159932501 (24 Jam)</li>
                </ul>
            </div>
            <div class="col-lg-3 col-sm-text-center text-lg-start d-flex flex-column align-items-center order-first align-items-lg-start order-lg-last">
                <div class="fw-bold d-flex align-items-center mb-2">
                    <a class="navbar-brand d-flex align-items-center" data-bss-hover-animate="pulse" href="/">
                        <img src="https://winnicode.com/mazer/images/banner-logo.png" alt="Logo" width="216" height="48" class=""></a>
                    <a class="navbar-brand d-flex align-items-center" data-bss-hover-animate="pulse" href="/">
                        <img src="https://winnicode.com/mazer/images/bpd.png" alt="Logo" width="135" height="57,6" class=""></a>
                </div>
                <p class="text-white">Jurnalistik Program winnicode adalah program pengembangan sumber daya manusia
                    yang ditujukan bagi pemuda pemudi yang berkarir di dunia report.</p>
            </div>
        </div>
        <hr />
        <div class="d-flex justify-content-between align-items-center pt-3">
            <p class="mb-0">Copyright © 2024 PT. WINNICODE GARUDA TEKNOLOGI</p>
        </div>
    </div>
</footer>    <style>
        #btn-back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: none;
        }
    </style>
    <!-- Back to top button -->
    <button type="button" class="btn btn-light btn-floating btn-lg" id="btn-back-to-top">

        <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
        <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="Arrow / Arrow_Up_SM">
                <path id="Vector" d="M12 17V7M12 7L8 11M12 7L16 11" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </g>
        </svg>
    </button>
<script>
        //Get the button
        let mybutton = document.getElementById("btn-back-to-top");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction();
        };

        function scrollFunction() {
            if (
                document.body.scrollTop > 20 ||
                document.documentElement.scrollTop > 20
            ) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }
        // When the user clicks on the button, scroll to the top of the document
        mybutton.addEventListener("click", backToTop);

        function backToTop() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>

    <!-- select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script>
        $(document).ready(function() {
            $(".js-select2").select2({
                closeOnSelect: false,
                placeholder: "Pilih salah satu"
            });
        });
    </script>
    <!-- Include SweetAlert CSS and JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
                    });
    </script>
</body>

</html>