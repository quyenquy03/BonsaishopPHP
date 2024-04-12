@extends('Layout.AdminLayout')
@section('content')
    <div class="pagetitle">
        <h1 class="text-center">Quản lý danh mục bài viết</h1>
    </div><!-- End Page Title -->
    
    <section class="section dashboard">
        <div class="card mt-3">
            <div class="card-body">
                <div class="action-box text-end px-2 mt-3">
                    <a href="{{URL('/admin/create-category')}}" class="btn-primary btn">Thêm mới</a>
                </div>
                <div class="col-md-12 table-custom table">
                    
                    <div class="table-body">
                        <div class="row table-header align-items-center">
                            <div class="col-1">
                                <div class="table-cell"></div>
                            </div>
                            <div class="col-4">
                                <div class="table-cell"><span>Tên danh mục</span></div>
                            </div>
                            <div class="col-4">
                                <div class="table-cell"><span>Mô tả danh mục</span></div>
                            </div>
                            <div class="col-1">
                                <div class="table-cell text-center"><span>Hiển thị</span></div>
                            </div>
                            <div class="col-2">
                                <div class="table-cell text-center"><span>Chức năng</span></div>
                            </div>
                        </div>
                        @foreach($listCategory as $key => $category)
                            @php
                                $target = '#row-'.$category->CategoryID;
                            @endphp
                            <div class="row table-item align-items-center">
                                <div class="col-1">
                                    <div class="table-cell">
                                        <a class="nav-link collapsed" data-bs-target="{{$target}}" data-bs-toggle="collapse" href="#">
                                            <i class="bi bi-chevron-right table-nav-icon ms-auto"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="table-cell"><span>{{$category->CategoryName}}</span></div>
                                </div>
                                <div class="col-4">
                                    <div class="table-cell truncate-text truncate-4-line"><span>{{$category->Description}}</span></div>
                                </div>
                                <div class="col-1">
                                    <div class="table-cell text-center">
                                        <div class="switch m-r-10">
                                            @if ($category->IsActive == true)
                                                <input type="checkbox" class="ChangeBestSeller" id="Active-{{$category->CategoryID}}" checked>
                                            @else
                                                <input type="checkbox" class="ChangeBestSeller" id="Active-{{$category->CategoryID}}">
                                            @endif
                                            <label class="ChangeActiveStatusButton" data-id="{{$category->CategoryID}}" data-currentvalue="{{$category->IsActive}}"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="table-cell text-center">
                                        <a class="btn btn-warning"  href="{{URL("/admin/edit-category/$category->CategoryID")}}"><i class="bi bi-pencil-fill"></i></a>
                                        <button class="btn btn-danger" onclick="DisplayDeleteModal({{$category->CategoryID}})"><i class="bi bi-trash-fill"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div id="row-{{$category->CategoryID}}" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                                @foreach ($listSubCate as $subKey => $subValue)
                                    @if($subValue->ParentCateID == $category->CategoryID) 
                                        <div class="row table-item align-items-center">
                                            <div class="col-1 ">
                                                <div class="table-cell">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="table-cell"><span>{{$subValue->CategoryName}}</span></div>
                                            </div>
                                            <div class="col-4">
                                                <div class="table-cell"><span>{{$subValue->Description}}</span></div>
                                            </div>
                                            <div class="col-1">
                                                <div class="table-cell text-center">
                                                    <div class="switch m-r-10">
                                                        @if ($subValue->IsActive == true)
                                                            <input type="checkbox" class="ChangeBestSeller" id="Active-{{$subValue->CategoryID}}" checked>
                                                        @else
                                                            <input type="checkbox" class="ChangeBestSeller" id="Active-{{$subValue->CategoryID}}">
                                                        @endif
                                                        <label class="ChangeActiveStatusButton" data-id="{{$subValue->CategoryID}}" data-currentvalue="{{$subValue->IsActive}}"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="table-cell text-center">
                                                    <a class="btn btn-warning" href="{{URL("/admin/edit-category/$subValue->CategoryID")}}"><i class="bi bi-pencil-fill"></i></a>
                                                    <button class="btn btn-danger" data-id="{{$subValue->CategoryID}}" onclick="DisplayDeleteModal({{$subValue->CategoryID}})"><i class="bi bi-trash-fill"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endforeach
                    </div>
    
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="BlockAccModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Xác nhận khóa người dùng</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="UserIdToBlock" />
                        Bạn có chắc chắn muốn khóa tài khoản người dùng này không?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy bỏ</button>
                        <button type="button" class="btnConfirmBlock btn btn-primary">Xác nhận</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="UnBlockAccModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Xác nhận khóa người dùng</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="UserIdToBlock" />
                        Bạn có chắc chắn muốn mở khóa cho tài khoản này không?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy bỏ</button>
                        <button type="button" class="btnConfirmBlock btn btn-primary">Xác nhận</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="deleteModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Xác nhận xóa danh mục bài viết</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="IdToDelete" />
                        Bạn có chắc chắn muốn xóa vĩnh viễn danh mục này không?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy bỏ</button>
                        <button type="button" id="btnConfirmDelete" class="btn btn-primary">Xác nhận</button>
                    </div>
                </div>
            </div>
        </div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
    $(document).ready(function () {
        $("#btnConfirmDelete").on("click", function () {
            let IdToDelete = $("#IdToDelete").val();
            let UrlHandle = "{{URL('/admin/delete-category')}}";
            $.ajax({
                url: UrlHandle,
                type: "GET",
                data: {
                    IdToDelete: IdToDelete,
                },
                success: function (data) {
                    if (data.status == 0) {
                        $("#deleteModal").modal("hide");
                        toastr.success('Xóa thành công');
                        window.location.reload();
                    } else {
                    }
                },
            })
        });
        $(".ChangeActiveStatusButton").on("click", function () {
            var IdToUpdate = $(this).data("id");
            $.ajax({
                url: "{{URL('/admin/change-category-status')}}",
                type: "Get",
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
    