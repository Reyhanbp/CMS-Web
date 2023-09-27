<!DOCTYPE html>
<html lang="en">
<head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        
        <!--CSS LAINNYA-->
        <style>
            .jumbotron{
                padding: 6rem 1rem;
                background: #e2edff;

            }
            .nav-link{
                color: white;
            }

            #projects{
                background: #e2edff;
            }

            section{
                padding-top: 5rem;
            }
        </style>   
</head>
<body>
    @include('Navbar')
     <!--Projects-->
     <section id="projects">
            <div class="container">
                <div class="row">
                    <div class="col text-center mb-5">
                        <h2>My Projects</h2>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <img src="{{ Url ('h1.png') }}" class="card-img-top" alt="gambar">
                            <div class="card-body">
                                <p class="card-text">Sebuah desain Company Profile dari perusahaan CV.MCFLYON TEKNOLOGI INDONESIA tempat saya magang</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <img src="{{ Url ('h1 apk.png') }}" class="card-img-top" alt="gambar">
                            <div class="card-body">
                                <p class="card-text">Sebuah desain Proposal untuk Aplikasi Remunerasi dari perusahaan CV.MCFLYON TEKNOLOGI INDONESIA tempat saya magang</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <img src="{{ Url ('SILABIFIX12.png') }}" class="card-img-top" alt="gambar">
                            <div class="card-body">
                                <p class="card-text">Sebuah desain Proposal untuk SILABI dari perusahaan CV.MCFLYON TEKNOLOGI INDONESIA tempat saya magang</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#e2edff" fill-opacity="1" d="M0,224L60,240C120,256,240,288,360,298.7C480,309,600,299,720,256C840,213,960,139,1080,117.3C1200,96,1320,128,1380,144L1440,160L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path></svg>
        <!--End of projects-->
        @include('Footer')
</body>
</html>