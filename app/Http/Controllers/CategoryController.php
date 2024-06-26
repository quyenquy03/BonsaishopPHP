<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function ListPostCate() {
        $listCategory = DB::table('categories')->Where('CategoryType', 1)->Where('Levels', 1)->get();
        $listSubCate  =DB::table('categories')->Where('CategoryType', 1)->Where('Levels', 2)->get();
        return view('Admin.ManageCategory.ListPostCate')->with(compact('listCategory', 'listSubCate'));
    }
    public function ListProductCate() {
        $listCategory = DB::table('categories')->Where('CategoryType', 2)->Where('Levels', 1)->get();
        $listSubCate  =DB::table('categories')->Where('CategoryType', 2)->Where('Levels', 2)->get();
        return view('Admin.ManageCategory.ListProductCate')->with(compact('listCategory', 'listSubCate'));
    }
    public function CreateCategory() {
        return view('Admin.ManageCategory.CreateCategory');
    }
    public function EditCategory($CategoryID) {
        $EditCategory = DB::table('categories')->Where('CategoryID', $CategoryID)->first();
        return view('Admin.ManageCategory.EditCategory')->with(compact('EditCategory'));
    }
    public function LoadCateParent(Request $request)
    {
        $CateTypeID = $request->get("CateTypeID");
        $ParentCateID = $request->get("ParentCateID");
        $listCateParent = DB::table('categories')->Where('IsActive', true)->Where('CategoryType', $CateTypeID)->Where('Levels', 1)->get();
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
            if ($ParentCateID == $value->CategoryID)
            {
                $content = $content."<option value ='$value->CategoryID' selected='true'>$value->CategoryName</ option >";
            }
            else
            {
                $content = $content."<option value ='$value->CategoryID' >$value->CategoryName</ option >";
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
        $id = DB::table('categories')->insert($newCategory);
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
        $CategoryID = $data['CategoryID'];
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
        $id = DB::table('categories')->Where('CategoryID', $CategoryID)->update([
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
        $ItemById = DB::table('categories')->Where('CategoryID', $id)->first();
        $result = DB::table('categories')->Where('CategoryID', $id)->update([
            'IsActive' => !$ItemById->IsActive
        ]);
        if($result) {
            if($ItemById->IsActive == true) {
                return array(
                    'status' => 0,
                    'currentValue' => false,
                    'message' => 'Đã ẩn danh mục'
                );
            }
            return array(
                'status' => 0,
                'currentValue' => true,
                'message' => 'Đã cho hiển thị danh mục'
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
        $result = DB::table('categories')->Where('CategoryID', $id)->delete();
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
