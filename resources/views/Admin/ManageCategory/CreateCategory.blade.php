@extends('Layout.AdminLayout')
@section('content')

<div class="pagetitle">
    <h1 class="text-center">Thêm mới danh mục</h1>
</div><!-- End Page Title -->

<section class="section mt-4">

    <div class="form-addnew d-flex">
        <div class="col-md-12">
            <form  class="row" action="{{URL('/admin/save-category')}}" enctype="multipart/form-data" method="post">
                {{ csrf_field() }}
                <div asp-validation-summary="ModelOnly" class="text-danger"></div>
                <div class="col-md-6">
                    <label for="inputEmail5" class="form-label">Tên danh mục</label>
                    <input type="text" name="CategoryName" placeholder="Nhập tên danh mục..." class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="inputName5" class="form-label">Mô tả</label>
                    <input type="text" name="Description" placeholder="Nhập mô tả danh mục"... class="form-control">
                </div>
               
                <div class="col-md-4">
                    <label for="inputAddress5" class="form-label">SeoTitle</label>
                    <input type="text" class="form-control" name="SeoTitle" placeholder="Nhập Title Seo của danh mục...">
                </div>
                <div class="col-md-4">
                    <label for="inputAddress2" class="form-label">SeoKeyword</label>
                    <input type="text" class="form-control" name="SeoKeyword" placeholder="Nhập từ khóa SEO cho danh mục...">
                </div>
                <div class="col-md-4">
                    <label for="inputAddress2" class="form-label">SeoDescription</label>
                    <input type="text" class="form-control" name="SeoDescription" placeholder="Nhập mô tả SEO cho danh mục...">
                </div>
                <div class="col-md-4">
                    <label for="inputCity" class="form-label">Loại danh mục</label>
                    <select class="form-control" id="ChooseCateType" name="CategoryType">
                        <option value="1">Danh mục bài viết</option>
                        <option value="2">Danh mục sản phẩm</option>
                    </select>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <label for="inputCity" class="form-label">Danh mục cha</label>
                    <select class="form-control" id="ChooseCateParent" name="ParentCateId" asp-items="@ViewBag.ListParentCategories">
                        <option value="0">hello</option>
                    </select>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Thêm mới ngay</button>
                    <a class="btn mx-3 btn-secondary" asp-action="ListCatePro" asp-controller="Category" asp-area="Admin">Hủy bỏ</a>
                </div>
            </form>
        </div>
    </div>

</section>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
    $(document).ready(function () {

        $("#ChooseCateType").on("change", function () {
            cateTypeId = $("#ChooseCateType").children(":selected").attr("value");
            LoadCateParent(cateTypeId);
        })

        cateTypeId = $("#ChooseCateType").children(":selected").attr("value");
        function LoadCateParent(cateTypeId) {
            
            $.ajax({
                url: "load-parent-category",
                datatype: "json",
                type: "GET",
                data: {
                    "CateTypeID": cateTypeId,
                },
                async: true,
                success: function (results) {
                    $("#ChooseCateParent").html(results.Content)
                },
                error: function (xhr) {
                    alert("error")
                }
            })
        }
        LoadCateParent(cateTypeId);
    });

</script>
@endsection
