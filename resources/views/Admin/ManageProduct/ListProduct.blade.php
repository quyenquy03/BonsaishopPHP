@extends('Layout.AdminLayout')
@section('content')
    
<div class="pagetitle">
    <h3 class="text-center">Quản lý danh sách sản phẩm</h3>
</div><!-- End Page Title -->
<div class="card mt-3">
    <div class="card-body pt-4">
        <div class="action-box d-flex align-values-end justify-content-between">
            <div class="filter-box d-flex">
                <div class="list-filter">
                    <select class="form-control" id="ChooseCategory" asp-values="@ViewBag.ListCategory" style="width: 250px" name="RoleID">
                        <option value="0"> Chọn danh mục sản phẩm</option>
                    </select>
                </div>
                <div class="list-filter mx-3">
                    <form>
                        <div class="form-group search-value-box">
                            <input class="form-control" id="SearchInput" value="@ViewBag.SearchInput" placeholder="Nhập thông tin tìm kiếm..." />
                            <span class="search-value-btn"><i class="fa fa-search"></i></span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="action-box">
                <a class="btn btn-danger mx-3" asp-controller="Product" asp-action="GoToTrash" asp-area="Admin"> Thùng rác </a>
                <a class="btn btn-primary" asp-controller="Product" asp-action="CreateProduct" asp-area="Admin">Thêm mới</a>
            </div>
        </div>
    </div>
</div>
<section class="section dashboard">
    <div class="card mt-3">
        <div class="card-body">
            
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr class="text-nowrap text-center">
                            <th class="text-center">Hình ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Mô tả</th>
                            <th>Thuộc danh mục</th>
                            <th>Giá bán</th>
                            <th>Giảm giá (%)</th>
                            <th>Sản phẩm Hot</th>
                            <th>Hiển thị</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ListProduct as $key => $value)
                            <tr class="text-center" id="row-{{$value->ProductID}}" style="vertical-align:middle;">
                                <th scope="row" class="text-center">
                                    <img src="{{URL("/public/images/$value->ProductImage")}}" width="100px" style="border-radius: 10px" />
                                </th>
                                <td style="white-space: normal">
                                    <div style="width: 200px; word-wrap: break-word;">{{$value->ProductName}} </div>
                                </td>
                                <td style="white-space: normal">
                                    <div style="width: 250px; word-wrap: break-word;" class="truncate-text truncate-4-line">{{$value->ProductDesc}}div>
                                </td>
                                <td style="white-space: normal">
                                    <div style="width: 200px; word-wrap: break-word;">{{$value->CategoryName}}</div>
                                </td>
                                
                                <td>{{$value->ProductPrice}}</td>
                                <td>{{$value->ProductDisCount}} %</td>
                                <td>
                                    <div class="table-cell text-center">
                                        <div class="switch m-r-10">
                                            @if ($value->IsBestSeller == true)
                                                <input type="checkbox" class="ChangeBestSeller"  id="BestSeller-{{$value->ProductID}}" checked>
                                            @else
                                                <input type="checkbox" class="ChangeBestSeller" id="BestSeller-{{$value->ProductID}}">
                                            @endif
                                            <label class="ChangeBestSellerButton" data-ProductID="{{$value->ProductID}}" data-currentvalue="{{$value->IsBestSeller}}"></label>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="table-cell text-center">
                                        <div class="switch m-r-10">
                                            @if ($value->IsActive == true)
                                                <input type="checkbox" class="ChangeBestSeller" id="Active-{{$value->ProductID}}" checked>
                                            @else
                                                <input type="checkbox" class="ChangeBestSeller" id="Active-{{$value->ProductID}}">
                                            @endif
                                            <label class="ChangeActiveStatusButton" data-ProductID="{{$value->ProductID}}" data-currentvalue="{{$value->IsActive}}"></label>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a class="btn px-2 text-white btn-warning" asp-action="EditProduct" asp-controller="Product" asp-route-id="{{$value->ProductID}}"><i class="tf-icons bx bx-pen"></i></a>
                                    <button class="btn px-2 text-white btn-danger" onclick="DisplayDeleteModal({{$value->ProductID}})"> <i class="tf-icons bx bx-trash"></i> </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- <div aria-label="Page navigation example" class="text-center mt-3 align-values-center">
                <ul class="pagination text-center d-inline-block">
                    <pager class="pager-container" list="@Model" asp-route-CategoryId="@ViewBag.CategoryId" asp-area="Admin" asp-controller="Product" asp-action="Index" />
                </ul>
            </div> --}}
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Xác nhận xóa sản phẩm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="IdToDelete" />
                    Bạn có chắc chắn muốn xóa sản phẩm này không?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy bỏ</button>
                    <button type="button" id="btnConfirmDelete" class="btn btn-primary">Xác nhận</button>
                </div>
            </div>
        </div>
    </div>

</section>

<script>
    document.querySelectorAll('[rel="prev"]')[0].innerHTML = "<"
    document.querySelectorAll('[rel="next"]')[0].innerHTML = ">"
</script>


    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <script>
        $(document).ready(function () {
            $("#btnConfirmDelete").on("click", function () {
                let IdToDelete = $("#IdToDelete").val();
                let UrlHandle = "/Admin/Product/Delete";

                $.ajax({
                    url: UrlHandle,
                    type: "Post",
                    data: {
                        IdToDelete: IdToDelete,
                    },
                    success: function (data) {
                        if (data.status == 0) {
                            $("#deleteModal").modal("hide");
                            //window.location.reload();
                            $("#row-" + IdToDelete).remove();
                            toastr.success("Xóa sản phẩm thành công");
                        } else {
                        }
                    },
                })
            });
            $("#ChooseCategory").on("change", function() {
                Filter();
            });
            $(".search-value-btn").on("click", function() {
                Filter();
            });
            $(".ChangeBestSellerButton").on("click", function () {
                var IdToUpdate = $(this).data("productid");
                var CurrentValue = $(this).data("currentvalue");
                
                $.ajax({
                    url: "/Admin/Product/UpdateBestSeller",
                    type: "Post",
                    data: {
                        IdToUpdate: IdToUpdate,
                    },
                    success: function (data) {
                        if (data.status == 0) {
                            if (data.currentValue == true) {
                                $('#BestSeller-'+IdToUpdate).prop('checked', true);
                                toastr.success("Đã cập nhật thành sản phẩm BestSeller");
                            } else {
                                $('#BestSeller-'+IdToUpdate).prop('checked', false);
                                toastr.success("Đã cập nhật thành sản phẩm không có BestSeller");
                            }
                            
                        } else {
                            toastr.success("Đang bị lỗi, vui lòng quay lại sau");
                        }
                    },
                })
            });
            $(".ChangeActiveStatusButton").on("click", function () {
                var IdToUpdate = $(this).data("productid");
                alert(IdToUpdate)
                $.ajax({
                    url: "{{URL('/admin/change-product-status')}}",
                    type: "GET",
                    data: {
                        IdToUpdate: IdToUpdate,
                    },
                    success: function (data) {
                        if (data.status == 0) {
                            if (data.currentValue == true) {
                                $('#Active-' + IdToUpdate).prop('checked', true);
                            } else {
                                $('#Active-' + IdToUpdate).prop('checked', false);
                            }
                            toastr.success(data.message);
                        } else {
                            toastr.success("Đang bị lỗi, vui lòng quay lại sau");
                        }
                    },
                })
            });
        });

    </script>
    <script type="text/javascript">
        function DisplayDeleteModal(id) {
            $("#IdToDelete").val(id);
            $("#deleteModal").modal("show");
        }
        function Filter() {
            var CategoryId = $("#ChooseCategory").val();
            var SearchInput = $("#SearchInput").val();

            $.ajax({
                url: "/Admin/Product/Filter",
                type: "Post",
                data: {
                    CategoryId: CategoryId,
                    SearchInput: SearchInput
                },
                success: function (data) {
                    if (data.status == 0) {
                        window.location = data.link;
                    } else {
                        alert("Error")
                    }
                },
            })
        }
    </script>
@endsection
    