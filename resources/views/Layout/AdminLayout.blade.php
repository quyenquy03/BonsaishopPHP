<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('/public/Admin/assets/img/favicon.png')}}" rel="icon">
    <link href="{{asset('/public/Admin/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
    <!-- page css -->


    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('/public/Admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/public/Admin/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('/public/Admin/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('/public/Admin/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link href="{{asset('/public/Admin/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
    <link href="{{asset('/public/Admin/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('/public/Admin/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('/public/Admin/assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('/public/Admin/assets/css/Custom.css')}}" rel="stylesheet">

    <!-- =======================================================
    * Template Name: NiceAdmin - v2.4.1
    * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

    <header id="header" class="header fixed-top d-flex align-items-center">
        <input value="{{csrf_token()}}" hidden name="token" id="token" />
        <div class="d-flex align-items-center text-center justify-content-between">
            <a href="{{URL("/")}}" class="logo d-block align-items-center">
                <img src="https://logos.textgiraffe.com/logos/logo-name/Admin-designstyle-popstar-m.png" alt="">
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->
    
        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->
    
        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
    
                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->
    
                <li class="nav-item dropdown">
    
                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-primary badge-number">4</span>
                    </a><!-- End Notification Icon -->
    
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                        <li class="dropdown-header">
                            You have 4 new notifications
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
    
                        <li class="notification-item">
                            <i class="bi bi-exclamation-circle text-warning"></i>
                            <div>
                                <h4>Lorem Ipsum</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>30 min. ago</p>
                            </div>
                        </li>
    
                        <li>
                            <hr class="dropdown-divider">
                        </li>
    
                        <li class="notification-item">
                            <i class="bi bi-x-circle text-danger"></i>
                            <div>
                                <h4>Atque rerum nesciunt</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>1 hr. ago</p>
                            </div>
                        </li>
    
                        <li>
                            <hr class="dropdown-divider">
                        </li>
    
                        <li class="notification-item">
                            <i class="bi bi-check-circle text-success"></i>
                            <div>
                                <h4>Sit rerum fuga</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>2 hrs. ago</p>
                            </div>
                        </li>
    
                        <li>
                            <hr class="dropdown-divider">
                        </li>
    
                        <li class="notification-item">
                            <i class="bi bi-info-circle text-primary"></i>
                            <div>
                                <h4>Dicta reprehenderit</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>4 hrs. ago</p>
                            </div>
                        </li>
    
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="dropdown-footer">
                            <a href="#">Show all notifications</a>
                        </li>
    
                    </ul><!-- End Notification Dropdown Items -->
    
                </li><!-- End Notification Nav -->
    
                <li class="nav-item dropdown">
    
                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-chat-left-text"></i>
                        <span class="badge bg-success badge-number">3</span>
                    </a><!-- End Messages Icon -->
    
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                        <li class="dropdown-header">
                            You have 3 new messages
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
    
                        <li class="message-item">
                            <a href="#">
                                <img src="{{asset('/public/Admin/assets/img/messages-1.jpg')}}" alt="" class="rounded-circle">
                                <div>
                                    <h4>Maria Hudson</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>4 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
    
                        <li class="message-item">
                            <a href="#">
                                <img src="{{asset('/public/Admin/assets/img/messages-1.jpg')}}" alt="" class="rounded-circle">
                                <div>
                                    <h4>Anna Nelson</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>6 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
    
                        <li class="message-item">
                            <a href="#">
                                <img src="{{asset('/public/Admin/assets/img/messages-1.jpg')}}" alt="" class="rounded-circle">
                                <div>
                                    <h4>David Muldon</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>8 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
    
                        <li class="dropdown-footer">
                            <a href="#">Show all messages</a>
                        </li>
    
                    </ul><!-- End Messages Dropdown Items -->
    
                </li><!-- End Messages Nav -->
    
                <li class="nav-item dropdown pe-3">
    
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="{{asset('/public/Admin/assets/img/messages-1.jpg')}}" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
                    </a><!-- End Profile Iamge Icon -->
    
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>Kevin Anderson</h6>
                            <span>Web Designer</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
    
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
    
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
    
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                                <i class="bi bi-question-circle"></i>
                                <span>Need Help?</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
    
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>
    
                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->
    
            </ul>
        </nav><!-- End Icons Navigation -->
    
    </header>
    
    
    
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
        <a class="nav-link" asp-controller="Home" asp-action="Index">
            <i class="bi bi-grid"></i>
            <span>Tổng quan</span>
        </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#account-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-menu-button-wide"></i><span>Quản lý người dùng</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="account-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{URL('/admin/list-user')}}">
                    <i class="bi bi-circle"></i><span>Danh sách người dùng</span>
                </a>
            </li>
            <li>
                <a href="{{URL('/admin/create-user')}}">
                    <i class="bi bi-circle"></i><span>Thêm mới người dùng</span>
                </a>
            </li>
        </ul>
    </li><!-- End Components Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#category-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>Quản lý danh mục</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="category-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{URL('/admin/list-post-cate')}}">
                    <i class="bi bi-circle"></i><span>Danh mục bài viết</span>
                </a>
            </li>
            <li>
                <a href="{{URL('/admin/list-product-cate')}}">
                    <i class="bi bi-circle"></i><span>Danh mục sản phẩm</span>
                </a>
            </li>
            <li>
                <a href="{{URL('/admin/create-category')}}">
                    <i class="bi bi-circle"></i><span>Thêm mới danh mục</span>
                </a>
            </li>
        </ul>
    </li><!-- End Forms Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-layout-text-window-reverse"></i><span>Quản lý Menu</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a asp-action="Index" asp-controller="Menu">
                    <i class="bi bi-circle"></i><span>Danh sách Menu</span>
                </a>
            </li>
            <li>
                <a asp-action="Create" asp-controller="Menu">
                    <i class="bi bi-circle"></i><span>Thêm mới Menu</span>
                </a>
            </li>
        </ul>
    </li><!-- End Tables Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-bar-chart"></i><span>Quản lý sản phẩm</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a  href="{{URL('/admin/list-product')}}">
                    <i class="bi bi-circle"></i><span>Danh sách sản phẩm</span>
                </a>
            </li>
            <li>
                <a  href="{{URL('/admin/create-product')}}">
                    <i class="bi bi-circle"></i><span>Thêm mới sản phẩm</span>
                </a>
            </li>
            <li>
                <a  href="{{URL('/admin/list-deleted-product')}}">
                    <i class="bi bi-circle"></i><span>Sản phẩm đã xóa</span>
                </a>
            </li>
        </ul>
    </li><!-- End Charts Nav -->

    
    <li class="nav-item">
        <a class="nav-link collapsed" asp-action="Index" asp-controller="Order" asp-area="Admin">
            <i class="bi bi-gem"></i>
            <span>Quản lý phí đơn hàng</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" asp-action="Index" asp-controller="FeeShip" asp-area="Admin">
            <i class="bi bi-person"></i>
            <span>Quản lý phí vận chuyển</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-gem"></i><span>Quản lý bài viết</span><i class="bi bi-chevron-down ms-auto"></i>
         </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{URL('/admin/list-blog')}}">
                    <i class="bi bi-circle"></i><span>Danh sách bài viết</span>
                </a>
            </li>
            <li>
                <a href="{{URL('/admin/create-blog')}}">
                    <i class="bi bi-circle"></i><span>Thêm mới bài viết</span>
                </a>
            </li>
            <li>
                <a href="{{URL('/admin/list-deleted-blog')}}">
                    <i class="bi bi-circle"></i><span>Bài viết đã bị xóa</span>
                </a>
            </li>
        </ul>
    </li>
    
</ul>

</aside>

    <main id="main" class="main">
        @yield('content')
    </main><!-- End #main -->
    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
     <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="{{asset('/public/Admin/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('/public/Admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('/public/Admin/assets/vendor/chart.js/chart.min.js')}}"></script>
    <script src="{{asset('/public/Admin/assets/vendor/echarts/echarts.min.js')}}"></script>
    <script src="{{asset('/public/Admin/assets/vendor/quill/quill.min.js')}}"></script>
    <script src="{{asset('/public/Admin/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{asset('/public/Admin/assets/vendor/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('/public/Admin/assets/vendor/php-email-form/validate.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- page js -->
    
    <!-- Template Main JS File -->
    <script src="{{asset('/public/Admin/assets/js/main.js')}}"></script>

    <script>
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
</body>

</html>