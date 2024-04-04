@extends('Layout.MainLayout')
@section('content')
<section class="bannerBlockHolder position-relative">
	<div class="slick-fade">
		<div class=""><img class="w-100" src="{{asset('/public/images/Banner/bg-banner-1.png')}}" /></div>
		<div class=""><img class="w-100" src="{{asset('/public/images/Banner/bg-banner-2.jpg')}}" /></div>
		<div class=""><img class="w-100" src="{{asset('/public/images/Banner/bg-banner-3.png')}}" /></div>
		<div class=""><img class="w-100" src="{{asset('/public/images/Banner/bg-banner-4.png')}}" /></div>
		<div class=""><img class="w-100" src="{{asset('/public/images/Banner/bg-banner-5.png')}}" /></div>
		<div class=""><img class="w-100" src="{{asset('/public/images/Banner/bg-banner-6.png')}}" /></div>
	</div>
	<div class="slickNavigatorsWrap">
		<a href="#" class="slick-prev"><i class="icon-leftarrow"></i></a>
		<a href="#" class="slick-next"><i class="icon-rightarrow"></i></a>
	</div>
</section>
<!-- contactListBlock -->

<div class="container pt-xl-11 pb-xl-12 pt-lg-10 pb-lg-10 pt-md-8 pb-md-8 pt-5 pb-5">
	<div class="row">
		<div class="col-12">
			<!-- quotationBlock -->
			<blockquote class="quotationBlock text-center d-block m-0">
				<q class="d-block playfair mb-7">Với kinh nghiệm hơn 10 năm trong lĩnh vực cây cảnh, chúng tôi hứa hẹn sẽ mang đến cho quý khách hàng những trải nghiệm tuyệt vời nhất không nới nào có được</q>
				<cite class="d-block">
					<img src="{{asset('/public/client/images/signature.png')}}" alt="signature" class="img-fluid mb-6">
					<span class="d-flex flex-nowrap align-items-center justify-content-center">
						<strong class="fwEbold mr-1">Nguyễn Tạ Quyền</strong>
						<span class="text-uppercase fwEbold pt-1">- CEO</span>
					</span>
				</cite>
			</blockquote>
		</div>
	</div>
</div>
<!-- featureSec -->
{{-- @*@await Component.InvokeAsync("BestSellerProduct");*@ --}}
<section class="featureSec container overflow-hidden pt-xl-12 pb-xl-9 pt-lg-10 pb-lg-4 pt-md-8 pb-md-2 pt-5">
	<div class="row">
		<!-- mainHeader -->
		<header class="col-12 mainHeader mb-4 text-center">
			<h1 class="headingIV playfair fwEblod mb-4">Sản phẩm có khuyến mãi</h1>
			<span class="headerBorder d-block mb-5"><img src="{{asset('/public/client/images/hbdr.png')}}" alt="Header Border" class="img-fluid img-bdr"></span>
			<p>Mua ngay trong hôm nay để nhận được ưu đãi của chúng tôi </p>
		</header>
	</div>
	<div id="BestSellerCarousel" class="row owl-carousel owl-nav-custom owl-theme my-3">
        <div class="col-12 col-sm-12 col-lg-12 featureCol w-100 position-relative mb-6">
            <div class="border">
                <div class="imgHolder position-relative w-100 overflow-hidden">
                    <img src="{{asset('/public/images/Products/cay-bach-ma-hoang-tu-3317.jpg')}}" alt="image description" class="img-fluid w-100">
                    <ul class="list-unstyled postHoverLinskList d-flex justify-content-center m-0">
                        <li class="mr-2 overflow-hidden"><a href="javascript:void(0);" data-productid="" class="icon-heart favourite-btn d-block"></a></li>
                        <li class="mr-2 overflow-hidden"><a href="javascript:void(0);" data-productid="" class="addcart-btn icon-cart d-block"></a></li>
                        <li class="mr-2 overflow-hidden"><a href="/san-pham/" class="icon-eye d-block"></a></li>
                        <li class="overflow-hidden"><a href="javascript:void(0);" class="icon-arrow d-block"></a></li>
                    </ul>
                </div>
                <div class="text-center py-xl-5 py-sm-4 py-2 px-xl-2 px-1">
                    <span class="title d-block mb-2 truncate-text truncate-2-line"><a href="/san-pham/@url">Cay back ma</a></span>
                    <span class="price d-block fwEbold"><del>10000 </del> 10000</span>
                    <span class="hotOffer green fwEbold text-uppercase text-white position-absolute d-block">Sale</span>
                </div>
            </div>
        </div>
		{{-- @foreach (var item in ViewBag.ListBestSellerProduct)
		{
			var url = Functions.UrlLink(item.ProductName, item.ProductId);
			<div class="col-12 col-sm-12 col-lg-12 featureCol w-100 position-relative mb-6">
				<div class="border">
					<div class="imgHolder position-relative w-100 overflow-hidden">
						<img src="{{asset('/public/images/@item.ProductImage" alt="image description" class="img-fluid w-100">
						<ul class="list-unstyled postHoverLinskList d-flex justify-content-center m-0">
							<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" data-productid="@item.ProductId" class="icon-heart favourite-btn d-block"></a></li>
							<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" data-productid="@item.ProductId" class="addcart-btn icon-cart d-block"></a></li>
							<li class="mr-2 overflow-hidden"><a href="/san-pham/@url" class="icon-eye d-block"></a></li>
							<li class="overflow-hidden"><a href="javascript:void(0);" class="icon-arrow d-block"></a></li>
						</ul>
					</div>
					<div class="text-center py-xl-5 py-sm-4 py-2 px-xl-2 px-1">
						<span class="title d-block mb-2 truncate-text truncate-2-line"><a href="/san-pham/@url">@item.ProductName</a></span>
						<span class="price d-block fwEbold"><del>@String.Format("{0:0,0 đ}", item.ProductPrice) </del> @String.Format("{0:0,0 đ}", item.ProductPrice - item.ProductPrice * item.ProductDisCount / 100)</span>
						<span class="hotOffer green fwEbold text-uppercase text-white position-absolute d-block">Sale</span>
					</div>
				</div>
			</div>
		} --}}
	</div>
</section>
<div class="contactListBlock container overflow-hidden py-5">
	<div class="row">
		<div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0">
			<!-- contactListColumn -->
			<div class="contactListColumn border bg-lightGray overflow-hidden py-xl-5 py-md-3 py-2 px-xl-6 px-md-3 px-3 d-flex">
				<span class="icon icon-van"></span>
				<div class="alignLeft pl-2">
					<strong class="headingV fwEbold d-block mb-1">Hỗ trợ vận chuyển</strong>
					<p class="m-0">Đơn hàng trên 5 triệu </p>
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0">
			<!-- contactListColumn -->
			<div class="contactListColumn border bg-lightGray overflow-hidden py-xl-5 py-md-3 py-2 px-xl-6 px-md-3 px-3 d-flex">
				<span class="icon icon-gift"></span>
				<div class="alignLeft pl-2">
					<strong class="headingV fwEbold d-block mb-1">Quà tặng hấp dẫn</strong>
					<p class="m-0">Hàng ngàn quà tặng</p>
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0">
			<!-- contactListColumn -->
			<div class="contactListColumn border bg-lightGray overflow-hidden py-xl-5 py-md-3 py-2 px-xl-4 px-md-2 px-3 d-flex">
				<span class="icon icon-recycle"></span>
				<div class="alignLeft pl-2">
					<strong class="headingV fwEbold d-block mb-1">Phản hồi và trả hàng</strong>
					<p class="m-0">Trong thời gian 1 tuần</p>
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0">
			<!-- contactListColumn -->
			<div class="contactListColumn border bg-lightGray overflow-hidden py-xl-5 py-md-3 py-2 px-xl-6 px-md-3 px-3 d-flex">
				<span class="icon icon-call"></span>
				<div class="alignLeft pl-2">
					<strong class="headingV fwEbold d-block mb-1">Hỗ trợ 24 / 7</strong>
					<p class="m-0">Hotline: 0867168268</p>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- categorySecBlock -->
{{-- @*@await Component.InvokeAsync("NewProduct")*@ --}}

<section class="featureSec container overflow-hidden pt-xl-11 pb-xl-18 pt-lg-10 pb-lg-20 pt-md-8 pb-md-16 pt-5 pb-5">
	<div class="row">
		<!-- mainHeader -->
		<header class="col-12 mainHeader mb-4 text-center">
			<h1 class="headingIV playfair fwEblod mb-4">Sản phẩm nổi bật</h1>
			<span class="headerBorder d-block mb-5"><img src="{{asset('/public/client/images/hbdr.png')}}" alt="Header Border" class="img-fluid img-bdr"></span>
			<p>Những sản phẩm được khách hàng yêu thích nhất của chúng tôi </p>
		</header>
	</div>
	<div class="row">
        <div class="col-12 col-sm-6 col-lg-3 featureCol position-relative mb-6">
            <div class="border">
                <div class="imgHolder position-relative w-100 overflow-hidden">
                    <img src="{{asset('/public/images/Products/cay-bach-ma-hoang-tu-3317.jpg')}}" alt="image description" class="img-fluid w-100">
                    <ul class="list-unstyled postHoverLinskList d-flex justify-content-center m-0">
                        <li class="mr-2 overflow-hidden"><a href="javascript:void(0);" data-productid="" class="icon-heart favourite-btn d-block"></a></li>
                        <li class="mr-2 overflow-hidden"><a href="javascript:void(0);" data-productid="" class="addcart-btn icon-cart d-block"></a></li>
                        <li class="mr-2 overflow-hidden"><a href="/san-pham/" class="icon-eye d-block"></a></li>
                        <li class="overflow-hidden"><a href="javascript:void(0);" class="icon-arrow d-block"></a></li>
                    </ul>
                </div>
                <div class="text-center py-xl-5 py-sm-4 py-2 px-xl-2 px-1">
                    <span class="title d-block mb-2 truncate-text truncate-2-line"><a href="/san-pham/@url">Cay back ma</a></span>
                    <span class="price d-block fwEbold"><del>10000 </del> 10000</span>
                    <span class="hotOffer green fwEbold text-uppercase text-white position-absolute d-block">Sale</span>
                </div>
            </div>
        </div>
		{{-- @foreach (var item in ViewBag.ListNewProduct)
		{
			var url = Functions.UrlLink(item.ProductName, item.ProductId);
				<div class="col-12 col-sm-6 col-lg-3 featureCol position-relative mb-6">
					<div class="border">
						<div class="imgHolder position-relative w-100 overflow-hidden">
							<img src="{{asset('/public/images/@item.ProductImage" alt="image description" class="img-fluid w-100">
							<ul class="list-unstyled postHoverLinskList d-flex justify-content-center m-0">
							<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" data-productid="@item.ProductId" class="icon-heart favourite-btn d-block"></a></li>
								<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" data-productid="@item.ProductId" class="addcart-btn icon-cart d-block"></a></li>
								<li class="mr-2 overflow-hidden"><a href="/san-pham/@url" class="icon-eye d-block"></a></li>
								<li class="overflow-hidden"><a href="javascript:void(0);" class="icon-arrow d-block"></a></li>
							</ul>
						</div>
						<div class="text-center py-xl-5 py-sm-4 py-2 px-xl-2 px-1">
							<span class="title d-block mb-2"><a href="/san-pham/@url">@item.ProductName</a></span>
							<span class="price d-block fwEbold mb-1">@String.Format("{0:0,0 đ}", item.ProductPrice) </span>
							<span class="hotOffer fwEbold text-uppercase text-white position-absolute d-block">Hot</span>
						</div>
					</div>
				</div>
		} --}}
	</div>
</section>

<!-- featureSec -->
<section class="feedback-container white-bg container-section" style="background-image: url('{{asset('/public/images/feedback-banner.png')}}');">
	<div class="overlay"></div>
	<div class="container">
		<div class="feedback-box py-3">
			<div class="row mt-3">
				<!-- mainHeader -->
				<header class="col-12 mainHeader mb-4 text-center">
					<h1 class="headingIV playfair fwEblod mb-4 text-white">Phản hồi từ khách hàng</h1>
					<span class="headerBorder d-block mb-5"><img src="/client/images/hbdr.png" alt="Header Border" class="img-fluid img-bdr"></span>
					<p class="text-white">Khách hàng đã nói gì về chúng tôi</p>
				</header>
			</div>

			<div id="myCarousel" class="row owl-carousel owl-theme my-3 feedback-list">
				<div class="feedback-item">
					<div class="icon d-flex align-items-center justify-content-center">
						<span class="fa fa-quote-left"></span>
					</div>
					<div class="feedback-user">
						<img class="feedback-user-img" src="{{asset('/public/images/Users/user-1.jpg')}}" />
						<div class="feedback-user-info">
							<h4 class="feedback-user-name">Vũ Đức Đam</h4>
							<span class="feedback-user-title">Nguyên phó thủ tướng</span>
						</div>
					</div>
					<div class="feedback-content">
						<p class="mb-4">
							Đây là dự án đầu tiên tại Việt Nam sử dụng công nghệ trong việc thiện nguyện. Sự trợ giúp này được công khai, minh bạch hoàn toàn qua đó lan tỏa những điều tốt đẹp trong xã hội.
						</p>
					</div>
				</div>
				<div class="feedback-item">
					<div class="icon d-flex align-items-center justify-content-center">
						<span class="fa fa-quote-left"></span>
					</div>
					<div class="feedback-user">
						<img class="feedback-user-img" src="{{asset('/public/images/Users/user-2.jpg')}}" />
						<div class="feedback-user-info">
							<h4 class="feedback-user-name">Tạ Minh Tuấn</h4>
							<span class="feedback-user-title">Chủ tịch TMT group</span>
						</div>
					</div>
					<div class="feedback-content">
						<p class="mb-4">
							Giải pháp rất tuyệt vời giúp mình làm từ thiện dễ dàng chứng minh sự đúng đắn của mình, gia tăng sự minh bạch, tăng cường trách nhiệm giải trình, đưa cộng đồng vào cùng giám sát.
						</p>
					</div>
				</div>
				<div class="feedback-item">
					<div class="icon d-flex align-items-center justify-content-center">
						<span class="fa fa-quote-left"></span>
					</div>
					<div class="feedback-user">
						<img class="feedback-user-img" src="{{asset('/public/images/Users/user-3.png')}}" />
						<div class="feedback-user-info">
							<h4 class="feedback-user-name">Phạm Quốc Việt</h4>
							<span class="feedback-user-title">Sáng lập đội sơ cứu FAS Angel</span>
						</div>
					</div>
					<div class="feedback-content">
						<p class="mb-4">
							Em thấy vận động quyên góp bằng tài khoản thiện nguyện minh bạch rất hay. Tất cả mọi người đều có thể theo dõi sao kê của mình đầy đủ được. Tạo lòng tin cho nhà hảo tâm và yên tâm khi quyên góp cho tài khoản thiện nguyện.
						</p>
					</div>
				</div>
				<div class="feedback-item">
					<div class="icon d-flex align-items-center justify-content-center">
						<span class="fa fa-quote-left"></span>
					</div>
					<div class="feedback-user">
						<img class="feedback-user-img" src="{{asset('/public/images/Users/user-4.jpg')}}" />
						<div class="feedback-user-info">
							<h4 class="feedback-user-name">Vũ Đức Đam</h4>
							<span class="feedback-user-title">Nguyên phó thủ tướng</span>
						</div>
					</div>
					<div class="feedback-content">
						<p class="mb-4">
							Đây là dự án đầu tiên tại Việt Nam sử dụng công nghệ trong việc thiện nguyện. Sự trợ giúp này được công khai, minh bạch hoàn toàn qua đó lan tỏa những điều tốt đẹp trong xã hội.
						</p>
					</div>
				</div>
				<div class="feedback-item">
					<div class="icon d-flex align-items-center justify-content-center">
						<span class="fa fa-quote-left"></span>
					</div>
					<div class="feedback-user">
						<img class="feedback-user-img" src="{{asset('/public/images/Users/user-5.png')}}" />
						<div class="feedback-user-info">
							<h4 class="feedback-user-name">Lê Hữu Toàn</h4>
							<span class="feedback-user-title">Võ sỹ quyền anh</span>
						</div>
					</div>
					<div class="feedback-content">
						<p class="mb-4">
							Đây là dự án đầu tiên tại Việt Nam sử dụng công nghệ trong việc thiện nguyện. Sự trợ giúp này được công khai, minh bạch hoàn toàn qua đó lan tỏa những điều tốt đẹp trong xã hội.
						</p>
					</div>
				</div>
				<div class="feedback-item">
					<div class="icon d-flex align-items-center justify-content-center">
						<span class="fa fa-quote-left"></span>
					</div>
					<div class="feedback-user">
						<img class="feedback-user-img" src="{{asset('/public/images/Users/user-6.png')}}" />
						<div class="feedback-user-info">
							<h4 class="feedback-user-name">Trần Trọng An</h4>
							<span class="feedback-user-title">Phó TBT tạp chí điện tử</span>
						</div>
					</div>
					<div class="feedback-content">
						<p class="mb-4">
							Người kết nối từ thiện cộng đồng MB đã cung cấp tài khoản 4 số rất dễ nhớ, dễ nhập khi chuyển khoản. Đặc biệt là mọi khoản chuyển đi/ đến tài khoản đều tự động công khai lên web, app nên bất kỳ ai cũng có thể truy vấn, tra cứu. Giải pháp của MB thực sự tuyệt vời vì giúp cho hoạt động thiện nguyện trở nên đơn giản và minh bạch.
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- latestSec -->
<section class="latestSec container overflow-hidden pt-xl-23 pb-xl-17 pt-lg-20 pb-lg-4 pt-md-16 pb-md-2 pt-10">
	<div class="row">
		<!-- mainHeader -->
		<header class="col-12 mainHeader mb-4 text-center">
			<h1 class="headingIV playfair fwEblod mb-4">Bài viết nổi bật</h1>
			<span class="headerBorder d-block mb-5"><img src="{{asset('/public/client/images/hbdr.png')}}" alt="Header Border" class="img-fluid img-bdr"></span>
			<p>Những bài viết chia sẻ kiến thức chăm sóc cây cảnh </p>
		</header>
	</div>

</section>
@endsection