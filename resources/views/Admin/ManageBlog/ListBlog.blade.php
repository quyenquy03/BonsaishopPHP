@extends('Layout.AdminLayout')
@section('content')
    
<div class="pagetitle">
    <h3 class="text-center">Quản lý bài viết</h3>
</div>

<section class="section dashboard">
    <div class="card mt-3">
        <div class="card-body">
            <div class="action-box text-end px-2 my-3">
                <a class="btn btn-danger mx-3" asp-controller="Post" asp-action="GoToTrash" asp-area="Admin"> Thùng rác </a>
                <a class="btn btn-primary" asp-controller="Post" asp-action="CreatePost" asp-area="Admin">Thêm mới</a>
            </div>
            <div class="table-responsive post-table text-nowrap">
                <table class="table table-reponsive">
                    <thead>
                        <tr class="text-nowrap text-center">
                            <th class="text-center">Hình ảnh</th>
                            <th style="width: 200px">Tên bài viết</th>
                            <th style="width: 300px">Tiêu đề</th>
                            <th>Thuộc danh mục</th>
                            <th>Hiển thị</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ListBlog as $key => $value)
                            <tr class="text-center" id="row-{{$value->BlogID}}" style="vertical-align:middle">
                                <th scope="row" class="text-center">
                                    <img src="{{URL("/public/images/$value->BlogImage")}}" width="100px" style="border-radius: 10px" />
                                </th>
                                <td style="white-space: normal">
                                    <div style="width: 200px; word-wrap: break-word;" class="truncate-text truncate-4-line">{{$value->BlogName}}</div>
                                </td>
                                <td style="white-space: normal">
                                    <div style="width: 300px; word-wrap: break-word;" class="truncate-text truncate-4-line">{{$value->BlogDesc}}</div>
                                </td>
                                <td style="white-space: normal">
                                    <div style=" word-wrap: break-word;">{{$value->CategoryName}}</div>
                                </td>
                                <td>
                                    <div class="table-cell text-center">
                                        <div class="switch m-r-10">
                                            @if ($value->IsActive == true)
                                                <input type="checkbox" class="ChangeBestSeller" id="Active-{{$value->BlogID}}" checked>
                                            @else
                                                <input type="checkbox" class="ChangeBestSeller" id="Active-{{$value->BlogID}}">
                                            @endif
                                            <label class="ChangeActiveStatusButton" data-id="{{$value->BlogID}}" data-currentvalue="{{$value->IsActive}}"></label>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a class="btn px-2 text-white btn-warning" asp-action="Edit" asp-controller="Post" asp-route-id="{{$value->BlogID}}"><i class="tf-icons bx bx-pen"></i></a>
                                    <button class="btn px-2 text-white btn-danger" onclick="DisplayDeleteModal({{$value->BlogID}})"><i class="tf-icons bx bx-trash"></i> </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Xác nhận xóa bài viết</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="IdToDelete" />
                    Bạn có chắc chắn muốn xóa bài viết này không?
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
            let UrlHandle = "/Admin/Post/Delete";
            $.ajax({
                url: UrlHandle,
                type: "Post",
                data: {
                    IdToDelete: IdToDelete,
                },
                success: function (data) {
                    if (data.status == 0) {
                        $("#deleteModal").modal("hide");
                        $("#row-"+ IdToDelete).remove();
                        toastr.success('Đã xóa sản phẩm');
                        window.location.reload();
                    } else if(data.status == 1) {
                        alert("")
                    } else if (data.status == 2) {

                    } else if(data.status == 3) {

                    }
                },

            })
        });
        $(".ChangeActiveStatusButton").on("click", function () {
            var IdToUpdate = $(this).data("id");
            $.ajax({
                url: "{{URL('/admin/change-blog-status')}}",
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
</script>
@endsection
    