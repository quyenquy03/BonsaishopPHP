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
                        @if(isset($account['IsLogin']) && $account['IsLogin'] == true)
                            @php
                                $avatar = $account['Account']->Avatar;
                            @endphp
                            <li class="m-0 account-menu-box">
                                <a class="account-box" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="true" aria-expanded="false">
                                    <div class="account-name">
                                        <img class="user-avatar" src="{{URL("$avatar")}}" alt="">
                                        <div class="user-name">
                                            <span>{{$account['Account']->FullName}}</span>
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown-menu account-menu pl-4 pr-4 border-0">
                                    <a class="dropdown-item" href="/trang-ca-nhan">Trang cá nhân</a>
                                    @if($account['Account']->RoleID == 1)
                                        <a class="dropdown-item" href="{{URL('/admin')}}">Trang quản trị</a>
                                    @endif
                                    <a class="dropdown-item" href="/don-hang">Đơn hàng của tôi</a>
                                    <a class="dropdown-item" href="{{URL('/tai-khoan/logout')}}">Đăng xuất</a>
                                </div>
                            </li>
                        @else
                            <li class="language-box">
                                <a href="{{URL('/tai-khoan/dang-nhap')}}" class="language-option">Đăng nhập</a>
                            </li>
                        @endif
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
                                        <a class="d-block" href="{{URL('/')}}">Trang chủ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="d-block" href="{{URL('/gioi-thieu')}}">Giới thiệu</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="dropdown-toggle d-block" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sản phẩm</a>
                                        <ul class="list-unstyled text-capitalize dropdown-menu mt-0 py-0">
                                            @foreach ($ListProductCategory as $key => $value)
                                                <li class="d-block mx-0"><a href="{{URL("/danh-muc-san-pham/$value->CategoryID-$value->Alias")}}">{{$value->CategoryName}}</a></li>
                                            @endforeach
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
                                            {{-- <li class="d-block mx-0"><a href="/dich-vu/cham-soc-cay-canh">Chăm sóc cây cảnh</a></li>
                                            <li class="d-block mx-0"><a href="/dich-vu/cham-soc-cay-canh">Chăm sóc cây cảnh</a></li>
                                            <li class="d-block mx-0"><a href="/dich-vu/cham-soc-cay-canh">Chăm sóc cây cảnh</a></li>
                                            <li class="d-block mx-0"><a href="/dich-vu/cham-soc-cay-canh">Chăm sóc cây cảnh</a></li>
                                            <li class="d-block mx-0"><a href="/dich-vu/cham-soc-cay-canh">Chăm sóc cây cảnh</a></li> --}}
                                            {{-- @foreach (var item in ViewBag.ListCategoryPost)
                                            {
                                                var url = Functions.UrlLink(item.CategoryName, item.CategoryId);
                                                <li class="d-block mx-0"><a href="/danh-muc-bai-viet/@url">@item.CategoryName</a></li>
                                            } --}}
                                            @foreach ($ListBlogCategory as $key => $value)
                                                <li class="d-block mx-0"><a href="{{URL("/danh-muc-bai-viet/$value->CategoryID-$value->Alias")}}"> {{$value->CategoryName}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="d-block" href="{{URL('/lien-he')}}">Liên hệ</a>
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
                        <li class="nav-item ml-3"><a class="nav-link icon-box position-relative icon-cart" href="{{URL("/gio-hang")}}"><span class="num rounded d-block">2</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>