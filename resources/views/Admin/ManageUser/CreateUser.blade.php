@extends('Layout.AdminLayout')
@section('content')

<div class="pagetitle">
    <h1 class="text-center">Thêm mới người dùng</h1>
</div><!-- End Page Title -->

<section class="section mt-4">

    <div class="form-addnew d-flex">
        <div class="col-md-9">
            <form asp-action="Create" class="row" action="{{asset('/admin/save-new-user')}}" enctype="multipart/form-data" method="post">
                {{ csrf_field() }}
                <div class="col-md-6">
                    <label for="inputEmail5" class="form-label">Tên tài khoản</label>
                    <input type="text" name="UserName" placeholder="NguyenTaQuyen..." class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="inputName5" class="form-label">Họ và tên</label>
                    <input type="text" name="FullName" placeholder="Nguyễn Tạ Quyền..." class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="inputAddress5" class="form-label">Email</label>
                    <input type="text" value="" class="form-control" name="Email" placeholder="quyen@gmail.com">
                </div>
                <div class="col-md-6">
                    <label for="inputAddress2" class="form-label">Điện thoại</label>
                    <input type="text" class="form-control" name="Phone" placeholder="0867168266">
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">Phân quyền</label>
                    <select class="form-control" name="RoleID">
                        <option value="2">Người dùng</option>
                        <option value="1">Quản trị viên</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="inputCity"  class="form-label">Ảnh đại diện</label>
                    <input 
                           name="avatar"
                           value=""
                           type="file"
                           class="form-control image-input"
                           onchange="document.getElementById('imagePreview').src=window.URL.createObjectURL(this.files[0])" />
                </div>
                
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Thêm mới ngay</button>
                    <a class="btn mx-3 btn-secondary" href="{{URL('/admin/list-user')}}">Hủy bỏ</a>
                </div>
            </form>
        </div>
        <div class="col-md-3">
            <div class="avt-box px-4">
                <img id="imagePreview" src="{{asset('/public/admin/assets/img/avatar-default.jpg')}}" style="width:100%" />
            </div>
        </div>
    </div>

</section>

@endsection