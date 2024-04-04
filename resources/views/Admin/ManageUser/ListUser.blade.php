@extends('Layout.AdminLayout')
@section('content')
    

<div class="pagetitle">
    <h1 class="text-center">Danh sách người dùng</h1>
</div><!-- End Page Title -->

<div class="card mt-3">
    <div class="card-body">
        <div class="action-box d-flex align-items-end justify-content-between">
            <div class="filter-box d-flex">
                <div class="list-filter">
                    <span class="form-label d-block mb-1 mt-3">Lọc theo quyền người dùng</span>
                    <select class="form-control" id="ChooseRoles"  style="width: 250px" name="RoleID">
                        <option>Admin</option>
                        <option>User</option>
                    </select>
                </div>
                <div class="list-filter mx-3">
                    <span class="form-label d-block mb-1 mt-3">Lọc theo trạng thái</span>
                    <select class="form-control" id="ChooseRoles"  style="width: 250px" name="RoleID">
                        <option>Admin</option>
                        <option>User</option>
                    </select>
                </div>
            </div>
            <div class="addnew-box ">
                <a class="btn btn-primary" href="{{URL('/admin/create-user')}}">Thêm mới</a>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <section class="section dashboard">

            <table class="table mt-4">
                <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Họ và tên</th>
                        <th scope="col">UserName</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phân quyền</th>
                        <th scope="col">Hoạt động</th>
                        <th scope="col">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <@php
                        $i = 1;
                    @endphp
                    @foreach($listUser as $key => $item)
                        <tr class="text-center tbl-row">
                            <th scope="row">
                                <div class="table-cell-center">{{$i++}}</div>
                            </th>
                            <td class="tbl-collum">{{$item->FullName}}</td>
                            <td class="tbl-collum">{{$item->UserName}}</td>
                            <td class="tbl-collum">{{$item->Email}}</td>
                            @if($item->RoleID == 1) 
                                <td> Quản trị viên </td>
                            @else
                                <td>Khách hàng</td>
                            @endif
                            @if($item->IsBlocked == 0)
                                <td>Đang hoạt động</td>
                            @else
                                <td>Đã bị khóa</td>
                            @endif
                            <td>
                                @if($item->IsBlocked == 1)
                                    <a class="btn btn-primary" onclick="DisplayUnBlockModal({{$item->UserID}})"><i class="bi bi-unlock-fill"></i></a>
                                @else
                                    <a class="btn btn-info" onclick="DisplayBlockModal({{$item->UserID}})"><i class="bi bi-lock-fill"></i></a>
                                @endif
                                <a class="btn btn-warning" href="{{URL("/admin/edit-user/$item->UserID")}}"><i class="bi bi-pencil-fill"></i></a>
                                <button class="btn btn-danger" onclick="DisplayDeleteModal({{$item->UserID}})"><i class="bi bi-trash-fill"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="modal fade" id="deleteModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Xác nhận xóa người dùng</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="UserIDToDelete" />
                            Bạn có chắc chắn muốn xóa người dùng này không?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy bỏ</button>
                            <button type="button" id="btnConfirmDelete" class="btn btn-primary">Xác nhận</button>
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
                            <input type="hidden" id="UserIDToBlock" />
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
                            <input type="hidden" id="UserIDToBlock" />
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

        <div aria-label="Page navigation example" class="text-center align-items-center">
            <ul class="pagination text-center d-inline-block">
                {{ $listUser->links() }}
            </ul>
        </div>
    </div>
</div>
<script>
    document.querySelectorAll('[rel="prev"]')[0].innerHTML = "<"
    document.querySelectorAll('[rel="next"]')[0].innerHTML = ">"
</script>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#btnConfirmDelete").on("click", function() {
                let UserID = $("#UserIDToDelete").val();
                let UrlHandle = "/admin/delete-user";
                $.ajax({
                    url : 'delete-user/'+UserID,
                    type : "GET",
                    success : function (data) {
                        console.log(data);
                        if(data.status == 200) {
                            $("#deleteModal").modal("hide");
                            window.location.reload();
                        } else {
                            // $("#deleteModal").modal("hide");
                            // window.location.reload();
                        }
                    },
                })
            });
            $(".btnConfirmBlock").on("click", function () {
                let UserID = $("#UserIDToBlock").val();
                let UrlHandle = "block-account/"+UserID;

                $.ajax({
                    url: UrlHandle,
                    type: "GET",
                    success: function (data) {
                        if (data.status == 200) {
                            toastr.success('Success')
                            $("#BlockAccModal").modal("hide");
                            $("#UnBlockAccModal").modal("hide");

                            window.location.reload();
                        } else {
                            // $("#deleteModal").modal("hide");
                            // window.location.reload();
                        }
                    },

                })
            })
            $("#ChooseRoles").on("change", function () {
                roleID = $("#ChooseRoles").children(":selected").attr("value");
                ActiveStatus = $("#ChooseIsAcctive").children(":selected").attr("value");
                roleID = parseFloat(roleID);
                SelectChangeHandle(roleID, ActiveStatus);
            })
            $("#ChooseIsAcctive").on("change", function () {
                roleID = $("#ChooseRoles").children(":selected").attr("value");
                ActiveStatus = $("#ChooseIsAcctive").children(":selected").attr("value");
                roleID = parseFloat(roleID);
                SelectChangeHandle(roleID, ActiveStatus);
            })
            function SelectChangeHandle(roleID, ActiveStatus) {
                $("#ChooseRoles option").removeAttr("selected");
                $("#ChooseRoles > [value=" + roleID + "]").attr("selected", "true");

                $("#ChooseIsAcctive option").removeAttr("selected");
                $("#ChooseIsAcctive > [value=" + ActiveStatus + "]").attr("selected", "true");

                $.ajax({
                    url: "/Admin/Account/Filter",
                    datatype: "json",
                    type: "GET",
                    data: {
                        "RoleID": roleID,
                        "ActiveStatus" : ActiveStatus
                    },
                    async: true,
                    success: function (results) {
                        if (results.status == 1) {
                            window.location.href = results.linkURL;
                        }
                    },
                    error: function (xhr) {
                        alert("error")
                    }
                })
            }
            
        });
        
    </script>
    <script type="text/javascript">
        function DisplayDeleteModal(id) {
            $("#UserIDToDelete").val(id);
            $("#deleteModal").modal("show");
        }
        function DisplayBlockModal(id) {
            $("#UserIDToBlock").val(id);
            $("#BlockAccModal").modal("show");
        }
        function DisplayUnBlockModal(id) {
            $("#UserIDToBlock").val(id);
            $("#UnBlockAccModal").modal("show");
        }
    </script>

@endsection