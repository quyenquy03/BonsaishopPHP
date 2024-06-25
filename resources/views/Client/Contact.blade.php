@extends('Layout.MainLayout')
@section('content')
<div class="contact-page checkout-session">
    <div class="banner-top-box" style="background-image: url('{{URL("/public/images/bg-contact.jpg")}}')">
        <div class="bg-fill"></div>
        <h4 class="banner-content">Liên hệ</h4>
    </div>

    <div class="infor-box">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xl-4 col-lg-4">
                    <div class="info-item">
                        <div class="image-box">
                            <img class="image" src="https://sagomedia.vn/wp-content/uploads/2021/02/support-icon.png" />
                        </div>
                        <p class="info-header">Email</p>
                        <p class="info-title">Web2023@gmail.com</p>
                    </div>
                </div>

                <div class="col-sm-12 col-xl-4 col-lg-4">
                    <div class="info-item">
                        <div class="image-box">
                            <img class="image" src="https://sagomedia.vn/wp-content/uploads/2021/02/phone-icon.png" />
                        </div>
                        <p class="info-header">Hotline hỗ trợ</p>
                        <p class="info-title">090 541 1035 - 1900 9009</p>
                    </div>
                </div>

                <div class="col-sm-12 col-xl-4 col-lg-4">
                    <div class="info-item">
                        <div class="image-box">
                            <img class="image" src="https://sagomedia.vn/wp-content/uploads/2021/02/website-icon.png" />
                        </div>
                        <p class="info-header">Website</p>
                        <p class="info-title">www.web2023.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="t_contact">
                        <p>
                            CÔNG TY TNHH TM DV HALINK<br>
                            Địa chỉ: Số 123 Đường Phan Chu Trinh, Quận 10, TP.HCM<br>
                            Điện thoại: 0123.456.789<br>
                            Email: contact@demo.com<br>
                            Thời gian làm việc:<br>
                            Sáng: 8h – 12h (Thứ 2 – Thứ 7)<br>
                            Chiều: 13h – 17h (Thứ 2 – Thứ 6)
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="right-box">
                        <form class="form-contact" asp-action="SendRequest" asp-controller="Page">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control form-input" asp-for="Name" placeholder="Họ và tên..." />
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <input class="form-control form-input" asp-for="Email" placeholder="Email..." />
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <input class="form-control form-input" asp-for="Phone" placeholder="Điện thoại..." />
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-12 col-xl-12">
                                    <div class="form-group">
                                        <textarea class="form-control form-input" asp-for="Message" placeholder="Nội dung liên hệ"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-12 col-xl-12">
                                    <div class="form-group d-flex justify-content-end">
                                        <a href="{{URL("/gui-lien-he")}}" class="btn btn-primary btn-send-contact ">Gửi yêu cầu</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection