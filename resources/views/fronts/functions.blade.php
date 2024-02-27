@extends('layouts.app')
@section('content')
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <!-- Author -->
    <meta name="author" content="Themes Industry">
    <!-- Description -->
    <meta name="description" content="Corporate-Finance is a highly creative, modern, visually stunning and Bootstrap responsive multipurpose studio and portfolio HTML5 template with ready home page demos.">
    <!-- Page Title -->
    <title>Karachi Metropolitan Corporation --- Government of Sindh</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <!-- Favicon -->
    <link rel="icon" type="https://www.kmc.gos.pk/asset/image/png" href="images/favicon.png">
    <!-- Bundle -->
    <link href="https://www.kmc.gos.pk/asset/vendor/css/bundle.min.css" rel="stylesheet">
    <!-- Plugin Css -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almarai&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cookie&family=Oleo+Script+Swash+Caps&family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://www.kmc.gos.pk/asset/vendor/css/LineIcons.min.css" rel="stylesheet">
    <link href="https://www.kmc.gos.pk/asset/vendor/css/revolution-settings.min.css" rel="stylesheet">
    <link href="https://www.kmc.gos.pk/asset/vendor/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="https://www.kmc.gos.pk/asset/vendor/css/owl.carousel.min.css" rel="stylesheet">
    <link href="https://www.kmc.gos.pk/asset/vendor/css/cubeportfolio.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://www.kmc.gos.pk/asset/js/slick-1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://www.kmc.gos.pk/asset/js/slick-1.8.1/slick/slick-theme.css" />
    <!-- Style Sheet -->
    <link href="https://www.kmc.gos.pk/asset/css/navigation.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha256-NuCn4IvuZXdBaFKJOAcsU2Q3ZpwbdFisd5dux4jkQ5w=" crossorigin="anonymous" />
    
    <!-- js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

   

    <script>
        jQuery(function($) {
            $('.logo-link > a').click(function() {
                location.href = this.href;
            });
        });
    </script>
    <script>
        jQuery(function($) {
            $('.dropdown > a').click(function() {
                location.href = this.href;
            });
        });
    </script>

    <!-- END HEADER -->
    <style>
        .south .card-title {
            font-size: 20px;
            font-weight: 500;
            width: 100%;
            color: #22574D !important;
        }

        .south {
            padding-block: 10px;
            transition: 0.3s all;
            width: 100% !important;
            padding-inline: 10px;
            background: #f5f5f5;
            margin-bottom: 15px;
            padding: 18px;
        }

        .south:hover {
            background: #275902;
            color: white !important;
        }

        .south:hover .card-title {
            color: white !important;
        }
        li{
            list-style:none;
            font-size:16px;
            color:black;
        }
        div#accordion {
    padding: 0;
}
.south{
    margin-bottom: 0 !important;
}
.south:hover {
    background: #22574D !important;
    color: white !important;
}
    </style>
   <div class="row" style="background: url(https://staging.tmcsaddar.gos.pk/uploads/content/inner-hd-new.jpg);
        background-position: center center; background-repeat: no-repeat; background-size: cover; height: 300px; width: 100 margin-top:-65px;">
    </div>
      <div class="container-fluid py-5">
        <div class="container">

            <div style="border:none" id="accordion" class="accordion">
                <div style="border:none" class="card mb-0">

                    <div class="south" data-toggle="collapse" data-parent="#accordion" href="#1collapseone">
                        <a class="card-title">
                        UC List

                       <img src="{{ asset('assets/images/dropdown-arrow.png')}}" style="width: 20px;"/>
                    </a>
                    </div>

                    <div id="1collapseone" class="collapse" data-parent="#accordion">
                        <ul class="p-4">
                            <li>UC-01 - Fareed Colony - Muhammad Kamran (Vice Chairman) - 0300-2544710</li> 
                            <li>UC-02 - Haryana Colony - Abdullah Baloach (Town Vice Chairman) - 0312-215 0345</li> 
                            <li>UC-03 - Bismillah Colony- Asif Rehman (Vice Chairman) - 0345-1992508</li> 
                            <li>UC-04 - Islam Nagar	- Abid Shah (Vice Chairman) - 0344-2606660</li> 
                            <li>UC-05 - Mominabad	- Malik Arif Awan (Town Chairman) - 0300-9276565</li> 
                            <li>UC-06 - Frontier Colony	- Mukhtiar Shah (Vice Chairman) - 0331-2107024</li> 
                            <li>UC-07 - Banaras Colony	- Dr. Kabeer (Vice Chairman) - 0333-2280585</li> 
                            <li>UC-08 - Peerabad - Nadir ur Rehman (Vice Chairman) - 0311-2977133</li> 
                            <li>UC-09 - Qasba Colony - Syed Baseer Uddin (Vice Chairman) - 0344-5532288</li> 
                        </ul>
                    </div>





               




                




           


                </div>

            </div>
        </div>
    </div>

@endsection

