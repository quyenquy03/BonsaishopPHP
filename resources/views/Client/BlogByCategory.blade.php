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
							<a href="">{{$Category->CategoryName}}</a>
						</div>
					</div>

					<section class="featureSec main-content-box container overflow-hidden mt-3 pt-xl-11 pb-xl-18 pt-lg-10 pb-lg-20 pt-md-8 pb-md-16 pt-5 pb-5">
						<div class="row">
							<!-- mainHeader -->
							<header class="col-12 mainHeader mb-4 text-center">
								<h1 class="headingIV playfair fwEblod mb-4">{{$Category->CategoryName}}</h1>
								<span class="headerBorder d-block mb-5"><img src="{{URL("/public/client/images/hbdr.png")}}" alt="Header Border" class="img-fluid img-bdr"></span>
							</header>
						</div>
						<div class="row">
							@foreach ($ListBlog as $key => $value)
                                @php
                                    $url = "/bai-viet/$value->BlogID-$value->BlogSlug";
                                @endphp
								<div class="col-12 col-sm-6 col-lg-4">
									<div class="newsPostColumn text-center px-2 pb-6 mb-6">
										<div class="imgHolder position-relative mb-6">
											<a href="{{$url}}">
												<img src="{{URL("/public/images/$value->BlogImage")}}" alt="image description" class="img-fluid w-100">
												<time class="time position-absolute py-3 px-1" datetime="2019-02-03 20:00"> <strong class="fwEbold d-block mb-1">20</strong> Tháng 10</time>
											</a>
										</div>
										<h2 class="headingV fwEbold mb-2 truncate-text truncate-2-line"><a href="{{URL("$url")}}">{{$value->BlogName}}</a></h2>
										<p class="mb-0 truncate-text truncate-3-line">{{$value->BlogDesc}}</p>
										<div class="d-flex justify-content-between mt-2 px-2">
											<p class="mb-0">
												<span><i class="fa fa-eye"></i></span> {{$value->BlogViewCount}} lượt xem
											</p>
											<a href="{{URL("$url")}}">Xem chi tiết</a>
										</div>
									</div>
								</div>
                            @endforeach
						</div>
						<div aria-label="Page navigation example" class="text-center mt-3 align-items-center">
							<ul class="pagination text-center d-inline-block">
								<pager class="pager-container" list="@Model" />
							</ul>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
