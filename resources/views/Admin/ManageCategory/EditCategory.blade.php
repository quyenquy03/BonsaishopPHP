@extends('Layout.AdminLayout')
@section('content')

<div class="pagetitle">
    <h1 class="text-center">Cập nhật danh mục</h1>
</div><!-- End Page Title -->

<section class="section mt-4">

    <div class="form-addnew d-flex">
        <div class="col-md-12">
            <form  class="row" action="{{URL('/admin/update-category')}}" enctype="multipart/form-data" method="post">
                {{ csrf_field() }}
                <div asp-validation-summary="ModelOnly" class="text-danger"></div>
                <input hidden id="parentId" value="{{$EditCategory->ParentCateID}}" />
                <input hidden name="IsActive" value="{{$EditCategory->IsActive}}" />
                <input hidden name="CategoryID" value="{{$EditCategory->CategoryID}}" />
                <div class="col-md-6">
                    <label for="inputEmail5" class="form-label">Tên danh mục</label>
                    <input type="text" name="CategoryName" value="{{$EditCategory->CategoryName}}" placeholder="Nhập tên danh mục..." class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="inputName5" class="form-label">Mô tả</label>
                    <input type="text" name="Description" value="{{$EditCategory->Description}}" placeholder="Nhập mô tả danh mục"... class="form-control">
                </div>
               
                <div class="col-md-4">
                    <label for="inputAddress5" class="form-label">SeoTitle</label>
                    <input type="text" class="form-control" name="SeoTitle" value="{{$EditCategory->SeoTitle}}" placeholder="Nhập Title Seo của danh mục...">
                </div>
                <div class="col-md-4">
                    <label for="inputAddress2" class="form-label">SeoKeyword</label>
                    <input type="text" class="form-control" name="SeoKeyword" value="{{$EditCategory->SeoKeyword}}" placeholder="Nhập từ khóa SEO cho danh mục...">
                </div>
                <div class="col-md-4">
                    <label for="inputAddress2" class="form-label">SeoDescription</label>
                    <input type="text" class="form-control" name="SeoDescription" value="{{$EditCategory->SeoDescription}}" placeholder="Nhập mô tả SEO cho danh mục...">
                </div>
                <div class="col-md-4">
                    <label for="inputCity" class="form-label">Loại danh mục</label>
                    <select class="form-control" id="ChooseCateType" name="CategoryType">
                        @if($EditCategory->CategoryType == 1)
                            <option value="1" selected>Danh mục bài viết</option>
                            <option value="2">Danh mục sản phẩm</option>
                        @else
                            <option value="1">Danh mục bài viết</option>
                            <option value="2" selected>Danh mục sản phẩm</option>
                        @endif
                    </select>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <label for="inputCity" class="form-label">Danh mục cha</label>
                    <select class="form-control" id="ChooseCateParent" name="ParentCateID" asp-items="@ViewBag.ListParentCategories">
                        <option value="0">hello</option>
                    </select>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Lưu lại</button>
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
        parentId = $("#parentId").val();
        function LoadCateParent(cateTypeId) {
            
            $.ajax({
                url: "{{URL('/admin/load-parent-category')}}",
                datatype: "json",
                type: "GET",
                data: {
                    "CateTypeID": cateTypeId,
                    "ParentCateID": parentId
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
