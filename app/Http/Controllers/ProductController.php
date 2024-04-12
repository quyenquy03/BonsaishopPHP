<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function ListProduct() {
        $ListProduct = DB::table('products as b')->join('categories as c', 'c.CategoryID', '=', 'b.CategoryID')->Where('IsDeleted', false)->get();
        return view('Admin.ManageProduct.ListProduct')->with(compact('ListProduct'));
    }
    
    public function CreateProduct() {
        return view('Admin.ManageProduct.CreateProduct');
    }
    public function EditCategory($ProductID) {
        $EditCategory = DB::table('products')->Where('ProductID', $ProductID)->first();
        return view('Admin.ManageProduct.EditCategory')->with(compact('EditCategory'));
    }
    public function LoadCateParent(Request $request)
    {
        $CateTypeID = $request->get("CateTypeID");
        $ParentCateID = $request->get("ParentCateID");
        $listCateParent = DB::table('products')->Where('IsActive', true)->Where('CategoryType', $CateTypeID)->Where('Levels', 1)->get();
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
            if ($ParentCateID == $value->ProductID)
            {
                $content = $content."<option value ='$value->ProductID' selected='true'>$value->CategoryName</ option >";
            }
            else
            {
                $content = $content."<option value ='$value->ProductID' >$value->CategoryName</ option >";
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
        $id = DB::table('products')->insert($newCategory);
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
        $ProductID = $data['ProductID'];
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
        $id = DB::table('products')->Where('ProductID', $ProductID)->update([
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
        $ItemById = DB::table('products')->Where('ProductID', $id)->first();
        $result = DB::table('products')->Where('ProductID', $id)->update([
            'IsActive' => !$ItemById->IsActive
        ]);
        if($result) {
            if($ItemById->IsActive == true) {
                return array(
                    'status' => 0,
                    'currentValue' => false,
                    'message' => 'Đã ẩn sản phẩm'
                );
            }
            return array(
                'status' => 0,
                'currentValue' => true,
                'message' => 'Đã cho hiển thị sản phẩm'
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
        $result = DB::table('products')->Where('ProductID', $id)->delete();
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
