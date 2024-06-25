
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
        <div class="login-session" style="background-image: url('{{asset('/public/Client/images/background.jpg')}}');">
            <div class="login-container">
                <div class="login-box">
                    <h4 class="login-header my-4">Đăng nhập tài khoản</h4>
                    <form action="{{URL('/tai-khoan/sign-in')}}" method="Post" class="login-form">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-12">
                                <div class="input-box mt-3">
                                    <label for="" class="input-label"></label>
                                    <input type="text" placeholder="Tên đăng nhập" name="UserName" class="input-text">
                                    <span class="input-icon"><i class="fa-solid fa-user"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="input-box mt-3">
                                    <label for="" class="input-label"></label>
                                    <input type="password" name="Password" placeholder="Mật khẩu" class="input-text">
                                    <span class="input-icon"><i class="fa-solid fa-lock"></i></span>
                                </div>
                            </div>
                        </div>
                        {{-- <p class="text-error" style="color: red;">@TempData["AccountBlocked"]</p> --}}
                        <div class="login-action d-flex justify-content-between my-3">
                            <div class="remember-account d-flex align-items-center">
                                <input type="checkbox" class="remember-checkbox">
                                <span class="px-2 d-block">Nhớ tài khoản</span>
                            </div>
                            <div class="forget-password">
                                <a asp-action="ForgetPassword" asp-controller="Account">Quên mật khẩu</a>
                            </div>
                        </div>
                        <div class="form-button">
                            <input type="submit" value="Đăng nhập" class="btn btn-success form-submit-btn">
                        </div>
                    </form>
                    <div class="other-login">
                        <p class="other-login-label">Hoặc đăng nhập với</p>
                        <div class="list-other-login">
                            <span class="other-login-item facebook-icon"><i class="fa-brands fa-facebook-f"></i></span>
                            <span class="other-login-item"><i class="fa-brands fa-twitter"></i></span>
                            <span class="other-login-item google-icon"><i class="fa-brands fa-google"></i></span>
                        </div>
                    </div>
                    <div class="change-action mt-4">
                        <span class="change-action-title">Chưa có tài khoản</span>
                        <a href="{{URL('/tai-khoan/dang-ky')}}" class="change-action-link">Đăng ký ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
{{-- <script src="~/js/site.js" asp-append-version="true"></script>
@await Component.InvokeAsync("Notyf") --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>