<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function ListBlog() {
        $ListBlog = DB::table('blogs as b')->join('categories as c', 'c.CategoryID', '=', 'b.CategoryID')->Where('IsDeleted', false)->get();
        return view('Admin.ManageBlog.ListBlog')->with(compact('ListBlog'));
    }
    
    public function CreateBlog() {
        return view('Admin.ManageBlog.CreateBlog');
    }
    public function EditCategory($BlogID) {
        $EditCategory = DB::table('blogs')->Where('BlogID', $BlogID)->first();
        return view('Admin.ManageBlog.EditCategory')->with(compact('EditCategory'));
    }
    public function LoadCateParent(Request $request)
    {
        $CateTypeID = $request->get("CateTypeID");
        $ParentCateID = $request->get("ParentCateID");
        $listCateParent = DB::table('blogs')->Where('IsActive', true)->Where('CategoryType', $CateTypeID)->Where('Levels', 1)->get();
        $content = "";
        if($ParentCateID == 0)
        {
            $content = $content."<option value ='0' selected='true'>Không có danh mục cha</ option >";
        }
        else
        {
            $content=  $content."<option value ='0'>Không có danh mục cha</ option >";
        }

        foreach ($listCateParent as $key => $value)
        {
            if ($ParentCateID == $value->BlogID)
            {
                $content = $content."<option value ='$value->BlogID' selected='true'>$value->CategoryName</ option >";
            }
            else
            {
                $content = $content."<option value ='$value->BlogID' >$value->CategoryName</ option >";
            }
        }
        return array(
            'status' => 0,
            'Content' => $content
        );
    }
    public function SaveCategory(Request $request) {
        $data = $request->all();
        $level = 1;
        if($data["ParentCateID"] != 0) {
            $level = 2;
        }
        if($data['CategoryName'] == null || $data['Description'] == null || $data['CategoryType'] == null) {
            toastr()->error('Vui lòng điển đủ thông tin');
            return Redirect::back();
        }
        $slug = Str::slug($data["CategoryName"] , "-").'-'.time();
        $newCategory = array(
            "CategoryName" => $data['CategoryName'],
            "Description" => $data['Description'],
            "SeoTitle" => $data['SeoTitle'],
            "SeoKeyword" => $data['SeoKeyword'],
            "SeoDescription" => $data['SeoDescription'],
            "CategoryType" => $data['CategoryType'],
            "ParentCateID" => $data['ParentCateID'],
            "IsActive" => true,
            "Levels" => $level,
            "Alias" => $slug,
        ); 
        $id = DB::table('blogs')->insert($newCategory);
        if($id) {
            toastr()->success('Thêm mới danh mục thành công');
            if($data["CategoryType"] == 1) {
                return Redirect('/admin/list-post-cate');
            } 
            return Redirect('/admin/list-product-cate');
            
        }
    }
    public function UpdateCategory(Request $request) {
        $data = $request->all();
        $BlogID = $data['BlogID'];
        $level = 1;
        if($data["ParentCateID"] != 0) {
            $level = 2;
        }
        $IsActive = $data['IsActive'] == 1 ? true : false;
        if($data['CategoryName'] == null || $data['Description'] == null || $data['CategoryType'] == null) {
            toastr()->error('Vui lòng điển đủ thông tin');
            return Redirect::back();
        }
        $slug = Str::slug($data["CategoryName"] , "-").'-'.time();
        $id = DB::table('blogs')->Where('BlogID', $BlogID)->update([
            "CategoryName" => $data['CategoryName'],
            "Description" => $data['Description'],
            "SeoTitle" => $data['SeoTitle'],
            "SeoKeyword" => $data['SeoKeyword'],
            "SeoDescription" => $data['SeoDescription'],
            "CategoryType" => $data['CategoryType'],
            "ParentCateID" => $data['ParentCateID'],
            "IsActive" => $IsActive,
            "Levels" => $level,
            "Alias" => $slug
        ]);
        if($id) {
            toastr()->success('Cập nhật danh mục thành công');
            if($data["CategoryType"] == 1) {
                return Redirect('/admin/list-post-cate');
            } 
            return Redirect('/admin/list-product-cate');
            
        }
    }
    public function ChangeStatus(Request $request) {
        $data = $request->all();
        $id = $data['IdToUpdate'];
        $ItemById = DB::table('blogs')->Where('BlogID', $id)->first();
        $result = DB::table('blogs')->Where('BlogID', $id)->update([
            'IsActive' => !$ItemById->IsActive
        ]);
        if($result) {
            if($ItemById->IsActive == true) {
                return array(
                    'status' => 0,
                    'currentValue' => false,
                    'message' => 'Đã ẩn bài viết'
                );
            }
            return array(
                'status' => 0,
                'currentValue' => true,
                'message' => 'Đã cho hiển thị bài viết'
            );
        }
        return array(
            'status' => 1,
            'message' => 'Hệ thống đang bị lỗi'
        );
    }
    public function DeleteCategory(Request $request) {
        $data = $request->all();
        $id = $data['IdToDelete'];
        $result = DB::table('blogs')->Where('BlogID', $id)->delete();
        if($result) {
            return array(
                'status' => 0,
                'message' => 'Xoá danh mục thành công'
            );
        }
        return array(
            'status' => 1,
            'message' => 'Hệ thống đang bị lỗi'
        );
    }
}