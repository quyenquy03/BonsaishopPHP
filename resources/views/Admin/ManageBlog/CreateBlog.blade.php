@extends('Layout.AdminLayout')
@section('content')
    
<div class="pagetitle">
    <h3 class="text-center">Thêm mới bài viết</h4>
</div><!-- End Page Title -->

<section class="section mt-4">
    <div class="row mt-3">
        <div class="col-md-1"></div>
        <div class="form-addnew col-md-12 d-flex">
            <form asp-action="CreatePost" class="row" enctype="multipart/form-data" method="post">

                <div class="col-md-8">
                    <div class="row">
                        <div asp-validation-summary="ModelOnly" class="text-danger"></div>
                        <div class="col-md-12">
                            <label for="inputName5" class="form-label">Tên bài viết</label>
                            <input type="text" asp-for="BlogName" placeholder="Nhập tên hiển thị cho bài viết" class="form-control">
                        </div>

                        <div class="col-md-12">
                            <label for="inputName5" class="form-label">Mô tả bài viết</label>
                            <textarea  asp-for="BlogDesc" placeholder="Nhập nội dung mô tả cho bài viết" class="form-control"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="inputName5" class="form-label">Thuộc danh mục</label>
                            <select type="text" asp-for="CategoryId" asp-items="@ViewBag.ListCategory" class="form-control">
                                <option value="0"> ------ Chọn danh mục ------</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputName5" class="form-label"></label>
                            <div class="mt-2 text-end">
                                <button type="submit" class="btn btn-primary">Thêm mới ngay</button>
                                <a class="btn mx-3 btn-secondary" asp-action="Index" asp-controller="Post" asp-area="Admin">Hủy bỏ</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="avt-box px-4">
                        <input type="file" hidden
                               id="TourImage"
                               name="BlogImage"
                               asp-for="BlogImage"
                               class="form-control"
                               onchange="document.getElementById('imagePreview').src=window.URL.createObjectURL(this.files[0])" />
                        <label for="TourImage" style="cursor: pointer"><img id="imagePreview" src="{{URL("/public/images/image-default.png")}}" style="width:100%" /></label>
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="inputName5" class="form-label">Thông tin chi tiết</label>
                    <textarea asp-for="BlogDetail" id="PostDetail" class="form-control"></textarea>
                </div>

            </form>

        </div>
    </div>

</section>


<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script>
    $(document).ready(function () {
        $(".statesSelect").select2();
    });
</script>

@endsection
    