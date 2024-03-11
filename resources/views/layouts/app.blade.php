<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if (!empty(trim($__env->yieldContent('seo_tags'))))
    @yield('seo_tags')
    @else
    <title>{{ $websiteSettings->title }}</title>
    <meta name="description" content="{{ @base64_decode($websiteSettings->description) }}">
    <meta name="author" content="{{ $websiteSettings->author }}">
    <meta name="keywords" content="{{ $websiteSettings->keywords }}">

    <!-- Open Graph (OG) meta tags for social media -->
    <meta property="og:title" content="{{ $websiteSettings->title }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('fronts.home') }}">
    <meta property="og:image" content="{{ asset('uploads/website/' . $websiteSettings->logo) }}">
    <meta property="og:description" content="{{ base64_decode($websiteSettings->description) }}">

    <!-- Twitter meta tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@yourtwitterhandle">
    <meta name="twitter:title" content="{{ $websiteSettings->title }}">
    <meta name="twitter:description" content="{{ base64_decode($websiteSettings->description) }}">
    <meta name="twitter:image" content="{{ asset('uploads/website/' . $websiteSettings->logo) }}">
    @endif
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('uploads/website/' . $websiteSettings->favicon) }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Scripts -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Didact+Gothic&family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" />
    <!-- Detail page css -->
    <link rel="stylesheet" href="{{ asset('assets/css/all.inner.custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/all.inner.style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/all.inner.responsive.css') }}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">

</head>

<body>
    <style>
        * {
            font-family: 'Roboto', sans-serif !important;
        }

        .nav-menu,
        .news-item {
            background-color: #F5F0F0 !important;
            border: none !important;


        }

        button.nav__button {
            color: #22574D !important;

        }

        button.nav__button:hover {
            background-color: #22574D !important;
            color: #F5F0F0 !important;
        }

        a.nav__button:hover {
            background-color: #22574D !important;
            color: #F5F0F0 !important;
        }

        #logo {
            margin: 0 !important;
        }

        .logo-div {
            height: fit-content;
            /*max-height:80px;*/
        }

        .nav__button {
            width: fit-content;
            font-size: 14px;
            font-weight: 700;
            letter-spacing: .1em;
            align-self: stretch;
            text-decoration: none;
            text-transform: uppercase;
        }

        .panel-child a {
            font-size: 13px;
            padding-bottom: 13px;
            display: block;
        }

        .flip-card img {
            /* min-height: 200px; */
            height: 100%;
            object-fit: cover;
            width: 100%;
            max-height: 250px;
        }

        .btn {
            margin-left: 20px;
            background: #22574D;
            border: none;
            padding: 12px 25px;
            color: white;
        }

        .pdf-container {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ddd;
        }

        .pdf-details {
            display: flex;
            align-items: center;
        }

        .pdf-details img {
            margin-right: 10px;
        }

        .pdf-buttons {
            display: table-column;
            gap: 20px;

        }

        .d-lg-block {
            display: none !important;
        }

        .nawsdrop {
            list-style: none;
            margin: 0;
            padding: 0;
            background-color: #f5f0f0;
            display: flex;
        }


        .news-item {
            padding: 5px;
            cursor: pointer;
            color: white;
            border: none;
            list-style: none !important;
            text-decoration: none;
        }

        .news-item:hover {
            background-color: #22574D;
            color: #fff;
        }

        .news-item a {
            color: white;
            text-decoration: none;
        }

        .news-menu {
            display: none;
            position: absolute;
            z-index: 999;
            border: solid 1px;
            background-color: white;
            border: none;
        }

        .news-item:hover .news-menu {
            display: flex;
            color: #22574D;
             !important;
            flex-direction: column;
        }

        ul.news-menu {
            padding-left: 0;
            margin-left: 0;
            margin-top: 17px;
        }

        .mega-menu--active {
            max-height: 45vh !important;
        }

        .d-flex.align-items-center {
            margin-left: 20px !important;
        }

        a.nav__button.click {
            margin-top: 2px;
        }

        .mega-menu__sub-title {
            display: none;
        }

        a.itemss {
            color: black !important;
            font-size: 14px;
        }

        li.news-item:hover {
            background: #22574D !important;

        }

        a.itemss:hover {
            color: #F5F0F0 !important;
        }

        a.panel-card.panel-card-btn.text-center {
            background: #FFFFFF;
            border: none !important;

        }

        .panel-card--text.text-white.text-center {
            color: black !important;
        }

        .news-item a {
            color: #22574D;
        }

        /* .searchtext {
            font-size: 14px;
            margin-left: 10px;
            margin-top: 30px;
            font-weight: 700;

        } */

        /*        .d-flex.align-items-center {*/
        /*    margin-bottom: 9px;*/
        /*}*/
        /* button.text-center.search-text {
            color: #22574D;
        } */

        .logo-div .navbar-brand {
            background: #f5f0f0 !important;
        }

        .container-header {
            padding-right: 40px;
        }

        h5#exampleModalLabel {
            color: #22574D !important;
        }

        button#search-post-btn {
            background: #22574D !important;
        }

        li.news-item-main:hover {
            background: #f5f0f0 !important;
        }

        li.news-item:hover>a.itemss {
            color: #fff !important;
        }

        .panel-card:hover {
            border: 2px solid #22574d !important;
        }

        div#social-sticky {
            position: fixed;
            top: 38%;
            right: -36px;
            z-index: 999;
        }

        img.social-icon {
            width: 24px;
        }

        h1.logo-heading {
            font-weight: 600;
            margin-top: 30px;
            margin-left: inherit;
            font-size: 16px;
        }

        .header__nav.w-100 {
            margin-top: 3px;
        }

        .panel-card--icon {
            display: none;
        }

        /* ul.search-list {
            position: absolute;
            top: 60px;
        } */

        img.social-icon {
            width: 30px !important;
        }

                /* Adjust the width and background color of the search list to match the modal */
            .modal-search-list {
                width: 100%; /* Ensure full width of the modal */
                background-color: #f9f9f9 !important; /* Set background color of the search list */
                padding: 15px; /* Add padding to match modal padding */
                box-sizing: border-box; /* Ensure padding doesn't add to width */
            }

            /* Style individual search result cards */
            .search-result-card {
                background-color: #fff; /* Set background color of each card */
                border-radius: 8px; /* Add rounded corners to cards */
                padding: 15px; /* Add padding to the cards */
                margin-bottom: 15px; /* Add margin between cards */
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add shadow for depth */
            }

            .search-result-card img {
                max-width: 100%; /* Ensure images fit within their containers */
                height: auto; /* Maintain aspect ratio */
                border-radius: 5px; /* Add rounded corners to images */
            }

            .search-title {
                font-size: 18px; /* Adjust title font size */
                margin-top: 10px; /* Add space between image and title */
                color: #333; /* Set title color */
            }

    </style>
    <div id="app">
        <header class="nav-menu ">
            <div class="container-header">
                <div class="row">
                    <div class="col-lg-12 mx-auto ">
                        <div class=" d-flex  align-items-center justify-content-between">
                            @if ($websiteSettings->logo)
                            <div class="logo-div">
                                <a class="navbar-brand d-flex align-items-center" href="{{ route('fronts.home') }}">
                                    <img src="{{ asset('uploads/website/' . $websiteSettings->logo) }}"
                                        alt="{{ $websiteSettings->title ?? 'Website Title' }}" class="logo">
                                    <h1 class="logo-heading">{{$websiteSettings->name}}
                                    </h1>
                                </a>
                            </div>
                            @endif
                            <div class="nav-menu  menu-links mx-auto w-auto">


                            @if (isset($activeMenuItems) && count($activeMenuItems) > 0)
                            <div class="header__nav w-100">
                                    @foreach ($activeMenuItems as $menuItem)
                                    <ul class="nawsdrop">
                                        <li class="news-item news-item-main">
                                            <a class="nav__button"
                                                href="{{ $menuItem['url'] }}">{{ $menuItem['label'] }}</a>
                                            @if (isset($menuItem['subItems']) && count($menuItem['subItems']) > 0)
                                            <ul class="news-menu" style="width: 230px;">
                                                @foreach ($menuItem['subItems'] as $subItem)
                                                <li class="news-item">
                                                    <a class="itemss"
                                                        href="{{ $subItem['url'] }}">{{ $subItem['label'] }}</a>
                                                </li>
                                                @endforeach
                                            </ul>
                                            @endif
                                        </li>
                                    </ul>
                                    @endforeach
                                </div>
                            @else
                                <p>No active menu items found.</p>
                            @endif






                                <!-- filter -->
                                <div class="d-lg-none d-block filter-div">

                                    <div class="filter order-lg-1 order-1 ">

                                        <div>
                                            <h2 class="filter-heading mb-0 p-3 pb-0">Apply</h2>

                                            <button class="accordian2"> Property Tax </button>
                                            <button class="accordian2">Water Connection
                                            </button>
                                            <button class="accordian2">Tree Trimming
                                            </button>
                                            <button class="accordian2">Solid Waste Management</button>
                                            <button class="accordian2">Trade License</button>
                                            <button class="accordian2">New Business</button>
                                            <button class="accordian">Trade</button>
                                            <div class="panel">
                                                <button class="accordian-child">Park</button>
                                                <div class="panel-child">
                                                    <p>Content for Park</p>
                                                </div>

                                                <button class="accordian-child">Mosque</button>
                                                <div class="panel-child">
                                                    <p>Content for Mosque</p>
                                                </div>
                                            </div>

                                            <button class="accordian">Projection and stall Board</button>
                                            <div class="panel">
                                                <button class="accordian-child">Park</button>
                                                <div class="panel-child">
                                                    <p>Content for Park</p>
                                                </div>

                                                <button class="accordian-child">Mosque</button>
                                                <div class="panel-child">
                                                    <p>Content for Mosque</p>
                                                </div>
                                            </div>

                                            <button class="accordian2">Advertisment</button>
                                            <div class="panel">
                                                <button class="accordian-child">Park</button>
                                                <div class="panel-child">
                                                    <p>Content for Park</p>
                                                </div>

                                                <button class="accordian-child">Mosque</button>
                                                <div class="panel-child">
                                                    <p>Content for Mosque</p>
                                                </div>
                                                <!-- End of Nested Accordian -->
                                            </div>

                                            <button class="accordian">Moveable Advertisment</button>

                                            <button class="accordian">Deonar Abattoir</button>
                                            <div class="panel">
                                                <!-- Nested Accordian -->
                                                <button class="accordian-child">Park</button>
                                                <div class="panel-child">
                                                    <p>Content for Park</p>
                                                </div>

                                                <button class="accordian-child">Mosque</button>
                                                <div class="panel-child">
                                                    <p>Content for Mosque</p>
                                                </div>
                                                <!-- End of Nested Accordian -->
                                            </div>

                                            <button class="accordian">Health Liscenses</button>
                                            <div class="panel">
                                                <!-- Nested Accordian -->
                                                <button class="accordian-child">Park</button>
                                                <div class="panel-child">
                                                    <p>Content for Park</p>
                                                </div>

                                                <button class="accordian-child">Mosque</button>
                                                <div class="panel-child">
                                                    <p>Content for Mosque</p>
                                                </div>
                                                <!-- End of Nested Accordian -->
                                            </div>

                                            <button class="accordian2">Hawkers</button>

                                            <button class="accordian2">Mount Mary Fair (Bandra Fair)</button>


                                            <button class="accordian2">Certificate - Birth</button>
                                            <button class="accordian2">Mount Mary Fair (Bandra Fair)</button>
                                            <button class="accordian2">Registration Marriage</button>
                                            <button class="accordian2">Admission Karachi Public School</button>
                                            <button class="accordian2">Swimming Pools</button>
                                            <button class="accordian">License Dog</button>
                                            <div class="panel">
                                                <!-- Nested Accordian -->
                                                <button class="accordian-child">Park</button>
                                                <div class="panel-child">
                                                    <p>Content for Park</p>
                                                </div>

                                                <button class="accordian-child">Mosque</button>
                                                <div class="panel-child">
                                                    <p>Content for Mosque</p>
                                                </div>
                                                <!-- End of Nested Accordian -->
                                            </div>
                                            <button class="accordian">Certificate Death</button>
                                            <div class="panel">
                                                <!-- Nested Accordian -->
                                                <button class="accordian-child">Park</button>
                                                <div class="panel-child">
                                                    <p>Content for Park</p>
                                                </div>

                                                <button class="accordian-child">Mosque</button>
                                                <div class="panel-child">
                                                    <p>Content for Mosque</p>
                                                </div>
                                                <!-- End of Nested Accordian -->
                                            </div>

                                            <button class="accordian2">Approvel Building Plan</button>
                                            <button class="accordian2">Complaints - All</button>
                                            <button class="accordian2">Approvel Encroachment</button>

                                        </div>
                                    </div>
                                </div>


                                <!-- </div> -->
                                </nav>
                            </div>
                            <div class="d-flex align-items-center mb-0">

                                <div class="d-flex align-items-center me-lg-0 me-3">


                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#searchModal">
                                 <i class="bi bi-search "></i>
                                </button>


                                </div>
                                <div class="d-lg-none d-flex menu-icons">
                                    <i class="bi bi-list f-24 open-icon text-white"></i>
                                    <i class="bi bi-x-lg f-24 close-icon text-white"></i>
                                </div>
                            </div>
                        </div>

                        @foreach ($menus as $menu)
                        <nav class="mega-menu small-menu" id="{{ $menu['slug'] }}"
                            aria-labelledby="{{ $menu['slug'] }}-navigation">
                            <div class="mega-menu__container">
                                <div id="{{ $menu['slug'] }}-navigation"
                                    class="mega-menu__title d-flex justify-content-between">
                                    {{ $menu['title'] }} </div>
                                @foreach ($menu['submenu'] as $subMenu)
                                <section class="mega-menu__section">
                                    <div class="mega-menu__sub-title">{{ $subMenu['title'] }}</div>

                                    <ul class="mega-menu__list">
                                        @if (!empty($subMenu['post']))
                                        @foreach ($subMenu['post'] as $post)
                                        <li class="mega-menu__item">
                                            <a class="mega-menu__link"
                                                href="{{ route('fronts.detail-view', ['slug' => $post['slug']]) }}">
                                                {{ $post['title'] }}
                                            </a>
                                        </li>
                                        @endforeach
                                        @endif
                                    </ul>
                                </section>
                                @endforeach
                            </div>
                        </nav>
                        @endforeach


                        {{-- <nav class="mega-menu small-menu" id="government" aria-labelledby="government-navigation">
                            <div class="mega-menu__container">
                                <div id="government-navigation" class="mega-menu__title">Government</div>
                                <section class="mega-menu__section">
                                    <div class="mega-menu__sub-title">Mayor's Office</div>

                                    <ul class="mega-menu__list">
                                        <li class="mega-menu__item"><a class="mega-menu__link"
                                                href="https://www.stpaul.gov/departments/mayors-office">Mayor's Office
                                            </a>
                                        </li>
                                        <li class="mega-menu__item"><a class="mega-menu__link"
                                                href="/departments/mayors-office/about-mayor">About Mayor Carter</a>
                                        </li>
                                        <li class="mega-menu__item"><a class="mega-menu__link"
                                                href="/departments/mayors-office/committees-boards-and-commissions">Committees,
                                                Boards, and Commissions</a></li>
                                    </ul>

                                    <div class="mega-menu__sub-title">City Council</div>

                                    <ul class="mega-menu__list">
                                        <li class="mega-menu__item"><a class="mega-menu__link"
                                                href="https://www.stpaul.gov/department/city-council">About the City
                                                Council</a>
                                        </li>
                                        <li class="mega-menu__item"><a class="mega-menu__link"
                                                href="/department/city-council/ward-1-councilmember-russel-balenger">Ward
                                                1
                                                -
                                                Councilmember Balenger (Interim)</a></li>
                                        <li class="mega-menu__item"><a class="mega-menu__link"
                                                href="/department/city-council/ward-2-councilmember-rebecca-noecker">Ward
                                                2
                                                -
                                                Councilmember Noecker</a></li>
                                        <li class="mega-menu__item"><a class="mega-menu__link"
                                                href="/department/city-council/ward-3-councilmember-chris-tolbert">Ward
                                                3 -
                                                Councilmember Tolbert </a></li>
                                        <li class="mega-menu__item"><a class="mega-menu__link"
                                                href="/department/city-council/ward-4-councilmember-mitra-jalali">Ward
                                                4
                                                -
                                                Councilmember Jalali </a></li>
                                        <li class="mega-menu__item"><a class="mega-menu__link"
                                                href="/department/city-council/ward-5-council-president-amy-brendmoen">Ward
                                                5 -
                                                Council President Brendmoen</a></li>
                                        <li class="mega-menu__item"><a class="mega-menu__link"
                                                href="/department/city-council/ward-6-councilmember-nelsie-yang">Ward 6
                                                -
                                                Councilmember Yang</a></li>
                                        <li class="mega-menu__item"><a class="mega-menu__link"
                                                href="/ward-7-councilmember-jane-l-prince">Ward 7 - Councilmember
                                                Prince</a>
                                        </li>
                                    </ul>
                                </section>
                                <section class="mega-menu__section">
                                    <div class="mega-menu__sub-title">Departments</div>

                                    <ul class="mega-menu__list">
                                        <li class="mega-menu__item"><a class="mega-menu__link"
                                                href="/departments/city-attorney">City Attorney</a></li>
                                        <li class="mega-menu__item"><a class="mega-menu__link"
                                                href="/departments/city-clerk">City
                                                Clerk</a></li>
                                        <li class="mega-menu__item"><a class="mega-menu__link"
                                                href="/departments/emergency-management">Emergency Management</a></li>
                                        <li class="mega-menu__item"><a class="mega-menu__link"
                                                href="/departments/financial-empowerment">Financial Empowerment</a>
                                        </li>
                                        <li class="mega-menu__item"><a class="mega-menu__link"
                                                href="/departments/financial-services">Financial Services</a></li>
                                        <li class="mega-menu__item"><a class="mega-menu__link"
                                                href="/departments/fire-emergency-medical-services">Fire &
                                                Paramedics</a>
                                        </li>
                                        <li class="mega-menu__item"><a class="mega-menu__link"
                                                href="/departments/human-resources">Human Resources</a></li>
                                        <li class="mega-menu__item"><a class="mega-menu__link"
                                                href="/departments/human-rights-equal-economic-opportunity">Human
                                                Rights
                                                &
                                                Equal
                                                Economic Opportunity</a></li>
                                        <li class="mega-menu__item"><a class="mega-menu__link"
                                                href="https://sppl.org/">Library</a>
                                        </li>
                                        <li class="mega-menu__item"><a class="mega-menu__link"
                                                href="/departments/neighborhood-safety">Neighborhood Safety</a></li>
                                        <li class="mega-menu__item"><a class="mega-menu__link"
                                                href="https://stpaul.gov/departments/parks-recreation">Parks and
                                                Recreation</a></li>
                                        <li class="mega-menu__item"><a class="mega-menu__link"
                                                href="/departments/planning-and-economic-development">Planning &
                                                Economic
                                                Development</a></li>
                                        <li class="mega-menu__item"><a class="mega-menu__link"
                                                href="/departments/police">Police</a>
                                        </li>
                                        <li class="mega-menu__item"><a class="mega-menu__link"
                                                href="https://www.ramseycounty.us/your-government/departments/health-and-wellness/public-health">Public
                                                Health</a></li>
                                        <li class="mega-menu__item"><a class="mega-menu__link"
                                                href="/departments/public-works">Public Works</a></li>
                                        <li class="mega-menu__item"><a class="mega-menu__link"
                                                href="https://www.stpaul.gov/departments/safety-inspections">Safety &
                                                Inspections</a></li>
                                        <li class="mega-menu__item"><a class="mega-menu__link"
                                                href="/departments/technology-communications">Technology &
                                                Communications</a></li>
                                        <li class="mega-menu__item"><a class="mega-menu__link"
                                                href="/departments/saint-paul-regional-water-services">Water</a></li>
                                    </ul>
                                </section>
                                <section class="mega-menu__section">
                                    <div class="mega-menu__sub-title">Open Information</div>

                                    <ul class="mega-menu__list">
                                        <li class="mega-menu__item"><a class="mega-menu__link"
                                                href="https://budget.stpaul.gov/#!/year/default">Open Budget</a></li>
                                        <li class="mega-menu__item"><a class="mega-menu__link"
                                                href="https://information.stpaul.gov/">Open Information Portal</a></li>
                                        <li class="mega-menu__item"><a class="mega-menu__link"
                                                href="https://www.stpaul.gov/datarequest">Data Practices Requests</a>
                                        </li>
                                        <li class="mega-menu__item"><a class="mega-menu__link"
                                                href="https://library.municode.com/mn/st._paul/codes/code_of_ordinances">City
                                                Charter &amp; Codes</a></li>
                                        <li class="mega-menu__item"><a class="mega-menu__link"
                                                href="https://climateaction.stpaul.gov/">Climate Action Dashboard</a>
                                        </li>
                                        <li class="mega-menu__item"><a class="mega-menu__link"
                                                href="/government/city-hall-room-scheduler">City Hall Room
                                                Scheduler</a>
                                        </li>
                                    </ul>

                                    <div class="mega-menu__sub-title">Employment</div>

                                    <ul class="mega-menu__list">
                                        <li class="mega-menu__item"><a class="mega-menu__link"
                                                href="/departments/human-resources/employee-resources">Employee
                                                Resources</a></li>
                                        <li class="mega-menu__item"><a class="mega-menu__link"
                                                href="/departments/human-resources/jobs">Internal Job Openings</a></li>
                                        <li class="mega-menu__item"><a class="mega-menu__link"
                                                href="https://www.governmentjobs.com/careers/stpaul/classspecs">Job
                                                Descriptions</a>
                                        </li>
                                        <li class="mega-menu__item"><a class="mega-menu__link"
                                                href="/departments/human-resources/labor-relations/job-titles-salary-schedules">Job
                                                Titles & Salary Schedules</a></li>
                                        <li class="mega-menu__item"><a class="mega-menu__link"
                                                href="https://www.stpaul.gov/departments/human-resources/policies-procedures-rules-and-guidelines">Policies</a>
                                        </li>
                                    </ul>
                                </section>
                            </div>
                        </nav> --}}
                    </div>



                </div>
            </div>
        </header>

        <main class="py-1">
            @yield('content')
        </main>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row footerrs">
                <div class="col-lg-10 mx-auto">
                    <div class="row">
                        <div class="col-lg-3 ">
                            <div class="footer-col">
                                <h5>{{$websiteSettings->name}}</h5>
                                @if (!empty($websiteSettings->phone))
                                <div class="d-flex align-items-start mt-3">
                                    <i class="bi bi-telephone-fill me-2"> </i>{{ $websiteSettings->phone }}
                                </div>
                                @endif
                                @if (!empty($websiteSettings->website_address))
                                <div class="d-flex align-items-start mt-1">
                                    <i class="bi bi-geo-alt-fill me-2"></i>{{ $websiteSettings->website_address }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <!--<div class="col-lg-2 mt-lg-0 mt-3">-->
                        <!--    <div class="footer-col">-->
                        <!--        <div class="mb-2">-->
                        <!--            <a href="/about" class="">About Us</a>-->
                        <!--        </div>-->

                        <!--        <div class="mb-2">-->
                        <!--            <a href="/contact" class="">Contact Us</a>-->
                        <!--        </div>-->

                        <!--        <div class="mb-2">-->
                        <!--            <a href="/staff" class="">Staff</a>-->
                        <!--        </div>-->

                        <!--<div class="mb-2">-->
                        <!--    <a href="/listview" class="">List View</a>-->
                        <!--</div>-->

                        <!--    </div>-->
                        <!--</div>-->
                        <div class="col-lg-4 mt-lg-0 mt-2">
                            <div class="footer-col">

                                <h5>Related Links</h5>

                                @foreach ($websiteSettings->relatedLinks as $key => $row)
                                    @if ($row->is_active === 'active')
                                        <div class="mb-2">
                                            <a href="{{$row->url}}" target='_blank'>{{$row->title}}</a>
                                        </div>
                                    @endif
                                @endforeach

                                <!-- <div class="mb-2">
                                    <a href="http://sswmb.gos.pk/cms/" target='_blank'> Sindh Solid Waste Management
                                        Board (SSWMB)</a>
                                </div>

                                <div class="mb-2">
                                    <a href="https://www.fbr.gov.pk/" target='_blank'>Federal Board of Revenue (FBR)</a>

                                </div>
                                <div class="mb-2">
                                    <a href="https://1339.gos.pk/" target='_blank'>Complaint # 1339</a>
                                </div>
                                <div class="mb-2">
                                    <a href="https://click.gos.pk/" target='_blank'>CLICK</a>
                                </div>
                                <div class="mb-2">
                                    <a href="https://click.gos.pk/" target='_blank'>Karachi Metropolitan Corporation
                                        (KMC)</a>
                                </div>
                                <div class="mb-2">
                                    <a href="https://click.gos.pk/" target='_blank'>Karachi Development Authority
                                        (KDA)</a>
                                </div> -->


                                <!-- <div class="mb-2">
                                    <h5>Related Links</h5>
                                    <a href="https://lgdsindh.gov.pk/wp/" target='_blank'>Local Government Deparment
                                        (LGD)</a>
                                </div>

                                <div class="mb-2">
                                    <a href="http://sswmb.gos.pk/cms/" target='_blank'> Sindh Solid Waste Management
                                        Board (SSWMB)</a>
                                </div>

                                <div class="mb-2">
                                    <a href="https://www.fbr.gov.pk/" target='_blank'>Federal Board of Revenue (FBR)</a>

                                </div>
                                <div class="mb-2">
                                    <a href="https://1339.gos.pk/" target='_blank'>Complaint # 1339</a>
                                </div>
                                <div class="mb-2">
                                    <a href="https://click.gos.pk/" target='_blank'>CLICK</a>
                                </div>
                                <div class="mb-2">
                                    <a href="https://click.gos.pk/" target='_blank'>Karachi Metropolitan Corporation
                                        (KMC)</a>
                                </div>
                                <div class="mb-2">
                                    <a href="https://click.gos.pk/" target='_blank'>Karachi Development Authority
                                        (KDA)</a>
                                </div> -->

                                <!--<div class="mb-2">-->
                                <!--    <a href="/listview" class="">List View</a>-->
                                <!--</div>-->

                            </div>
                        </div>
                        <div class="col-lg-2 mt-lg-0 mt-2">
                            <div class="footer-col">
                                <h5>Useful Links</h5>

                                @foreach ($websiteSettings->usefulLinks as $key => $row)
                                    @if ($row->is_active === 'active')
                                        <div class="mb-2">
                                            <a href="{{$row->url}}" target='_blank'>{{$row->title}}</a>
                                        </div>
                                    @endif
                                @endforeach

                                <!-- <div class="mb-2">

                                    <a href="/faqs" target='_blank'>FAQs</a>
                                </div>
                                <div class="mb-2">
                                    <a href="/career" target='_blank'>Career</a>
                                </div> -->
                                <!--<div class="mb-2">-->
                                <!--    <a href="/listview" class="">List View</a>-->
                                <!--</div>-->

                            </div>
                        </div>
                        <div class="col-lg-3 mt-lg-0 mt-2 d-none">
                            <div class="footer-col">
                                <h5>Contact Detail</h5>
                                <div class="mb-2">
                                    <a href="tel:+923452154417" target='_blank'>Rashid Ansari Director Information
                                        Mominabad: +92 345 2154417</a>
                                </div>
                                <div class="mb-2">
                                    <a href="tel:+923139299666" target='_blank'>D.d Muhammad Tayyab Mominabad Town: +92
                                        313 9299666</a>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-lg-2 mt-lg-0 mt-3">
                            <div class="footer-col">
                                <h5>Social Media</h5>
                                <div class="d-flex align-items-start mb-2">
                                    <img src="assets/images/Facebook_icon.svg" alt="" class="me-2">
                                    <a href="{{ $websiteSettings->facebook_link }}">Facebook</a>
                                </div>


                                <div class="d-flex align-items-start mb-2">
                                    <img src="assets/images/Twitter_icon.svg" alt="" class="me-2">
                                    <a href="{{ $websiteSettings->twitter_link }}">Twitter</a>
                                </div>

                                <div class="d-flex align-items-start mb-2">
                                    <img src="assets/images/Instagram_icon.svg" alt="" class="me-2">
                                    <a href="{{ $websiteSettings->instagram_link }}">Instagram</a>
                                </div>


                                <div class="d-flex align-items-start mb-2">
                                    <img src="assets/images/Youtube_icon.svg" alt="" class="me-2">
                                    <a href="{{ $websiteSettings->youtube_link }}">Youtube</a>
                                </div>

                            </div>
                        </div> -->

                        <div class="col-lg-2 mt-lg-0 mt-3">
                            <div class="footer-col">
                                <h5>Social Media</h5>
                                @if (!empty($websiteSettings->facebook_link))
                                <div class="d-flex align-items-center mb-2">
                                    <img src="assets/images/Facebook_icon.svg" alt="" class="me-2">
                                    <a href="{{ $websiteSettings->facebook_link }}">Facebook</a>
                                </div>
                                @endif
                                @if (!empty($websiteSettings->twitter_link))
                                <div class="d-flex align-items-center mb-2">
                                    <img src="assets/images/Twitter_icon.svg" alt="" class="me-2">
                                    <a href="{{ $websiteSettings->twitter_link }}">Twitter</a>
                                </div>
                                @endif
                                @if (!empty($websiteSettings->instagram_link))
                                <div class="d-flex align-items-center mb-2">
                                    <img src="assets/images/Instagram_icon.svg" alt="" class="me-2">
                                    <a href="{{ $websiteSettings->instagram_link }}">Instagram</a>
                                </div>
                                @endif
                                @if (!empty($websiteSettings->linkedin_link))
                                <div class="d-flex align-items-center mb-2">
                                    <img src="assets/images/Linkedin_icon.svg" alt="" class="me-2">
                                    <a href="{{ $websiteSettings->linkedin_link }}">Linkedin</a>
                                </div>
                                @endif
                                @if (!empty($websiteSettings->youtube_link))
                                <div class="d-flex align-items-center mb-2">
                                    <img src="assets/images/Youtube_icon.svg" alt="" class="me-2">
                                    <a href="{{ $websiteSettings->youtube_link }}">Youtube</a>
                                </div>
                                @endif
                            </div>
                        </div>

                        <!--sticky social media-->
                        <div id="social-sticky" class="col-lg-1 mt-lg-0 mt-3">
                            <div class="footer-col">
                            @if (!empty($websiteSettings->facebook_link))
                                <div class="d-flex align-items-center mb-2">
                                    <a href="#">
                                        <img src="assets/images/Facebook_icon.svg" alt="" class="me-2 social-icon">
                                    </a>
                                </div>
                                @endif
                                @if (!empty($websiteSettings->twitter_link))

                                <div class="d-flex align-items-center mb-2">
                                    <a href="#">
                                        <img src="assets/images/Twitter_icon.svg" alt="" class="me-2 social-icon">
                                    </a>
                                </div>
                                @endif
                                @if (!empty($websiteSettings->linkedin_link))

                                <div class="d-flex align-items-center mb-2">
                                    <a href="#">
                                        <img src="assets/images/Linkedin_icon.svg" alt="" class="me-2 social-icon">
                                    </a>
                                </div>
                                @endif
                                @if (!empty($websiteSettings->youtube_link))
                                <div class="d-flex align-items-center mb-2">
                                    <a href="#">
                                        <img src="assets/images/Youtube_icon.svg" alt="" class="me-2 social-icon">
                                    </a>
                                </div>
                                @endif

                            </div>
                        </div>

                        <!--end sticky-->

                        <!--        <div class="col-lg-1 mt-lg-0 mt-3">-->
                        <!-- <img src="assets/images/pngwing.com (5).png" alt="" class="img-fluid "
                <!--                style="max-width: 100px;"> -->
                        <!--            <a id="logo" class="navbar-brand d-flex align-items-center text-center flex-column py-3 "-->
                        <!--                href="{{ route('fronts.home') }}">-->
                        <!--                <img src="{{ asset('uploads/website/' . $websiteSettings->logo) }}"-->
                        <!--                    alt="{{ $websiteSettings->name }}">-->
                        <!-- TMC<br> Saddar -->
                        <!--            </a>-->
                        <!--        </div>-->
                    </div>
                </div>
                <div class="col-lg-10 mx-auto">
                    <hr class="line text-white mt-4">
                    <div class="footer-col align-items-center d-flex justify-content-center flex-wrap">
                        <div class="mt-2 px-2">
                            <a href="">Copyright © 2024 TMC Mominabad</a>
                        </div>
                        <!--<div class="mt-2 px-2">-->
                        <!--    <a href="">Privacy</a>-->
                        <!--</div>-->
                        <!--<div class="mt-2 px-2">-->
                        <!--    <a href="">Site Map</a>-->
                        <!--</div>-->
                        <!--<div class="mt-2 px-2">-->
                        <!--    <a href="">Disclaimer</a>-->
                        <!--</div>-->
                        <!--<div class="mt-2 px-2">-->
                        <!--    <a href="">Social Media</a>-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Modal -->
    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">City of Karachi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1qSHiJm8nnNvdBSIBT0j4idJ3yKu7Ya0&ehbc=2E312F"
                    width="100%" height="480"></iframe>
            </div>
        </div>
    </div>
    <!-- search modal -->
    <!-- Modal -->
    <!-- <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="exampleModalLabel">Search</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex align-items-center">
                        <input type="text" id="search-post-input" placeholder="Search here..">
                        <button id='search-post-btn' class="main-btn">Search</button>
                    </div>
                    <ul class="search-list">

                    </ul>
                </div>

            </div>
        </div>
    </div> -->



    <!-- Modal -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="searchModalLabel">Search</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <!-- Search elements go here -->
            <div class="d-flex align-items-center">
            <input type="text" id="search-post-input" class="form-control" placeholder="Search here..">
            <button id="search-post-btn" class="btn btn-primary"><i class="bi bi-search"></i></button>
            </div>
            <ul class="search-list mt-3"></ul>
        </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js"
        integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script> -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
    <script src="assets/js/app.js"></script>
    <script>
        $(".open-icon").on("click", function () {
            $(".close-icon").css("display", "block");
            $(this).css("display", "none");
            $(".menu-links").css("left", "0");
            $(".menu-links").css("right", "0");
            $(".menu-links").css("top", "60px");
            $("body").css("overflow-y", "hidden");

        });
        $(".close-icon").on("click", function () {
            $(this).css("display", "none");
            $(".open-icon").css("display", "block");
            $(".menu-links").css("top", "60px");
            $(".menu-links").css("right", "unset");
            $(".menu-links").css("left", "-1000px");
            $("body").css("overflow-y", "auto");
            $(".mega-menu").removeClass("mega-menu--active");
            // $(".mega-menu").css("display", "none");
        });

    </script>
    <script>
        var acc = document.getElementsByClassName("accordian");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function () {
                this.classList.toggle("active3");
                var panel = this.nextElementSibling;

                // Close all other panels
                var panels = document.getElementsByClassName("panel");
                for (var j = 0; j < panels.length; j++) {
                    if (panels[j] !== panel) {
                        panels[j].style.display = "none";
                        var activeAccordians =
                            document.querySelectorAll(".accordian.active3");
                        for (var k = 0; k < activeAccordians.length; k++) {
                            activeAccordians[k].classList.remove("active3");
                        }
                    }
                }

                if (panel.style.display === "block") {
                    panel.style.display = "none";
                    this.classList.remove("active3"); // Remove "active" class when panel is closed
                } else {
                    panel.style.display = "block";
                    this.classList.add("active3"); // Add "active" class when panel is open
                }
            });
        }

    </script>
    <script>
        var accChild = document.getElementsByClassName("accordian-child");
        var iu;

        for (iu = 0; iu < accChild.length; iu++) {
            accChild[iu].addEventListener("click", function () {
                this.classList.toggle("active2");
                var panelChild = this.nextElementSibling;

                // Close all other panels
                var panelsChild = document.getElementsByClassName("panel-child");
                for (var j2 = 0; j2 < panelsChild.length; j2++) {
                    if (panelsChild[j2] !== panelChild) {
                        panelsChild[j2].style.display = "none";
                        var activeAccordians2 = document.querySelectorAll(
                            ".accordian-child.active2"
                        );
                        for (var k2 = 0; k2 < activeAccordians2.length; k2++) {
                            activeAccordians2[k2].classList.remove("active2");
                        }
                    }
                }

                if (panelChild.style.display === "block") {
                    panelChild.style.display = "none";
                    this.classList.remove("active2"); // Remove "active" class when panel is closed
                } else {
                    panelChild.style.display = "block";
                    this.classList.add("active2"); // Add "active" class when panel is open
                }
            });
        }

    </script>
    <script>
        var accM = document.getElementsByClassName("accordian-main");
        var l;

        for (l = 0; l < accM.length; l++) {
            accM[l].addEventListener("click", function () {
                this.classList.toggle("activeMain");
                var panelM = this.nextElementSibling;
                if (panelM.style.display === "block") {
                    panelM.style.display = "none";
                } else {
                    panelM.style.display = "block";
                }
            });
        }
        $(".accordian-main").click();

    </script>
    <script>
        // ============================================slider
        (function () {
            "use strict";

            var carousels = function () {
                $(".owl-carousel1").owlCarousel({
                    loop: true,
                    center: true,
                    margin: 0,
                    responsiveClass: true,
                    nav: false,
                    autoplay: true,
                    autoplayTimeout: 1000,
                    autoplayHoverPause: true,
                    responsive: {
                        0: {
                            items: 1,
                            nav: false
                        },
                        680: {
                            items: 1,
                            nav: false,
                            loop: false
                        },
                        1000: {
                            items: 3.4,
                            nav: true
                        }
                    }
                });
            };

            (function ($) {
                carousels();
            })(jQuery);
        })();

    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const buttons = document.querySelectorAll(".nav__button");
            const megaMenus = document.querySelectorAll(".mega-menu");

            buttons.forEach((button) => {
                button.addEventListener("click", function () {
                    const slug = button.getAttribute("data-slug");
                    const correspondingMenu = document.getElementById(slug);

                    // Toggle the mega-menu's active state
                    if (correspondingMenu) {
                        if (correspondingMenu.classList.contains("mega-menu--active")) {
                            // If the mega-menu is already active, remove the class
                            correspondingMenu.classList.remove("mega-menu--active");
                        } else {
                            // Otherwise, add the class and remove it from all other mega-menus
                            megaMenus.forEach((menu) => {
                                menu.classList.remove("mega-menu--active");
                            });
                            correspondingMenu.classList.add("mega-menu--active");
                        }
                    }
                });
            });
        });

    </script>
    <script>
       jQuery(document).on('click', '#search-post-btn', function () {
    let asset_path = "{{ asset('uploads/content/') }}";
    let value = $('#search-post-input').val();
    if (value.length < 3) {
        alert('Search Characters should be 4 or more');
        return;
    }
    $.ajax({
        type: 'POST',
        url: "{{ route('admin.banner.search') }}",
        data: {
            search: value
        },
        dataType: "JSON",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            $('.search-list').html('');
            if (data.status == 'success') {
                let html = '';
                data.data.forEach(element => {
                    html += `
                        <div class="search-result-card">
                            <a href="/details/${element?.slug}">
                                <img src="${asset_path}/${element?.post_media?.[0]?.file_name}" />
                                <h4 class="search-title">${element?.title}</h4>
                            </a>
                        </div>
                    `;
                });
                $('.search-list').html(html);
                $('.search-list').addClass('modal-search-list'); // Add a class to style the search list
            } else {
                $('.search-list').html(`<li><p class="text-center">${data.message}</p></li>`);
            }
        }
    });
});

    </script>
    @yield('script')

</body>

</html>
