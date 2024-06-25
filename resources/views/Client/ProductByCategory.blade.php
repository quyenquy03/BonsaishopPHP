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
                                        <a href="{{URL("/danh-muc-san-pham/$value->CategoryID-$value->Alias")}}" class="active">
                                            <span class="menu-text">{{$value->CategoryName}}</span>
                                        </a>
                                    </li>
                                @endforeach
                                <li>
                                    <a href="{{URL("/danh-muc-san-pham/0-tat-ca-san-pham")}}" class="active">
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
							<a href="">Sản phẩm</a>
							<span>></span>
							<a href="">{{$CategoryName}}</a>
						</div>
					</div>

					<section class="featureSec main-content-box container overflow-hidden mt-3 pt-xl-11 pb-xl-18 pt-lg-10 pb-lg-20 pt-md-8 pb-md-16 pt-5 pb-5">
						<div class="row">
							<!-- mainHeader -->
							<header class="col-12 mainHeader mb-4 text-center">
								<h1 class="headingIV playfair fwEblod mb-4">{{$CategoryName}}</h1>
								<span class="headerBorder d-block mb-5"><img src="{{URL("/public/client/images/hbdr.png")}}" alt="Header Border" class="img-fluid img-bdr"></span>
							</header>
						</div>
						<div class="row">
							@foreach($ListProduct as $key => $value)
								<div class="col-12 col-sm-12 col-lg-4 featureCol position-relative mb-6">
									<div class="border">
										<div class="imgHolder position-relative w-100 overflow-hidden">
                                            <img src="{{asset("/public/images/$value->ProductImage")}}" alt="image description" class="img-fluid w-100">
                                            <ul class="list-unstyled postHoverLinskList d-flex justify-content-center m-0">
                                                <li class="mr-2 overflow-hidden"><a href="javascript:void(0);" data-productid="{{$value->ProductID}}" class="icon-heart favourite-btn d-block"></a></li>
                                                <li class="mr-2 overflow-hidden"><a href="javascript:void(0);" data-productid="{{$value->ProductID}}" class="addcart-btn icon-cart d-block"></a></li>
                                                <li class="mr-2 overflow-hidden"><a href="{{URL("/san-pham/$value->ProductID-$value->ProductSlug")}}" class="icon-eye d-block"></a></li>
                                                <li class="overflow-hidden"><a href="javascript:void(0);" class="icon-arrow d-block"></a></li>
                                            </ul>
                                        </div>
                                        <div class="text-center py-xl-5 py-sm-4 py-2 px-xl-2 px-1">
                                            <span class="title d-block mb-2 truncate-text truncate-2-line"><a href="/san-pham/@url">{{$value->ProductName}}</a></span>
                                            <span class="price d-block fwEbold"><del> {{number_format($value->ProductPrice, 0, '', ',')}} đ</del> {{number_format($value->ProductPrice - $value->ProductPrice * $value->ProductDisCount / 100, 0, '', ',')}} đ</span>
                                            <span class="hotOffer green fwEbold text-uppercase text-white position-absolute d-block">Sale</span>
                                        </div>
									</div>
								</div>
							@endforeach
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection