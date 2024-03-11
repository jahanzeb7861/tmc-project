<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('pagename') | {{ $websiteSettings->title ?? 'Website Title' }}</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon.png') }}">
    <link rel="manifest" href="/site.webmanifest">
    <link href="{{ asset('admin-assets/css/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('admin-assets/js/loader.js') }}"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('admin-assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{ asset('admin-assets/css/dashboard/dash_2.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/plugins/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/plugins/select2/select2.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="{{ asset('admin-assets/plugins/loaders/custom-loader.css') }}" rel="stylesheet" type="text/css" />

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .tox-notifications-container {
            display: none !important;
        }

        span.select2.select2-container.mb-4.select2-container--default.select2-container--above.select2-container--focus {
            margin-bottom: 0px !important;
        }

        .select2-container--default .select2-selection--multiple {
            padding: 5px 8px !important;
        }

        .select2-container {
            margin-bottom: 0px !important;
        }

        div.dataTables_wrapper div.dataTables_paginate ul.pagination {
            justify-content: center;
        }

        .menu-categories li.menu i {
            font-size: 20px;
            vertical-align: bottom;
            margin-right: 5px;
        }

    </style>
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    {{-- @yield('styles') --}}
</head>


<body>

    <div id="app">
        <!-- BEGIN LOADER -->
        <div id="load_screen">
            <div class="loader">
                <div class="loader-content">
                    <div class="spinner-grow align-self-center"></div>
                </div>
            </div>
        </div>
        <!--  END LOADER -->

        <!--  BEGIN NAVBAR  -->
        <div class="header-container fixed-top">
            <header class="header navbar navbar-expand-sm">
                <ul class="navbar-item theme-brand flex-row  text-center">
                    @if ($websiteSettings->logo)
                    <li class="nav-item theme-logo">
                        <a href="{{ route('admin.dashboard.admin') }}">
                            <img src="{{ asset('uploads/website/' . $websiteSettings->logo) }}"
                                style="width: 35px;object-fit:cover"
                                alt="{{ $websiteSettings->title ?? 'Website Title' }}">
                        </a>
                    </li>
                    @endif

                    <li class="nav-item theme-text">
                        <a href="{{ route('admin.dashboard.admin') }}"
                            class="nav-link">{{ $websiteSettings->name ?? 'Website Name' }}</a>
                    </li>
                </ul>
                <ul class="navbar-item flex-row ml-md-auto">
                    <li class="nav-item dropdown user-profile-dropdown">
                        <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <img src="{{ asset('/uploads/users/default.jpg') }}" alt="">
                        </a>
                        <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                            <div class="">
                                <div class="dropdown-item">
                                    <a class="" href="{{ route('admin.profile.update') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        Profile
                                    </a>
                                </div>

                                <div class="dropdown-item">
                                    <a class="" href="{{ route('admin.logout') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-log-out">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                            <polyline points="16 17 21 12 16 7"></polyline>
                                            <line x1="21" y1="12" x2="9" y2="12">
                                            </line>
                                        </svg>
                                        Sign Out
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>

                </ul>
            </header>
        </div>
        <!--  END NAVBAR  -->

        <!--  BEGIN NAVBAR  -->
        <div class="sub-header-container">
            <header class="header navbar navbar-expand-sm">
                <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-menu">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg></a>

                <ul class="navbar-nav flex-row">
                    <li>
                        <div class="page-header">

                            <nav class="breadcrumb-one" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <span> @yield('pagename')</span>
                                    </li>
                                </ol>
                            </nav>

                        </div>
                    </li>
                </ul>

            </header>
        </div>
        <!--  END NAVBAR  -->


        <div class="main-container" id="container">

            <div class="overlay"></div>
            <div class="search-overlay"></div>

            <!--  BEGIN SIDEBAR  -->
            <div class="sidebar-wrapper sidebar-theme">
                <nav id="sidebar">
                    <ul class="list-unstyled menu-categories" id="accordionExample">
                        <li class="menu">
                            <a href="{{ route('admin.dashboard.admin') }}" aria-expanded="false"
                                class="dropdown-toggle">
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-home">
                                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                    </svg>
                                    <span>Dashboard</span>
                                </div>
                            </a>
                        </li>

                        @if (isset($menuItems) && count($menuItems) > 0)
                        <li class="menu">
                            @foreach ($menuItems as $menuItem)
                            <a href="#{{ $menuItem['id'] }}" data-toggle="collapse" aria-expanded="false"
                                class="dropdown-toggle collapsed">
                                <div class="">
                                    <i class="fa fa-navicon fa-solid"></i>
                                    <span>{{ $menuItem['label'] }}</span>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-chevron-right">
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg>
                                </div>
                            </a>
                            <ul class="submenu list-unstyled collapse" id="{{ $menuItem['id'] }}"
                                data-parent="#accordionExample">
                                <li>
                                    @if (isset($menuItem['subItems']) && count($menuItem['subItems']) > 0)
                                    <ul class="submenu list-unstyled">
                                        @foreach ($menuItem['subItems'] as $subItem)
                                        <li>
                                            <a href="{{ $subItem['url'] }}">{{ $subItem['label'] }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                            </ul>
                            @endforeach
                        </li>
                        @else
                        <!-- ADD HERE STATIC -->
                        <li class="menu">
                            <a href="#about" data-toggle="collapse" aria-expanded="false"
                                class="dropdown-toggle collapsed">
                                <div class="">
                                    <i class="fa fa-navicon fa-solid"></i>
                                    <span>About Mominabad</span>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-chevron-right">
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg>
                                </div>
                            </a>
                            <ul class="submenu list-unstyled collapse" id="about" data-parent="#accordionExample">
                                <li>
                                    <ul class="submenu list-unstyled">
                                        <!-- <li>
                                            <a href="/admin/page-edit/1">About Us</a>
                                        </li> -->
                                        <li>
                                            <a href="/admin/page-edit/2">Chairman Message</a>
                                        </li>
                                        <li>
                                            <a href="/admin/page-edit/3">Vision and Mission Statement</a>
                                        </li>
                                        <li>
                                            <a href="/admin/union_council/list">Union Councils List</a>
                                        </li>
                                        <li>
                                            <a href="/admin/staff/list">Staff</a>
                                        </li>
                                        <li>
                                            <a href="/admin/page-edit/6">Functions</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <a href="#services" data-toggle="collapse" aria-expanded="false"
                                class="dropdown-toggle collapsed">
                                <div class="">
                                    <i class="fa fa-navicon fa-solid"></i>
                                    <span>Services</span>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-chevron-right">
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg>
                                </div>
                            </a>
                            <ul class="submenu list-unstyled collapse" id="services" data-parent="#accordionExample">
                                <li>
                                    <ul class="submenu list-unstyled">
                                        <li>
                                            <a href="/admin/post/update/3">Schools</a>
                                        </li>
                                        <li>
                                            <a href="/admin/post/update/26">Dispensaries / Maternity Homes</a>
                                        </li>
                                        <li>
                                            <a href="/admin/post/update/27">Community Centers</a>
                                        </li>
                                        <li>
                                            <a href="/admin/post/update/28">Libraries</a>
                                        </li>
                                        <li>
                                            <a href="/admin/post/update/29">Hostpitals</a>
                                        </li>
                                        <li>
                                            <a href="/admin/post/update/30">Shelter Homes</a>
                                        </li>
                                        <li>
                                            <a href="/admin/post/update/31">Animal Shelters</a>
                                        </li>
                                        <li>
                                            <a href="/admin/post/update/33">Parks And Playgrounds</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <a href="#news" data-toggle="collapse" aria-expanded="false"
                                class="dropdown-toggle collapsed">
                                <div class="">
                                    <i class="fa fa-navicon fa-solid"></i>
                                    <span>News &amp; Media</span>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-chevron-right">
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg>
                                </div>
                            </a>
                            <ul class="submenu list-unstyled collapse" id="news" data-parent="#accordionExample">
                                <li>
                                    <ul class="submenu list-unstyled">
                                        <li>
                                            <a href="/admin/page-edit/7">Press Release</a>
                                        </li>
                                        <li>
                                            <a href="/admin/page-edit/8">Events</a>
                                        </li>
                                        <li>
                                            <a href="/admin/page-edit/9">Image Gallery</a>
                                        </li>
                                        <li>
                                            <a href="/admin/page-edit/10">Video Gallery</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <a href="#procurement" data-toggle="collapse" aria-expanded="false"
                                class="dropdown-toggle collapsed">
                                <div class="">
                                    <i class="fa fa-navicon fa-solid"></i>
                                    <span>Procurement</span>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-chevron-right">
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg>
                                </div>
                            </a>
                            <ul class="submenu list-unstyled collapse" id="procurement" data-parent="#accordionExample">
                                <li>
                                    <ul class="submenu list-unstyled">
                                        <li>
                                            <a href="/admin/tenders/list">Tenders</a>
                                        </li>
                                        <li>
                                            <a href="/admin/auctions/list">Auctions</a>
                                        </li>
                                        <li>
                                            <a href="/admin/budget/list">Budget</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <a href="#contact" data-toggle="collapse" aria-expanded="false"
                                class="dropdown-toggle collapsed">
                                <div class="">
                                    <i class="fa fa-navicon fa-solid"></i>
                                    <span>Contact Us</span>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-chevron-right">
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg>
                                </div>
                            </a>
                            <ul class="submenu list-unstyled collapse" id="contact" data-parent="#accordionExample">
                                <li>
                                    <ul class="submenu list-unstyled">
                                        <li>
                                            <a href="https://1339.gos.pk/">Complaint # 1339</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        @endif

                        <li class="menu">
                            <a href="#header" data-toggle="collapse" aria-expanded="false"
                                class="dropdown-toggle collapsed">
                                <div class="">
                                    <i class="fa fa-navicon fa-solid"></i>
                                    <span>Header</span>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-chevron-right">
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg>
                                </div>
                            </a>
                            <ul class="submenu list-unstyled collapse" id="header" data-parent="#accordionExample">
                                <li>
                                    <a href="{{ route('admin.header-categories.list') }}">Manage Category </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.post.show-list', ['type' => 'menu']) }}">Manage Posts
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="menu">
                            <a href="#home" data-toggle="collapse" aria-expanded="false"
                                class="dropdown-toggle collapsed">
                                <div class="">
                                    <i class="fa fa-navicon fa-solid"></i>
                                    <span>Home</span>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-chevron-right">
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg>
                                </div>
                            </a>
                            <ul class="submenu list-unstyled collapse" id="home" data-parent="#accordionExample">
                                <li>
                                    <a href="{{ route('admin.banner.update-form') }}">Banner Setting</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.menu.show-list') }}">Manage Nav Menu
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @if (auth()->user()->role == 'admin')
                        <!-- <li class="menu">
                            <a href="{{ route('admin.aside-categories.list') }}" aria-expanded="false"
                                class="dropdown-toggle">
                                <div class="">
                                    <i class="fa fa-list-alt fa-solid"></i>
                                    <span>Aside</span>
                                </div>
                            </a>
                        </li>
                        <li class="menu">
                            <a href="{{ route('admin.events.list') }}" aria-expanded="false" class="dropdown-toggle">
                                <div class="">
                                    <i class="fa fa-solid fa-calendar"></i>
                                    {{-- <i class="fa fa-users fa-solid"></i> --}}
                                    <span>Events</span>
                                </div>
                            </a>
                        </li> -->

                        <!-- <li class="menu">
                            <a href="{{ route('admin.banner.update-form') }}" aria-expanded="false"
                                class="dropdown-toggle">
                                <div class="">
                                    <i class="fa fa-solid fa-table-cells-large"></i>
                                    <span>Banner Setting</span>
                                </div>
                            </a>
                        </li> -->
                        <li class="menu">
                            <a href="{{ route('admin.anouncement.update-form') }}" aria-expanded="false"
                                class="dropdown-toggle">
                                <div class="">
                                    <i class="fa fa-bullhorn fa-solid fas"></i>
                                    <span>Anouncement</span>
                                </div>
                            </a>
                        </li>
                        <!-- <li class="menu">
                            <a href="{{ route('admin.listview.list') }}" aria-expanded="false" class="dropdown-toggle">
                                <div class="">
                                    <i class="fa-regular fa-file-pdf"></i>
                                    <span>List View</span>
                                </div>
                            </a>
                        </li> -->
                        <!-- <li class="menu">
                            <a href="{{ route('admin.team.list') }}" aria-expanded="false" class="dropdown-toggle">
                                <div class="">
                                    <i class="fa fa-user-tie fa-solid"></i>
                                    <span>Staff</span>
                                </div>
                            </a>
                        </li> -->
                        <li class="menu">
                            <a href="{{ route('admin.user.list') }}" aria-expanded="false" class="dropdown-toggle">
                                <div class="">
                                    <i class="fa fa-users fa-solid"></i>
                                    <span>Users</span>
                                </div>
                            </a>
                        </li>
                        <li class="menu">
                            <a href="{{ route('admin.chairman.list') }}" aria-expanded="false" class="dropdown-toggle">
                                <div class="">
                                    <i class="fa-solid fa-user-tie"></i>
                                    <span>Chairmans</span>
                                </div>
                            </a>
                        </li>
                        <li class="menu">
                            <a href="{{ route('admin.contact-problem.list') }}" aria-expanded="false"
                                class="dropdown-toggle">
                                <div class="">
                                    <i class="fa-solid fa-exclamation"></i>
                                    <span>Contact Problems</span>
                                </div>
                            </a>
                        </li>
                        <li class="menu">
                            <a href="{{ route('admin.contact.list') }}" aria-expanded="false" class="dropdown-toggle">
                                <div class="">
                                    <i class="fa-regular fa-id-card"></i>
                                    <span>Contacts List</span>
                                </div>
                            </a>
                        </li>
                        <li class="menu">
                            <a href="{{ route('admin.web-settings.site-form') }}" aria-expanded="false"
                                class="dropdown-toggle">
                                <div class="">
                                    <i class="fa fa-solid fa-sliders"></i>
                                    <span>Site Settings</span>
                                </div>
                            </a>
                        </li>
                        @endif
                        <li class="menu">
                            <a href="{{ route('admin.profile.update') }}" aria-expanded="false" class="dropdown-toggle">
                                <div class="">
                                    <i class="fa fa-gear fa-solid"></i>
                                    <span>Profile Settings</span>
                                </div>
                            </a>
                        </li>
                        <li class="menu">
                            <a href="{{ route('fronts.home') }}" aria-expanded="false" class="dropdown-toggle">
                                <div class="">
                                    <i class="fa fa-solid fa-globe"></i>
                                    <span>Website</span>
                                </div>
                            </a>
                        </li>

                        <li class="menu">
                            <a href="{{ route('admin.logout') }}" aria-expanded="false" class="dropdown-toggle">
                                <div class="">
                                    <i class="fa fa-solid fa-sign-out"></i>
                                    <span>Log-out</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!--  END SIDEBAR  -->


            @yield('content')



            <div class="footer-wrapper">
                <div class="footer-section f-section-1">

                </div>
                <div class="footer-section f-section-2">

                </div>
            </div>
        </div>
        <!-- delete modal -->
        <!-- Modal -->
        <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div id="alert"></div>
                    <form id="delete">
                        <input type="hidden" name="id" id="del_page_id">
                        <input type="hidden" id="delete_route">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete !</h5>
                            <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                        </div>
                        <div class="modal-body">
                            Are You Sure to Delete This ?
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sbmit">Yes</button>
                            <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- END MAIN CONTAINER -->
        <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
        <script src="{{ asset('admin-assets/js/libs/jquery-3.1.1.min.js') }}"></script>
        <script src="{{ asset('admin-assets/bootstrap/js/popper.min.js') }}"></script>
        <script src="{{ asset('admin-assets/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('admin-assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('admin-assets/js/app.js') }}"></script>
        <script>
            $(document).ready(function () {
                App.init();
            });

        </script>
        <script src="{{ asset('admin-assets/js/custom.js') }}"></script>
        <!-- END GLOBAL MANDATORY SCRIPTS -->

        <script src="{{ asset('admin-assets/js/dashboard/dash_1.js') }}"></script>
        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
        <script src="{{ asset('admin-assets/js/customize.js') }}"></script>

        <script src="{{ asset('admin-assets/plugins/table/datatable/datatables.js') }}"></script>
        <script src="{{ asset('admin-assets/plugins/select2/select2.min.js') }}"></script>
        <script src="{{ asset('admin-assets/plugins/select2/custom-select2.js') }}"></script>

        </script>
        <script>
            jQuery(document).ready(function () {

                // $('#summernote').summernote();
                $('#zero-config').DataTable({
                    "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
                        "<'table-responsive'tr>" +
                        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
                    "oLanguage": {
                        "oPaginate": {
                            "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                            "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                        },
                        "sInfo": "Showing page _PAGE_ of _PAGES_",
                        "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                        "sSearchPlaceholder": "Search...",
                        "sLengthMenu": "Results :  _MENU_",
                    },
                    "stripeClasses": [],
                    "lengthMenu": [20, 50, 100, 250, 500],
                    "pageLength": 20
                });



                jQuery(document).on('click', '.delete-record', function () {
                    let route = $(this).attr('data-route');
                    $("#delete_route").val(route);

                    $("#deletemodal").modal("show")

                })

                function dele(id) {
                    $("#del_page_ids").val(id);
                }
                $(".tagging").select2({
                    tags: true
                });




                let url = removeLastTwoSegments(window.location.href);

                jQuery('.menu-categories li.menu').each(function () {
                    if (removeLastTwoSegments(jQuery(this).find('a').attr('href')) == url) {

                        jQuery(this).find('a').attr("data-active", 'true');
                    }
                });
            });

            function removeLastTwoSegments(url) {
                // var urlSegments = url.split('/');
                // // Ensure the URL has at least three segments before attempting to remove the last two
                // if (urlSegments.length >= 3) {
                //     // Remove the last two segments
                //     urlSegments.splice(-2, 2);
                //     // Reassemble the URL
                //     return urlSegments.join('/');
                // } else {
                // If the URL doesn't have enough segments, return the original URL
                return url;
                // }
            }

        </script>

        @yield('scripts')

</body>

</html>
