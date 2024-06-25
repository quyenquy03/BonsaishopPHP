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
							<a href="">Trang chủ</a>
							<span>></span>
							<a href="">Sản phẩm</a>
							<span>></span>
							<a href="">Quần áo</a>
						</div>
					</div>

					<div class="main-content-box mt-3">
						<div class="row">
							<div class="col-lg-5 col-xl-5 col-sm-12">
								<div class="detail-left-box">
									<img src="{{URL("/public/images/$ProductByID->ProductImage")}}" class="detail-image w-100" />
								</div>
							</div>
							<div class="col-lg-7 col-xl-7 col-sm-12">
								<div class="detail-right-box text-center">
									<h4 class="detail-product-name">{{$ProductByID->ProductName}}</h4>
									<div class="detail-product-price mb-2">
										@if($ProductByID->ProductDisCount == 0)
											<span class="new-price">{{number_format($ProductByID->ProductPrice, 0, '', ',')}} đ</span>
                                            @else
											<span class="old-price">{{number_format($ProductByID->ProductPrice, 0, '', ',')}} đ</span>
											<span class="new-price">{{number_format($ProductByID->ProductPrice - $ProductByID->ProductPrice * $ProductByID->ProductDisCount / 100, 0, '', ',')}} đ</span>
										@endif
									</div>
									<p class="detail-product-desc truncate-text truncate-4-line">{{$ProductByID->ProductDesc}}</p>
									<ul class="list-unstyled detail-button-box d-flex justify-content-center m-0 mt-5">
										<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" data-productid="{{$ProductByID->ProductID}}" class="icon-heart favourite-btn"></a></li>
										<li class="mr-2 overflow-hidden"><a href="javascript:void(0);"> Mua ngay</a></li>
										<li class="mr-2 overflow-hidden"><a data-productid="{{$ProductByID->ProductID}}" class="addcart-btn icon-cart"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>

					<div class="main-content-box mt-3">
						<div class="product-detail">
							<div class="product-detail-content">
								{!! $ProductByID->ProductDetail !!}
							</div>
						</div>
					</div>

					<div class="main-content-box mt-3">
						<div class="product-feedback-form">
							<h4 class="feedback-header text-center">Mời bạn đánh giá sản phẩm</h4>
							<div class="feedback-rating">
								<ul class="list-inline rating d-flex justify-content-center" style="height: 50px" title="Average Rating">
                                    @for($i = 1; $i<=5; $i++) 
                                        @php
                                            $color = "";
                                            if($i <= 5)
                                            {
                                                $color = $color."color : #ffcc00";
                                            } else
                                            {
                                                $color = $color."color : #ccc";
                                            }
                                        @endphp
                                        <li title="star-rating" id="{{$ProductByID->ProductID}}-{{$i}}"
                                            data-index="$i"
                                            data-productid="{{$ProductByID->ProductID}}"
                                            data-rating="$i"
                                            class="rating"
                                            style="cursor:pointer; {{$color}} ; font-size: 40px; margin: 0 5px;"
                                        > &#9733;</li>
                                    @endfor
								</ul>
							</div>
							<div class="feedback-input row">
								<div class="col-sm-0 col-lg-3 col-xl-3"></div>
								<div class="col-sm-12 col-lg-6 col-xl-6">
									<div class="form-group">
										<textarea class="feedback-input-text" placeholder="Nhập đánh giá của bạn..." ></textarea>
									</div>
									<div class="text-center">
										<button class="feedback-btn">Gửi phản hồi</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

            {{-- RELEVANT PRODUCT --}}
            <section class="featureSec container overflow-hidden pt-xl-11 pb-xl-18 pt-lg-10 pb-lg-20 pt-md-8 pb-md-16 pt-5 pb-5">
                <div class="row">
                    <!-- mainHeader -->
                    <header class="col-12 mainHeader mb-4 text-center">
                        <h1 class="headingIV playfair fwEblod mb-4">Có thể bạn quan tâm</h1>
                        <span class="headerBorder d-block mb-5"><img src="{{URL("/public/client/images/hbdr.png")}}" alt="Header Border" class="img-fluid img-bdr"></span>
                    </header>
                </div>
                <div class="row">
                    @foreach ($ListProduct as $key => $value)
                        <div class="col-12 col-sm-6 col-lg-3 featureCol position-relative mb-6">
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
</section>
@endsection