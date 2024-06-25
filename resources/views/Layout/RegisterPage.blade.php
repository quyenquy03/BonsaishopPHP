<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{asset('/public/Client/css/Login.css')}}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="limiter">
        <div class="login-session" style="background-image: url('{{URL("/public/Client/images/background.jpg")}}');">
            <div class="login-container register-container">
                <div class="login-box register-box">
                    <h4 class="login-header my-4">Đăng nhập tài khoản</h4>
                    <form action="{{URL('/tai-khoan/sign-up')}}" method="Post" class="login-form">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="input-box mt-3">
                                    <label for="" class="input-label"></label>
                                    <input type="text" placeholder="Họ và tên" name="FullName" class="input-text">
                                    <span class="input-icon"><i class="fa-solid fa-file-signature"></i></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-box mt-3">
                                    <label for="" class="input-label"></label>
                                    <input type="text" placeholder="Tên tài khoản" name="UserName" class="input-text">
                                    <span class="input-icon"><i class="fa-solid fa-user"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                <div class="input-box mt-3">
                                    <label for="" class="input-label"></label>
                                    <input type="password" placeholder="Mật khẩu" name="Password" class="input-text">
                                    <span class="input-icon"><i class="fa-solid fa-lock"></i></span>
                                </div>
                            </div>
                            <div class="col-2"></div>
                            <div class="col-5">
                                <div class="input-box mt-3">
                                    <label for="" class="input-label"></label>
                                    <input type="password" placeholder="Nhập lại mật khẩu" name="AgainPass" class="input-text">
                                    <span class="input-icon"><i class="fa-solid fa-lock"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-6">
                                <div class="input-box mt-3">
                                    <label for="" class="input-label"></label>
                                    <input type="email" placeholder="Email" name="Email" class="input-text">
                                    <span class="input-icon"><i class="fa-solid fa-envelope"></i></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-box mt-3">
                                    <label for="" class="input-label"></label>
                                    <input type="text" placeholder="Số điện thoại" name="Phone" class="input-text">
                                    <span class="input-icon"><i class="fa-solid fa-phone"></i></span>
                                </div>
                            </div>
                        </div>

                        
                        <div class="form-button mt-3">
                            <input type="submit" value="Đăng ký" class="btn btn-success form-submit-btn">
                        </div>
                    </form>
                    
                    <div class="change-action mt-4">
                        <span class="change-action-title">Đã có tài khoản</span>
                        <a asp-action="Login" asp-controller="Account" class="change-action-link">Đăng nhập ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>