<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Wedding Invitation</title>
    <link rel="stylesheet" href="{{ asset('build/assets/style.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" /> --}}
    <style>
        @font-face {
            font-family: 'Dellamonde';
            src: url({{ asset('fonts/Dellamonde.otf') }}) format('opentype');
            font-weight: normal;
            font-style: normal;
            padding: 0rem;
            margin: 0rem;
            word-spacing: 0rem
        }

        @font-face {
            font-family: 'Quaylike';
            src: url({{ asset('fonts/Quaylike.otf') }}) format('opentype');
            font-weight: normal;
            font-style: normal;
            padding: 0rem;
            margin: 0rem;
            word-spacing: 0rem
        }

        @font-face {
            font-family: 'A Suls';
            src: url({{ asset('fonts/A Suls Regular.ttf') }}) format('truetype');
            font-weight: normal;
            font-style: normal;
            padding: 0rem;
            margin: 0rem;
            word-spacing: 0rem
        }

        @font-face {
            font-family: 'Arabic Ejaza';
            src: url({{ asset('fonts/Arabic Ejaza Regular.ttf') }}) format('truetype');
            font-weight: normal;
            font-style: normal;
            padding: 0rem;
            margin: 0rem;
            word-spacing: 0rem
        }

        /* @font-face {
            font-family: 'DecoType';
            src: url('/public/fonts/DecoType Thuluth II Regular.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
            padding: 0rem;
            margin: 0rem;
            word-spacing: 0rem
        } */

        @keyframes slideInFromTop {
            from {
                transform: translateY(-100%);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .slide-in {
            opacity: 0;
            animation: opacity 1s ease-out;
        }

        .slide-in.visible {
            animation: slideInFromTop 2s forwards;
        }

        @keyframes slideOutToTop {
            0% {
                transform: translateY(100%);
                opacity: 0;
            }

            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .slide-out {
            opacity: 0;
            animation: opacity 1s ease-out;
        }

        .slide-out.visible {
            animation: slideOutToTop 2s forwards;
        }

        @keyframes slide-left {
            from {
                transform: translateX(-100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .slide-left {
            opacity: 0;
            animation: opacity 1s ease-out;
        }

        .slide-left.visible {
            animation: slide-left 2s forwards;
        }

        @keyframes slide-right {
            from {
                transform: translateX(100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .slide-right {
            opacity: 0;
            animation: opacity 1s ease-out;
        }

        .slide-right.visible {
            animation: slide-right 2s forwards;
        }

        /* .animated-background {
            position: relative;
            width: 100%;
            height: 100vh;
            background: linear-gradient(270deg, #c7ff5f, #69ffac);
            background: url({{ asset('img/2.jpg') }});
            background-size: 400% 400%;
            animation: gradientAnimation 5s ease infinite;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        @keyframes gradientAnimation {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        } */

        section {
            text-align: center;
            padding: 0px;
            background: url({{ asset('img/bg-hp.png') }}) repeat center center;
            background-size: cover;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        section h1 {
            margin: 0px;
            padding: 0px;
            color: #333;
        }

        section h5 {
            margin: 0px;
            padding: 0px;
            color: #333;
        }

        section p {
            margin: 0px;
            padding: 0px;
            color: #000000;
        }

        .background {
            top: 0;
            left: 0;
            width: 80% auto;
            height: 100% auto;
            overflow: hidden;
        }

        .bubble {
            position: absolute;
            top: -100px;
            width: 20px;
            height: 20px;
            background: rgba(182, 255, 159, 0.664);
            border-radius: 50%;
            animation: fall 5s infinite;
        }

        @keyframes fall {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(5500px);
            }
        }

        /* Definisikan animasi fadeIn */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .slide-zoomIn {
            opacity: 0;
            /* Sembunyikan elemen awalnya */
            transition: opacity 1s ease-in-out;
        }

        .slide-zoomIn.visible {
            animation: fadeIn 2s forwards;
            /* Terapkan animasi */
        }

        .custom-button {
            background-color: #007a10;
            /* Warna latar belakang tombol */
            color: #ffffff;
            /* Warna teks tombol */
            border: 1.5px solid #000;
            /* Warna dan ketebalan border */
            border-radius: 20px;
            /* Border radius kiri dan kanan 50% */
            text-decoration: none;
            /* Menghilangkan garis bawah */
            padding: 10px 20px;
            /* Padding dalam tombol */
            cursor: pointer;
            /* Mengubah kursor menjadi pointer saat di hover */
            display: inline-block;
            /* Membuat tombol sebagai elemen inline-block */
            font-size: 16px;
            /* Ukuran font */
            transition: background-color 0.3s, color 0.3s;
            /* Efek transisi saat tombol di-hover */
        }

        .custom-button:hover {
            background-color: #025e0e;
            /* Warna latar belakang saat di-hover */
            /* color: #000000; */
            /* Warna teks saat di-hover */
        }

        .button-modal {
            background-color: #007a10;
            color: #ffffff;
            border: 1.5px solid #000;
            border-radius: 20px;
            text-decoration: none;
            padding: 10px 20px;
            cursor: pointer;
            display: inline-block;
            font-size: 16px;
            transition: background-color 0.3s, color 0.3s;
        }

        .button-modal:hover {
            background-color: #025e0e;
            color: #ffffff;
        }

        .modal {
            display: none;
            /* Modal disembunyikan secara default */
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            /* Warna latar belakang hitam dengan transparansi */
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            border-radius: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            animation-name: modalopen;
            animation-duration: 0.4s;
            -webkit-border-radius: 20px;
            -moz-border-radius: 20px;
            -ms-border-radius: 20px;
            -o-border-radius: 20px;
        }

        .modal-header {
            padding: 5px;
            /* background-color: #f2f2f2; */
            border-bottom: 1px solid #777777;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .modal-header h2 {
            margin: 0;
        }

        @keyframes modalopen {
            from {
                opacity: 0
            }

            to {
                opacity: 1
            }
        }

        /* Gaya untuk tombol close */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-body {
            padding: 20px;
        }

        form {
            display: flex;
            width: 100%;
            flex-direction: column;
        }

        form label {
            margin-bottom: 5px;
            text-align: left;
            font-weight: bold;
        }

        form input[type="text"],
        form input[type="number"] {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        #preview-container p {
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="pre-landing" style="background: url({{ asset('img/4.png') }});">
        {{-- <img src="images/couple.png" alt="Couple"> --}}
        <h1 style="font-family: Quaylike; font-size: 25pt">The Wedding of</h1>
        <br><br>
        {{-- <h2>Ning Alia & Ra Abdillah</h2> --}}
        <img src="{{ asset('img/3.png') }}">
        <br>
        <br>
        <p>Kepada Yth.</p>
        <p>Bapak/Ibu/Saudara/i</p>
        <p><b>Nama Tamu Undanganmu</b></p>
        <br><br>
        <button onclick="openInvitation()"><i class="fas fa-envelope"></i> Buka Undangan</button>
        <audio id="backgroundMusic" loop>
            <source src="{{ asset('build/assets/Tiara Andini, Arsy Widianto - Lagu Pernikahan Kita.mp3') }}"
                type="audio/mpeg">
        </audio>
    </div>

    <div class="main-content background" id="main-content" style="display: none;">
        <!-- Main invitation content goes here -->
        <div class="container" id="home">
            <header
                style="background: url({{ asset('img/bg-hp.png') }}) no-repeat center center;background-size: cover;height: 100vh;display: flex;align-items: center;justify-content: center;">
                <h1 class="slide-in" style="font-family: Quaylike; font-size: 25pt">Save The Date</h1>
                <br><br>
                {{-- <h2>Ning Alia & Ra Abdillah</h2> --}}
                <img class="animate__animated animate__pulse" src="{{ asset('img/3.png') }}">
                <p class="slide-out"><b>Sabtu, 17 Agustus 2024</b></p>
                <div class="timer">
                    <div class="timer-jalan"><span id="days">00</span>
                        <p>Hari
                        </p>
                    </div>
                    <div class="timer-jalan"><span id="hours">00</span>
                        <p>Jam
                        </p>
                    </div>
                    <div class="timer-jalan"><span id="minutes">00</span>
                        <p>Menit
                        </p>
                    </div>
                    <div class="timer-jalan"><span id="seconds">00</span>
                        <p>Detik
                        </p>
                    </div>
                </div>
                {{-- <div class="background"></div> --}}
            </header>

            <section id="mempelai">
                <h1 class="slide-in" style="font-family: 'A Suls'; font-size: 30px">بِسْــــــــــمِ اللَّهِ
                    الرَّحْمٰنِ الرَّحِيْمِ</h1>
                <br>
                <h1 class="slide-in" style="font-family: 'Arabic Ejaza'; font-size: 30px">أَلسَّلَامُ عَلَيْكُمْ
                    وَرَحْمَةُ اللّٰهِ وَبَرَكَاتُهُ</h1>
                <p class="slide-in">Dengan rahmat & ridho dari Allah Subhanahu Wa
                    Ta’ala, kami mengundang bapak/ibu/saudara/i pada <b>RESEPSI PERNIKAHAN</b> putra putri kami tercinta
                </p>
                <br>
                <img class="slide-left" src="{{ asset('img/pr2.png') }}" width="120px">
                <h1 class="slide-left"
                    style="font-family: 'Dellamonde'; font-size: clamp(35pt, 2.5vw, 60pt); color: #B78337">Nur Alia
                    Al-Tsania, S.Hum., M.A</h1>
                <h5 class="slide-left" style="font-size: clamp(11pt, 2.5vw, 16pt)">Putri Dari</h5>
                <h5 class="slide-left" style="font-size: clamp(11pt, 2.5vw, 16pt)">K.H Muhammad Sulaiman Nur Basyaiban,
                    M.Pd</h5>
                <h5 class="slide-left" style="font-size: clamp(11pt, 2.5vw, 16pt)">& Nyai Hj. Anny Hermawati, S.H</h5>
                <h5 class="slide-in" style="font-family: Quaylike; font-size: 15pt">Dengan</h5>
                <img class="slide-right" src="{{ asset('img/lk.png') }}" width="120px">
                <h1 class="slide-right"
                    style="font-family: 'Dellamonde'; font-size: clamp(35pt, 2.5vw, 60pt); color: #B78337">Abdillah
                    Ahmad, S.Pd., Lc</h1>
                <h5 class="slide-right" style="font-size: clamp(11pt, 2.5vw, 16pt)">Putra Dari</h5>
                <h5 class="slide-right" style="font-size: clamp(11pt, 2.5vw, 16pt)">K.H Achmad Muhalli (Alm) & Nyai Hj.
                    Maimunah</h5>
            </section>


            <section id="event">
                <p class="slide-in" style="padding-bottom: 10px">Dengan izin Allah acara akan dilaksanakan pada :</p>
                <p class="slide-left" style="font-family: Arial; padding: 5px"><b><i class="fas fa-calendar-alt"></i>
                        Sabtu, 17 Agustus 2023</b></p>
                <p class="slide-left" style="font-family: Arial; padding: 5px"><b><i class="far fa-clock fa-spin"></i>
                        09.30 WIB - 16.30 WIB</b></p>
                <p class="slide-left" style="font-family: Arial; padding: 5px"><b><i class="fas fa-clock fa-spin"></i>
                        18.00 WIB - Selesai</b></p>
                <p class="slide-right" style="font-family: Arial; padding-top: 10px;"><b><i
                            class="fas fa-map-marked-alt"></i> PONDOK PESANTREN ENTREPRENEUR</b></p>
                <p class="slide-right" style="font-family: Arial;"><b>DAR AL-RAUDHAH</b></p>
                <p class="slide-right" style="font-family: Arial;"><b><i class="fas fa-map-marker-alt"></i> Jl. Raya
                        Bungur Tatas RT.26, Baru, Arut Selatan, Kotawaringin Barat, Kalimantan Tengah</b></p>
                <iframe class="slide-out" style="border-radius: 10px"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2818.23050999812!2d111.66604864024895!3d-2.6412298253627315!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e08edf5b174faa9%3A0xea0c754018b551e6!2sEntrepreneur%20Ponpes%20Dar%20Al-Raudhah!5e0!3m2!1sen!2sid!4v1720886607603!5m2!1sen!2sid"
                    width="95% auto" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </section>

            <section id="kado">
                <h2 class="slide-in" style="font-family: Quaylike;">Live Streaming</h2>
                <p class="slide-in">Anda Juga bisa melihat berlangsungnya acara bahagia kami dengan menyaksikan melalui
                    live akun media
                    sosial kami</p>
                <br>
                <a href="#" target="_blank" rel="noopener noreferrer" class="slide-in custom-button"><i
                        class="fas fa-video"></i> Live Streaming</a>
                <br><br>
                <h1 class="slide-out" style="font-family: Quaylike;"><i class="fas fa-gifts"></i> Kado Digital</h1>
                <p class="slide-out">Doa Restu Anda merupakan karunia yang sanget berarti bagi kami. Dan jika memberi
                    adalah ungkapan
                    tanda terima kasih Anda, Anda dapat memberi kado secara langsung atau tidak langsung.</p>
                <br>
                <button id="openModalButton" class="slide-out button-modal"><i class="fa fa-envelope"></i> Kirim
                    Kado</button>
                <div id="myModal" class="modal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3><i class="fas fa-gift"></i> Kirim Kado</h3>
                            <span class="close">&times;</span>
                        </div>
                        <div class="modal-body">
                            <h2 class="slide-zoomIn">BANK</h2>
                            <p class="slide-left">a.n NUR ALIA AL-TSANIA</p>
                            <p class="slide-left">1234567890</p>
                            <textarea id="textToCopy" rows="4" cols="50" hidden>1234567890</textarea>
                            <br>
                            <button class="slide-left custom-button" id="copyRekening"><i class="fas fa-copy"></i>
                                Salin No. Rekening</button>
                            <br>
                            <br>
                            <br>
                            <p class="slide-right">Anda juga bisa mengirimkan kado fisik pada alamat berikut :</p>
                            <p class="slide-right" style="font-family: Arial;"><b><i
                                        class="fas fa-map-marker-alt"></i> Jl. Raya Bungur Tatas RT.26, Baru, Arut
                                    Selatan, Kotawaringin Barat, Kalimantan Tengah</b>
                            </p>
                            <textarea id="textAlamat" rows="4" cols="50" hidden>Jl. Raya Bungur Tatas RT.26, Baru, Arut Selatan, Kotawaringin Barat, Kalimantan Tengah</textarea>
                            <br>
                            <button class="slide-right custom-button" id="copyAlamat"><i class="fas fa-copy"></i>
                                Salin
                                Alamat</button>
                        </div>
                    </div>
                </div>
            </section>

            <section id="rsvp">
                <h2 style="font-family: Quaylike">RSVP</h2>
                <form method="post" action="#">
                    @csrf
                    <label for="name">Nama</label>
                    <input type="text" name="nama" placeholder="Masukkan Nama Anda">

                    <label for="pesan">Pesan</label>
                    <textArea name="pesan" rows="5" placeholder="Tuliskan Pesan Anda"></textArea>
                    <br>
                    <button type="submit" class="custom-button"><i class="fa fa-send"></i> <b> Kirim</b></button>
                </form>
                <br>
                <div id="preview-container" style="border: 1px solid #ccc; height: 200px; overflow-y: auto; width: 100%">
                    <p><strong>Nama:</strong> <span id="preview-nama"></span></p>
                    <p><strong>Pesan:</strong></p>
                    <p id="preview-pesan"></p>
                </div>
            </section>

            <footer class="">
                <p>وَ السَّلاَمُ عَلَيْكُمْ وَرَحْمَةُ اللهِ وَبَرَكَاتُهُ</p>
                <p>Semoga Bapak/Ibu/Saudara/i Berkenan Hadir Untuk Memberikan Do’a Restu Kepada Kami</p>
                <p><a href="http://example.com/streaming-link">Live Streaming</a></p>
            </footer>

        </div>


        <div class="navbar">
            <a href="#home">
                <div class="nav-button"><i class="fas fa-home"></i> Home</div>
            </a>
            <a href="#mempelai">
                <div class="nav-button"><i class="fas fa-heart"></i> Mempelai</div>
            </a>
            <a href="#event">
                <div class="nav-button"><i class="fas fa-calendar"></i> Event</div>
            </a>
            <a href="#kado">
                <div class="nav-button"><i class="fas fa-gift"></i> Kado</div>
            </a>
            <a href="#rsvp">
                <div class="nav-button"><i class="fas fa-envelope"></i> RSVP</div>
            </a>
        </div>


    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const bubbleCount = 50; // Number of bubbles
            const background = document.querySelector('.background');

            for (let i = 0; i < bubbleCount; i++) {
                const bubble = document.createElement('div');
                bubble.className = 'bubble';

                // Set random horizontal position
                bubble.style.left = `${Math.random() * 100}%`;

                // Set random animation duration and delay
                bubble.style.animationDuration = `${20 + Math.random() * 20}s`;
                bubble.style.animationDelay = `${Math.random() * 20}s`;

                // Set random size
                const size = 10 + Math.random() * 20;
                bubble.style.width = `${size}px`;
                bubble.style.height = `${size}px`;

                background.appendChild(bubble);
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry
                            .target); // Hentikan observasi setelah elemen terlihat
                    }
                });
            }, {
                threshold: 0.1 // Atur seberapa banyak elemen harus terlihat sebelum animasi dimulai
            });

            document.querySelectorAll('.slide-zoomIn').forEach(element => {
                observer.observe(element);
            });
            document.querySelectorAll('.slide-in').forEach(element => {
                observer.observe(element);
            });
            document.querySelectorAll('.slide-out').forEach(element => {
                observer.observe(element);
            });
            document.querySelectorAll('.slide-left').forEach(element => {
                observer.observe(element);
            });
            document.querySelectorAll('.slide-right').forEach(element => {
                observer.observe(element);
            });
        });
    </script>

    {{-- <script src="{{ asset('build/assets/script.js') }}"></script> --}}
    <script>
        // Set the target date and time for the countdown
        var targetDate = new Date('August 16, 2024 23:59:59').getTime();

        // Update the countdown every second
        var countdownInterval = setInterval(function() {
            // Get the current date and time
            var currentDate = new Date().getTime();

            // Calculate the remaining time in milliseconds
            var remainingTime = targetDate - currentDate;

            // Calculate days, hours, minutes, and seconds
            var days = Math.floor(remainingTime / (1000 * 60 * 60 * 24));
            var hours = Math.floor((remainingTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

            // Display the countdown in the "timer" div

            document.getElementById('days').innerHTML = formatTime(days);
            document.getElementById('hours').innerHTML = formatTime(hours);
            document.getElementById('minutes').innerHTML = formatTime(minutes);
            document.getElementById('seconds').innerHTML = formatTime(seconds);
            // If the countdown is over, display a message and stop the interval
            if (remainingTime < 0) {
                document.getElementById('days').innerHTML = 'Waktu Habis!';
                clearInterval(countdownInterval);
                document.getElementById('hours').innerHTML = 'Waktu Habis!';
                clearInterval(countdownInterval);
                document.getElementById('minutes').innerHTML = 'Waktu Habis!';
                clearInterval(countdownInterval);
                document.getElementById('seconds').innerHTML = 'Waktu Habis!';
                clearInterval(countdownInterval);
            }
        }, 1000);

        // Function to format time (add leading zeros)
        function formatTime(time) {
            return time < 10 ? '0' + time : time;
        }
    </script>
    <script>
        document.querySelectorAll('.navbar a').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                const targetId = this.getAttribute('href').substring(1);
                const targetSection = document.getElementById(targetId);

                window.scrollTo({
                    top: targetSection.offsetTop - 50,
                    behavior: 'smooth'
                });
            });
        });
    </script>
    <script>
        function openInvitation() {
            var audio = document.getElementById('backgroundMusic');
            document.querySelector('.pre-landing').style.display = 'none';
            document.getElementById('main-content').style.display = 'block';
            audio.play();
        }
    </script>
    <script>
        // Mendapatkan elemen modal
        var modal = document.getElementById("myModal");

        // Mendapatkan tombol yang membuka modal
        var btn = document.getElementById("openModalButton");

        // Mendapatkan elemen <span> yang menutup modal
        var span = document.getElementsByClassName("close")[0];

        // Ketika tombol diklik, buka modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // Ketika pengguna mengklik <span> (x), tutup modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // Ketika pengguna mengklik di luar modal, tutup modal
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
    <script>
        document.getElementById("copyRekening").addEventListener("click", function() {
            // Mendapatkan elemen textarea
            var textToCopy = document.getElementById("textToCopy");

            // Menyeleksi teks dalam textarea
            textToCopy.select();
            textToCopy.setSelectionRange(0, 99999); // Untuk perangkat mobile

            // Menyalin teks ke clipboard
            document.execCommand("copy");

            // Menampilkan alert bahwa teks telah disalin
            alert("No Rekening Berhasil disalin: " + textToCopy.value);
        });
    </script>
    <script>
        document.getElementById("copyAlamat").addEventListener("click", function() {
            // Mendapatkan elemen textarea
            var textToCopy = document.getElementById("textAlamat");

            // Menyeleksi teks dalam textarea
            textToCopy.select();
            textToCopy.setSelectionRange(0, 99999); // Untuk perangkat mobile

            // Menyalin teks ke clipboard
            document.execCommand("copy");

            // Menampilkan alert bahwa teks telah disalin
            alert("Alamat Berhasil disalin: " + textToCopy.value);
        });
    </script>
</body>

</html>
