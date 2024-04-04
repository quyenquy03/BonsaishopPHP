
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- set the encoding of your site -->
	<meta charset="utf-8">
    <!-- set the Compatible of your site -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- set the page title -->
	<title>Botanical - HTML5 Ecommerce Template</title>
	<!-- include the site Google Fonts stylesheet -->
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700%7CRoboto:300,400,500,700,900&display=swap" rel="stylesheet">
	<!-- include the site bootstrap stylesheet -->
	<link rel="stylesheet" href="{{asset('/public/client/css/bootstrap.css')}}">
	<!-- include the site fontawesome stylesheet -->
	<link rel="stylesheet" href="{{asset('/public/client/css/fontawesome.css')}}">
	
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="{{asset('/public/client/css/style.css')}}">
	<!-- include theme plugins setting stylesheet -->
	<link rel="stylesheet" href="{{asset('/public/client/css/plugins.css')}}">
	<!-- include theme color setting stylesheet -->
	<link rel="stylesheet" href="{{asset('/public/client/css/color.css')}}">
	<!-- include theme responsive setting stylesheet -->
	<link rel="stylesheet" href="{{asset('/public/client/css/responsive.css')}}">
	<link rel="stylesheet" href="{{asset('/public/client/css/Custom.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">
</head>
<body>
	<!-- pageWrapper -->
	<div id="pageWrapper">
		<!-- header -->
        <header id="header" class="position-relative">
            <!-- headerHolderCol -->
            <div class="headerHolderCol py-2">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12 col-sm-4">
                            <a href="javascript:void(0);" class="tel d-flex align-items-end"><i class="icon-call mr-2"></i>  Hotline: (602) 462 8889</a>
                        </div>
                        <div class="col-12 col-sm-4 text-center">
                            <span class="txt d-block">Wellcome To BonsaiShop</span>
                        </div>
                        <div class="col-12 col-sm-4">
                            <!-- langListII -->
                            <ul class="nav nav-tabs langListII align-items-center justify-content-end border-bottom-0">
                                <li class="language-box">
                                    <span class="language-option">VI</span>
                                    <span class="language-bar">|</span>
                                    <span class="language-option">EN</span>
                                </li>
                                <li class="language-box">
                                    <a asp-action="Login" asp-controller="Account" class="language-option">Đăng nhập</a>
                                </li>
                                {{-- @if(ViewBag.FullName != null)
                                {
                                    <li class="m-0 account-menu-box">
                                        <a class="account-box" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="true" aria-expanded="false">
                                            <div class="account-name">
                                                <img class="user-avatar" src="~/images/@ViewBag.Avatar" alt="">
                                                <div class="user-name">
                                                    <span>@ViewBag.FullName</span>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu account-menu pl-4 pr-4 border-0">
                                            <a class="dropdown-item" href="/trang-ca-nhan">Trang cá nhân</a>
                                            @if(ViewBag.RoleId == 1)
                                            {
                                                <a class="dropdown-item" href="/Admin">Trang quản trị</a>
                                            }
                                            <a class="dropdown-item" href="/don-hang">Đơn hàng của tôi</a>
                                            <a class="dropdown-item" asp-action="Logout" asp-controller="Account">Đăng xuất</a>
                                        </div>
                                    </li>
                                } else
                                {
                                    <li class="language-box">
                                        <a asp-action="Login" asp-controller="Account" class="language-option">Đăng nhập</a>
                                    </li>
                                } --}}

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- headerHolder -->
            <div class="headerHolder">
                <div class="container py-1">
                    <div class="row align-items-center">
                        <div class="col-6 col-sm-2">
                            <!-- mainLogo -->
                            <div class="logo">
                                <a href="/"><img src="{{asset('/public/Client/images/LogoBonsaiShop.jpg')}}" alt="Botanical" class="img-fluid"></a>
                            </div>
                        </div>
                        <div class="col-6 col-sm-7 col-lg-8 static-block">
                            <!-- mainHolder -->
                            <div class="mainHolder pt-lg-5 pt-3 justify-content-center">
                                <!-- pageNav2 -->
                                <nav class="navbar navbar-expand-lg navbar-light p-0 pageNav2 position-static">
                                    <button type="button" class="navbar-toggle collapsed position-relative" data-toggle="collapse" data-target="#navbarNav" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarNav">
                                        <ul class="navbar-nav mx-auto  d-inline-block">
                                            <li class="nav-item">
                                                <a class="d-block" href="/">Trang chủ</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="d-block" href="/gioi-thieu">Giới thiệu</a>
                                            </li>
                                            <li class="nav-item dropdown">
                                                <a class="dropdown-toggle d-block" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sản phẩm</a>
                                                <ul class="list-unstyled text-capitalize dropdown-menu mt-0 py-0">
                                                    <li class="d-block mx-0"><a href="/danh-muc-san-pham">Danh muc san pham</a></li>
                                                    <li class="d-block mx-0"><a href="/danh-muc-san-pham">Danh muc san pham</a></li>
                                                    <li class="d-block mx-0"><a href="/danh-muc-san-pham">Danh muc san pham</a></li>
                                                    <li class="d-block mx-0"><a href="/danh-muc-san-pham">Danh muc san pham</a></li>
                                                    <li class="d-block mx-0"><a href="/danh-muc-san-pham">Danh muc san pham</a></li>
                                                    {{-- @foreach (var item in ViewBag.ListCategoryProduct)
                                                    {
                                                        var url = Functions.UrlLink(item.CategoryName, item.CategoryId);
                                                        <li class="d-block mx-0"><a href="/danh-muc-san-pham/@url">@item.CategoryName</a></li>
                                                    } --}}
                                                </ul>
                                            </li>
                                            <li class="nav-item dropdown">
                                                <a class="dropdown-toggle d-block" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dịch vụ</a>
                                                <ul class="list-unstyled text-capitalize dropdown-menu mt-0 py-0">
                                                    <li class="d-block mx-0"><a href="/dich-vu/cho-thue-cay-canh">Cho thuê cây cảnh</a></li>
                                                    <li class="d-block mx-0"><a href="/dich-vu/cham-soc-cay-canh">Chăm sóc cây cảnh</a></li>
                                                </ul>
                                            </li>
                                            
                                            <li class="nav-item dropdown">
                                                <a class="dropdown-toggle d-block" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kiến thức cây cảnh</a>
                                                <ul class="list-unstyled text-capitalize dropdown-menu mt-0 py-0">
                                                    <li class="d-block mx-0"><a href="/dich-vu/cham-soc-cay-canh">Chăm sóc cây cảnh</a></li>
                                                    <li class="d-block mx-0"><a href="/dich-vu/cham-soc-cay-canh">Chăm sóc cây cảnh</a></li>
                                                    <li class="d-block mx-0"><a href="/dich-vu/cham-soc-cay-canh">Chăm sóc cây cảnh</a></li>
                                                    <li class="d-block mx-0"><a href="/dich-vu/cham-soc-cay-canh">Chăm sóc cây cảnh</a></li>
                                                    <li class="d-block mx-0"><a href="/dich-vu/cham-soc-cay-canh">Chăm sóc cây cảnh</a></li>
                                                    {{-- @foreach (var item in ViewBag.ListCategoryPost)
                                                    {
                                                        var url = Functions.UrlLink(item.CategoryName, item.CategoryId);
                                                        <li class="d-block mx-0"><a href="/danh-muc-bai-viet/@url">@item.CategoryName</a></li>
                                                    } --}}
                                                </ul>
                                            </li>
                                            <li class="nav-item">
                                                <a class="d-block" href="/lien-he">Liên hệ</a>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
                        <div class="col-sm-2 col-lg-2">
                            <!-- wishListII -->
                            <ul class="nav nav-tabs wishListII  justify-content-end border-bottom-0">
                                <li class="nav-item space-bar ml-0 mr-3"><a class="nav-link icon-box  icon-heart" href="javascript:void(0);"></a></li>
                                <li class="nav-item ml-3"><a class="nav-link icon-box position-relative icon-cart" href="/gio-hang"><span class="num rounded d-block">2</span></a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </header>

		<!-- main -->
		<main class="pb-10" style="background: #f9f9f9;">
			@yield('content')
		</main>
        <aside class="footerHolder overflow-hidden bg-lightGray pt-xl-10 pb-xl-10 pt-lg-10 pb-lg-8 pt-md-12 pb-md-8 pt-10" style="background: #f4f4f4;">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6 col-lg-4 mb-lg-0 mb-4">
                        <h3 class="headingVI fwEbold text-uppercase mb-7">Contact Us</h3>
                        <ul class="list-unstyled footerContactList mb-3">
                            <li class="mb-3 d-flex flex-nowrap pr-xl-20 pr-0"><span class="icon icon-place mr-3"></span> <address class="fwEbold m-0">Address: London Oxford Street, 012 United Kingdom.</address></li>
                            <li class="mb-3 d-flex flex-nowrap"><span class="icon icon-phone mr-3"></span> <span class="leftAlign">Phone : <a href="javascript:void(0);">(+032) 3456 7890</a></span></li>
                            <li class="email d-flex flex-nowrap"><span class="icon icon-email mr-2"></span> <span class="leftAlign">Email:  <a href="javascript:void(0);">Botanicalstore@gmail.com</a></span></li>
                        </ul>
                        <ul class="list-unstyled followSocailNetwork d-flex flex-nowrap">
                            <li class="fwEbold mr-xl-11 mr-md-8 mr-3">Follow  us:</li>
                            <li class="mr-xl-6 mr-md-5 mr-2"><a href="javascript:void(0);" class="fab fa-facebook-f"></a></li>
                            <li class="mr-xl-6 mr-md-5 mr-2"><a href="javascript:void(0);" class="fab fa-twitter"></a></li>
                            <li class="mr-xl-6 mr-md-5 mr-2"><a href="javascript:void(0);" class="fab fa-pinterest"></a></li>
                            <li class="mr-2"><a href="javascript:void(0);" class="fab fa-google-plus-g"></a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 pl-xl-14 mb-lg-0 mb-4">
                        <h3 class="headingVI fwEbold text-uppercase mb-6">Information</h3>
                        <ul class="list-unstyled footerNavList">
                            <li class="mb-1"><a href="javascript:void(0);">New Products</a></li>
                            <li class="mb-2"><a href="javascript:void(0);">Top Sellers</a></li>
                            <li class="mb-2"><a href="javascript:void(0);">Our Blog</a></li>
                            <li class="mb-2"><a href="javascript:void(0);">About Our Shop</a></li>
                            <li><a href="javascript:void(0);">Privacy policy</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 pl-xl-12 mb-lg-0 mb-4">
                        <h3 class="headingVI fwEbold text-uppercase mb-7">My Account</h3>
                        <ul class="list-unstyled footerNavList">
                            <li class="mb-1"><a href="javascript:void(0);">My account</a></li>
                            <li class="mb-2"><a href="javascript:void(0);">Discount</a></li>
                            <li class="mb-2"><a href="javascript:void(0);">Orders history</a></li>
                            <li><a href="javascript:void(0);">Personal information</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-2 pl-xl-18 mb-lg-0 mb-4">
                        <h3 class="headingVI fwEbold text-uppercase mb-5">PRODUCTS</h3>
                        <ul class="list-unstyled footerNavList">
                            <li class="mb-2"><a href="javascript:void(0);">Delivery</a></li>
                            <li class="mb-2"><a href="javascript:void(0);">Legal notice</a></li>
                            <li class="mb-2"><a href="javascript:void(0);">Prices drop</a></li>
                            <li class="mb-2"><a href="javascript:void(0);">New products</a></li>
                            <li><a href="javascript:void(0);">Best sales</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
			{{-- @await Html.PartialAsync("_FooterPartialView") --}}
	</div>
	<!-- include jQuery library -->
	<script src="{{asset('/public/client/js/jquery-3.4.1.min.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<!-- include bootstrap popper JavaScript -->
	<script src="{{asset('/public/client/js/popper.min.js')}}"></script>
	<!-- include bootstrap JavaScript -->
	<script src="{{asset('/public/client/js/bootstrap.min.js')}}"></script>
	<!-- include custom JavaScript -->
	<script src="{{asset('/public/client/js/jqueryCustome.js')}}"></script>
	<script src="{{asset('/public/client/js/main.js')}}"></script>

	<script src="~/js/site.js" asp-append-version="true"></script>
	<script>
		$(document).ready(function () {
			$("#BestSellerCarousel").owlCarousel({
				items: 5, // Number of cards shown in each slide
				loop: true, // Continuously loop the carousel
				margin: 20, // Space between cards
				nav: true, // Show navigation buttons
				autoPlay: true,
				pagination: true,
				paginationSpeed: 3000,
				autoplayTimeout: 3000,
				navText: ["<i class='fas fa-chevron-left'></i>", "<i class='fas fa-chevron-right'></i>"], // Custom navigation icons
				responsive: {
					0: {
						items: 1 // Number of cards shown in the carousel for smaller screens
					},
					768: {
						items: 2 // Number of cards shown in the carousel for medium screens
					},
					992: {
						items: 4 // Number of cards shown in the carousel for large screens
					}
				}
			});
			$("#myCarousel").owlCarousel({
				items: 5, // Number of cards shown in each slide
				loop: true, // Continuously loop the carousel
				margin: 20, // Space between cards
				nav: false, // Show navigation buttons
				autoPlay: true,
				pagination: true,
				paginationSpeed: 3000,
				autoplayTimeout: 3000,
				navText: ["<i class='fas fa-chevron-left'></i>", "<i class='fas fa-chevron-right'></i>"], // Custom navigation icons
				responsive: {
					0: {
						items: 1 // Number of cards shown in the carousel for smaller screens
					},
					768: {
						items: 2 // Number of cards shown in the carousel for medium screens
					},
					992: {
						items: 3 // Number of cards shown in the carousel for large screens
					}
				}
			});
			$(".addcart-btn").on("click", function() {
				var productid = $(this).data("productid");
				$.ajax({
					url: "/Cart/AddToCart",
					type: "Post",
					data: {
						productid: productid,
					},
					success: function (data) {
						if (data.status == 0) {
							toastr.success("Đã thêm sản phẩm vào giỏ hàng");
						} else {
							toastr.error("Đang bị lỗi, vui lòng thử lại sau");
						}
					},
				})
			})
			$(".favourite-btn").on("click", function () {
				var productid = $(this).data("productid");
				$.ajax({
					url: "/Product/AddToFavouritePorduct",
					type: "Post",
					data: {
						productid: productid,
					},
					success: function (data) {
						if (data.status == 0) {
							toastr.success(data.message);
						} else {
							toastr.error(data.message);
						}
					},
				})
			})
			$(".delete-cart-item").on("click", function() {
				var productid = $(this).data("productid");
				$.ajax({
					url: "/Cart/RemoveCart",
					type: "Post",
					data: {
						productid: productid,
					},
					success: function (data) {
						if (data.status == 0) {
							$("#row-" + productid).remove();
							if(data.cartnumber == 0) {
								window.location.reload();
							}
							toastr.success("Đã xóa sản phẩm khỏi giỏ hàng");
						} else {
							toastr.error("Đang bị lỗi, vui lòng thử lại sau");
						}
					},
				})
			});

			$(".btn-decrease").on("click", function () {
				var productid = $(this).data("productid");
				var quantity = +$("#input-"+productid).val();
				if(quantity > 1) {
					$("#input-" + productid).val(quantity - 1);
					$.ajax({
						url: "/Cart/DecreaseCount",
						type: "Post",
						data: {
							productid: productid,
						},
						success: function (data) {
							if (data.status == 0) {
								$("#total-" + productid).text(data.totalprice);
								$(".total-price").text(data.totalcart);
								$(".total-checkout").text(data.totalcart);
							//	toastr.success("Đã xóa sản phẩm khỏi giỏ hàng");
							} else {
								toastr.error("Đang bị lỗi, vui lòng thử lại sau");
							}
						},
					})
				}
			});
			$(".btn-increase").on("click", function () {
				var productid = $(this).data("productid");
				var quantity = +$("#input-" + productid).val();
				if (quantity < 15) {
					$("#input-" + productid).val(quantity + 1);
					$.ajax({
						url: "/Cart/IncreaseCount",
						type: "Post",
						data: {
							productid: productid,
						},
						success: function (data) {
							if (data.status == 0) {
								$("#total-" + productid).text(data.totalprice);
								$(".total-price").text(data.totalcart);
								$(".total-checkout").text(data.totalcart);
								//	toastr.success("Đã xóa sản phẩm khỏi giỏ hàng");
							} else {
								toastr.error("Đang bị lỗi, vui lòng thử lại sau");
							}
						},
					})
				}
			});
			$('.choose').on('change', function () {
                var id = $(this).val();
                var action = $(this).data('name');
                var result = '';
                if(action == "province") {
                    result = "districts";
                } else if (action == "district") {
                    result = "commune"
                }

                $.ajax({
                    url: "/Admin/FeeShip/ChooseLocation",
                    type: "Post",
                    data: {
                        id: id,
                        action : action
                    },
                    success: function (data) {
                        if (data.status == 0) {
                            $('#' + result).html(data.content);
                        }
                    },
                })
            });
			$(".goto-login").on("click", function() {
				alert("Bạn phải đăng nhập trước khi thanh toán")
			});
		});
	</script>
	<script>
		document.querySelectorAll('[rel="prev"]')[0].innerHTML = "<"
		document.querySelectorAll('[rel="next"]')[0].innerHTML = ">"
	</script>
</body>
</html>