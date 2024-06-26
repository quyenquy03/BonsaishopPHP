<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;

class UserController extends Controller
{
     public function index(Request $request) {
          $role = $request->get("role");
          $listUser = DB::table('users')->OrderBy('UserID');
          if($role == 1 || $role == 2){
               $listUser = $listUser->Where('RoleID', $role);
          }
          $listUser = $listUser->simplePaginate(5);
          return view('Admin.ManageUser.ListUser')->with(compact('listUser'));
     }
     public function CreateUser() {
          return view('Admin.ManageUser.CreateUser');
     }
     public function EditUser($UserId) {
          $editUser = DB::table('users')->Where('UserID', $UserId)->first();
          if($editUser) {
               return view('Admin.ManageUser.UpdateUser')->with(compact('editUser'));
          } else {
               toastr()->error('Không tìm thấy người dùng này');
               return Redirect('/admin/list-user');
          }
     }
     public function SaveNewUser(Request $request) {
          $data = $request->all();
          $avatar = '';
          $user = DB::table('users')->Where('UserName', $data['UserName'])->first();
          if($user) {
               toastr()->error('Tài khoản đã tồn tại');
               return Redirect::back();
          }
          if($data['UserName'] == null || $data['FullName'] == null || $data['Email'] == null || $data['Phone'] == null ) {
               toastr()->error('Vui lòng điển đủ thông tin');
               return Redirect::back();
          }
          if($request->has('avatar')) {
               $image = $request->avatar;
               $filename = time().'-'.$image->getClientOriginalName();
               $image->move(public_path('images/users'), $filename);
               $avatar = "/public/images/users/".$filename;
          }
          $newUser =  array(
               'UserName' => $data['UserName'],
               'FullName' => $data['FullName'],
               'Email' => $data['Email'],
               'Phone' => $data['Phone'],
               'avatar'=> $avatar,
               'RoleID' => $data['RoleID'],
               'IsDeleted' => 0,
               'IsBlocked' => 0,
               'Password' => md5('123123'),
          );
          $id = DB::table('users')->insert($newUser);
          if($id) {
               toastr()->success('Thêm mới người dùng thành công');
               return Redirect('/admin/list-user');
          }
     }
     public function UpdateUser(Request $request) {
          $data = $request->all();
          $avatar = $data['oldAvatar'];
          if($data['FullName'] == null || $data['Email'] == null || $data['Phone'] == null ) {
               toastr()->error('Vui lòng điển đủ thông tin');
               return Redirect::back();
          }
          if($request->has('avatar')) {
               $image = $request->avatar;
               $filename = time().'-'.$image->getClientOriginalName();
               $image->move(public_path('images/users'), $filename);
               $avatar = "/public/images/users/".$filename;
          }
          $id = DB::table('users')->where('UserID', $data['UserID'])->update([
               'FullName' => $data['FullName'],
               'Email' => $data['Email'],
               'Phone' => $data['Phone'],
               'avatar'=> $avatar,
               'RoleID' => $data['RoleID'],
          ]);
          if($id) {
               toastr()->success('Cập nhật người dùng thành công');
               return Redirect('/admin/list-user');
          } else {
               toastr()->error('Lỗi hệ thống, vui lòng thử lại sau');
               return Redirect::back();
          }
     }
     public function DeleteUser($UserId) {
          if(!$UserId) {
               $res = array(
                    'status' => 400,
                    'message' => 'Error'
               );
               return $res;
          }
          $id = DB::table('users')->Where('UserID', $UserId)->delete();
          if($id) {
               $res = array(
                    'status' => 200,
                    'message' => 'Success'
               );
               return $res;
          } else {
               $res = array(
                    'status' => 500,
                    'message' => 'Error'
               );
               return $res;
          }
     }
     public function BlockAccount($UserId) {
          if(!$UserId) {
               $res = array(
                    'status' => 400,
                    'message' => 'Error'
               );
               return $res;
          }
          $user = DB::table('users')->Where('UserID', $UserId)->first();
          if($user) {
               $id = DB::table('users')->Where('UserID', $UserId)->update([
                    'IsBlocked' => !$user->IsBlocked
               ]);
               if($id) {
                    $res = array(
                         'status' => 200,
                         'message' => 'Success'
                    );
                    return $res;
               }
          } else {
               $res = array(
                    'status' => 500,
                    'message' => 'Error'
               );
               return $res;
          }
     }
     public function DangNhap() {
          return view('Layout.LoginPage');
     }
     public function SignIn(Request $request) {
          $data = $request->all();
          $user = DB::table('users')->Where('UserName', $data['UserName'])->Where('Password', md5($data['Password']))->first();
          if($user) {
               $account = array(
                    'IsLogin' => true,
                    'Account' => $user
               );
               session()->put('account', $account);
               toastr()->success('Login Success');
               return Redirect('/');
          } 
          toastr()->error('Login Fail');
          return Redirect::back();
     }
     public function DangKy() {
          return view('Layout.RegisterPage');
     }
     public function SignUp(Request $request) {
          $data = $request->all();
          $newUser =  array(
               'UserName' => $data['UserName'],
               'FullName' => $data['FullName'],
               'Email' => $data['Email'],
               'Phone' => $data['Phone'],
               'avatar'=> '/public/images/users/1712140845-images.png',
               'RoleID' => 2,
               'IsDeleted' => 0,
               'IsBlocked' => 0,
               'Password' => md5($data['Password']),
          );
          $id = DB::table('users')->insert($newUser);
          if($id) {
               toastr()->success('Đăng ký tài khoản thành công');
               return Redirect('/tai-khoan/dang-nhap');
          }
          toastr()->error('Đăng ký thất bại, vui lòng kiểm tra thông tin');
          return Redirect::back();
     }
     public function Logout() {
          session()->forget('account');
          toastr()->success('Logout Success');
          return Redirect('/tai-khoan/dang-nhap');
     }
}
