
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
        <x-HeaderComponent />
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
					url: "{{URL("/cart/add-to-cart")}}",
					type: "GET",
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
					url: "{{URL("/cart/delete-cart-item")}}",
					type: "GET",
					data: {
						productid: productid,
					},
					success: function (data) {
						if (data.status == 0) {
							$("#row-" + productid).remove();
							toastr.success("Đã xóa sản phẩm khỏi giỏ hàng");
                            $(".total-price").text(data.total.toLocaleString('it-IT', {style : 'currency', currency : 'VND'}));
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
						url: "{{URL("/cart/decrease-cart")}}",
						type: "GET",
						data: {
							productid: productid,
						},
						success: function (data) {
							if (data.status == 0) {
								$("#total-" + productid).text(data.totalCheckout.toLocaleString('it-IT', {style : 'currency', currency : 'VND'}));
								$(".total-price").text(data.total.toLocaleString('it-IT', {style : 'currency', currency : 'VND'}));
								$(".total-checkout").text(data.total.toLocaleString('it-IT', {style : 'currency', currency : 'VND'}));
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
						url: "{{URL("/cart/increase-cart")}}",
						type: "GET",
						data: {
							productid: productid,
						},
						success: function (data) {
							if (data.status == 0) {
								$("#total-" + productid).text(data.totalCheckout.toLocaleString('it-IT', {style : 'currency', currency : 'VND'}));
								$(".total-price").text(data.total.toLocaleString('it-IT', {style : 'currency', currency : 'VND'}));
								$(".total-checkout").text(data.total.toLocaleString('it-IT', {style : 'currency', currency : 'VND'}));
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
                    url: "{{URL('/choose-location')}}",
                    type: "GET",
                    data: {
                        id: id,
                        action : action
                    },
                    success: function (data) {
                        console.log(data.content)
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