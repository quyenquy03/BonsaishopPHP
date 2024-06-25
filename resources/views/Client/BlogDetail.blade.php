@extends('Layout.MainLayout')
@section('content')
<section class="left-sidebar-layout detail-section container-section">
	<div class="container">
		<div class="content-box">
			<div class="row	">
				<div class="col-xl-3 col-lg-3 col-md-12">
                    <div class="sidebar-box product-one-col">
                        <div class="search-box">
                            <form method="post" asp-action="ProductByCategory" asp-controller="Product">
                                <div class="search-input">
                                    <input class="search-text" name="searchinput" placeholder="Nhập thông tin tìm kiếm..." />
                                    <span class="search-icon"><i class="fa fa-search"></i></span>
                                </div>
                            </form>
                        </div>
                        <div class="category-box">
                            <h4 class="sidebar-header-title text-center">Danh mục sản phẩm</h4>
                            <ul class="list-category sidebar_nav">
                                @foreach ($ListCategory as $key => $value)
                                    <li>
                                        <a href="{{URL("/danh-muc-bai-viet/$value->CategoryID-$value->Alias")}}" class="active">
                                            <span class="menu-text">{{$value->CategoryName}}</span>
                                        </a>
                                    </li>
                                @endforeach
                                <li>
                                    <a href="{{URL("/danh-muc-bai-viet/0-tat-ca-bai-viet")}}" class="active">
                                        <span class="menu-text">Tất cả danh mục</span>
                                    </a>
                                </li>
                            </ul>
                        </div>    
                    </div>
				</div>
				<div class="col-xl-9 col-lg-9 col-md-12">
					<div class="main-content-box">
						<div class="breadcrumb-header">
							<a href="/">Trang chủ</a>
							<span>></span>
							<a href="">Bài viết</a>
							<span>></span>
							<a href="">{{$DetailBlog->CategoryName}}</a>
						</div>
					</div>

					<section class="featureSec main-content-box container overflow-hidden mt-3 p-3 px-5">
						<div class="row">
							<div class="w-100">
								<img src="{{URL("/public/images/$DetailBlog->BlogImage")}}" class="w-100" />
							</div>
							<h4 class="mt-3 mb-0">{{$DetailBlog->BlogName}}</h4>
						</div>
					</section>

					<section class="featureSec main-content-box container overflow-hidden mt-3 p-3 px-5">
						<div class="blog-detail-content">
							{!! $DetailBlog->BlogDetail !!}
						</div>
                    </section>
					<section class="featureSec main-content-box container overflow-hidden mt-3 p-3 px-5">
						<div class="comment-input-box checkout-session">
							<div class="row">
								<div class="col-sm-12 col-lg-12 col-xl-12">
									<div class="form-group">
										<textarea id="content-comment" class="form-control"
												  placeholder="Nhập bình luận của bạn..."></textarea>
									</div>
								</div>
								<div class="col-12 text-end">
									<button class="btn-send-comment" style="background-color: #29da54; color: #fff;" data-postid="{{$DetailBlog->BlogID}}"
											data-userid="{{$UserID}}">
										Gửi ý kiến
									</button>
								</div>
							</div>
						</div>
						<hr class="invis3">
						<div class="comment-input-box mt-3">
							<div class="row">
								<div class="col-12">
									<h4 class="mb-1">Tất cả bình luận</h4>
								</div>
								<div class="comment-list col-12">
								</div>
							</div>
						</div>
                    </section>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="featureSec main-content-box container overflow-hidden mt-3 p-3 px-5">
	<div class="row">
		<!-- mainHeader -->
		<header class="col-12 mainHeader mb-4 text-center">
			<h1 class="headingIV playfair fwEblod mb-4">Bài viết liên quan</h1>
			<span class="headerBorder d-block mb-5"><img src="{{URL('/public/client/images/hbdr.png')}}" alt="Header Border" class="img-fluid img-bdr"></span>
			<p>Những bài viết chia sẻ kiến thức chăm sóc cây cảnh </p>
		</header>
	</div>

	<div class="row">
		@foreach ($ListBlog as $key => $value)
            @php
                $url = URL("/bai-viet/$value->BlogID-$value->BlogSlug");
            @endphp
			<div class="col-12 col-sm-6 col-lg-4">
				<div class="newsPostColumn text-center px-2 pb-6 mb-6">
					<div class="imgHolder position-relative mb-6">
						<a href="{{$url}}">
							<img src="{{URL("/public/images/$value->BlogImage")}}" alt="image description" class="img-fluid w-100">
							<time class="time position-absolute py-3 px-1" datetime="2019-02-03 20:00"> <strong class="fwEbold d-block mb-1">20</strong> Tháng 10</time>
						</a>
					</div>
					<h2 class="headingV fwEbold mb-2 truncate-text truncate-2-line"><a href="@url">{{$value->BlogName}}</a></h2>
					<p class="mb-0 truncate-text truncate-3-line">{{$value->BlogDesc}}</p>
					<div class="d-flex justify-content-between mt-2 px-2">
						<p class="mb-0">
							<span><i class="fa fa-eye"></i></span> {{$value->BlogViewCount}} lượt xem
						</p>
						<a href="{{$url}}">Xem chi tiết</a>
					</div>
				</div>
			</div>
		@endforeach
	</div>
</section>
<script>
	document.addEventListener("DOMContentLoaded", function () {
		$(document).ready(function () {
			$(".btn-send-comment").on("click", function () {
				let contentcomment = $("#content-comment").val();
				let postid = $(this).data("postid");
				let userid = $(this).data("userid");
				if (userid == "") {
					var check = confirm("Vui lòng đăng nhập trước khi bình luận");
					window.location.href = "{{URL('/tai-khoan/dang-nhap')}}"
				} else {
					$.ajax({
						url: "{{URL('/blog/add-comment')}}",
						type: "GET",
						data: {
							userid: userid,
							contentcomment: contentcomment,
							postid: postid,
						},
						success: function (data) {
							if (data.status == 0) {
								loadComment();
								alert(data.message)
							} else {
								alert(data.message);
							}
						},

					})
				}
			});
		})
		function loadComment() {
			var postid = $(".btn-send-comment").data("postid");
			$.ajax({
				url: "{{URL('/blog/load-comment')}}",
				type: "GET",
				data: {
					postid: postid,
				},
				success: function (data) {
					if (data.status == 0) {
						$(".comment-list").html(data.content);
					} else {
						alert(data.message);
					}
				},
			})
		}
		loadComment();
	})
</script>
@endsection
