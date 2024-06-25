@extends('Layout.MainLayout')
@section('content')
    
<section class="introBannerHolder d-flex justify-content-center w-100 bgCover" style="background-image: url({{URL("/public/images/feedback-banner.png")}});">
	<div class="banner-overlay">
		<div class="row">
			<div class="col-12 pt-lg-23 pt-md-15 pt-sm-10 pt-6 text-center">
				<h1 class="headingIV fwEbold playfair mb-4">Giỏ hàng của tôi</h1>
			</div>
		</div>
	</div>
</section>

<div class="cartHolder cart-session container pt-xl-10 pb-xl-20 py-lg-20 py-md-10 py-10">
	@if($cart)
        @php
            $total = 0;
        @endphp
		<div class="row">
			<div class="col-sm-0 col-lg-1 col-xl-1"></div>
			<div class="col-sm-12 col-lg-10 col-xl-10">
				<div class="cart-left-box">
					<div class="col-12 table-responsive hide-scrollbar-y">
						<table class="table cartTable">
							<thead>
								<tr>
									<th scope="col" class="fwEbold border-top-0 text-center" style="width: 300px">Sản phẩm</th>
									<th scope="col" class="fwEbold border-top-0 text-center" style="width: 100px">Giá bán</th>
									<th scope="col" class="fwEbold border-top-0 text-center" style="width: 200px">Số lượng</th>
									<th scope="col" class="fwEbold border-top-0 text-center" style="width: 200px">Thành tiền</th>
									<th scope="col" class="fwEbold border-top-0 text-center"></th>
								</tr>
							</thead>
							<tbody>
								@if($cart)
									@foreach ($cart as $key => $value)
                                        @php
                                            $ProductID = $value['ProductID'];
                                            $ProductSlug = $value['ProductSlug'];
                                            $ProductImage = $value['ProductImage'];
                                            $ThanhTien = $value['ProductPrice'] * $value['quantity'];
                                            $total = $total + $ThanhTien;
                                        @endphp
										<tr class="align-items-center" id="row-{{$value['ProductID']}}">
											<td class=" border-top-0 border-bottom px-0 py-6" style="width: 300px">
												<div class="d-flex align-items-center">
													<div class="imgHolder">
														<img src="{{URL("/public/images/$ProductImage")}}" alt="image description" class="product-image img-fluid">
													</div>
                                                    <span class="title pl-2" style="flex: 1;"><a href="{{URL("/san-pham/$ProductID-$ProductSlug")}}">{{$value['ProductName']}}</a></span>
												</div>
											</td>
											<td class="fwEbold border-top-0 border-bottom px-0 py-6 text-center" style="width: 100px">{{number_format($value['ProductPrice'], 0, '', '.')}} đ</td>
											<td class="border-top-0 border-bottom px-0 py-6 text-center" style="width: 200px">
												<div class="d-flex align-items-center quantity-item-box justify-content-center">
                                                    <span class="btn-decrease quantity-cart-btn" data-productid="{{$ProductID}}">-</span>
                                                    <input disabled class="quantity-item-input" id="input-{{$ProductID}}" value="{{$value['quantity']}}" />
                                                    <span class="btn-increase quantity-cart-btn" data-productid="{{$ProductID}}">+</span>
												</div>
											</td>
											{{-- @*<td class="border-top-0 border-bottom px-0 py-6 text-center" style="width: 200px">
												<input type="number" value="@item.quantity" placeholder="1">
											</td>*@ --}}
											<td class="fwEbold border-top-0 border-bottom px-0 py-6 text-center" style="width: 200px" id="total-{{$ProductID}}">{{number_format($ThanhTien, 0, '', '.')}} VND</td>
											<td class="fwEbold border-top-0 border-bottom px-0 py-6"><a style="cursor:pointer" data-productid="{{$ProductID}}" class="fas fa-times delete-cart-item"></a></td>
										</tr>
									@endforeach
								@endif
							</tbody>
						</table>
					</div>
					
					<div class="d-flex cart-total-price justify-content-center title">
						<span class="title">Tổng giỏ hàng : </span>
						<span class="cart-price total-price">{{number_format($total, 0, '', '.')}} VND</span>
					</div>
				</div>
			</div>
		</div>
		<div class="row checkout-session mt-10">
			<div class="col-sm-0 col-lg-1 col-xl-1"></div>
			<div class="col-sm-12 col-lg-10 col-xl-10">
				<div class="cart-left-box" style="padding: 20px">
					<h5 class="cart-rightbox-header checkout-title text-center">Thông tin nhận hàng</h5>
					<div class="customer-infomation-form">
						<form class="" asp-action="CheckOut" asp-controller="Cart" method="post">
							<div class="row mt-3">
								<div class="col-sm-12 col-lg-6 col-xl-6">
									<div class="form-group">
										<label class="form-label">Họ và tên</label>
										<input class="form-control" name="FullName" placeholder="Nhập họ và tên người nhận" />
									</div>
								</div>
								<div class="col-sm-12 col-lg-6 col-xl-6">
									<div class="form-group">
										<label class="form-label">Số điện thoại</label>
										<input class="form-control" name="Phone" placeholder="Nhập số điện thoại người nhận" />
									</div>
								</div>
								<div class="col-sm-12 col-lg-4 col-xl-4">
									<div class="form-group">
										<label class="form-lable">Tỉnh - Thành phố</label>
										<select class="form-control choose" name="province" data-name="province" id="province">
                                            @foreach ($ListProvince as $key => $value)
                                                <option value="{{$value->ProvinceID}}">{{$value->ProvinceName}}</option>
                                            @endforeach
										</select>
									</div>
								</div>
								<div class="col-sm-12 col-lg-4 col-xl-4">
									<div class="form-group">
										<label class="form-lable">Quận - Huyện</label>
										<select class="form-control choose" name="districts" data-name="district" id="districts">
											<option value="0">---Chọn quận huyện---</option>
										</select>
									</div>
								</div>
								<div class="col-sm-12 col-lg-4 col-xl-4">
									<div class="form-group">
										<label class="form-lable">Khối - Phường - Thị xã</label>
										<select class="form-control" name="commune" data-name="commune" id="commune">
											<option value="0">------Chọn thị xã------</option>
										</select>
									</div>
								</div>

								<div class="col-sm-12 col-lg-12 col-xl-12">
									<div class="form-group">
										<label class="form-label">Thông tin địa chỉ chi tiết</label>
										<input class="form-control" name="Address" placeholder="Số nhà, đường, quận, huyện, ..." />
									</div>
								</div>
								<div class="col-sm-0 col-xl-4 col-sm-4"></div>
								
								<div class="col-sm-12 col-lg-4 col-xl-4">
								@if(session()->get('account')['Account']->UserID == null)
									<input type="button" class="checkout-btn goto-login" value="Đặt hàng ngay" />
								@else
									<a href="{{URL("/cart/checkout")}}" class="checkout-btn d-block text-center">Đặt hàng ngay</a>
								@endif
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	@else
		<div class="container">
			<div class="cart-empty-box row">
				<div class="col-sm-0 col-xl-3 col-lg-3"></div>
				<div class="col-sm-12 col-lg-6 col-xl-6">
					<img class="w-100" src="{{URL('/public/images/cart-empty.png')}}" />
					<p class="text-center cart-empty-title">Chưa có sản phẩm nào trong giỏ hàng</p>
					<div class="text-center">
						<a asp-action="Index" asp-controller="Home" class="btn btn-back-home">Quay lại cửa hàng</a>
					</div>
				</div>
			</div>
		</div>
	@endif
</div>
@endsection