<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function ListPostCate() {
        return view('Admin.ManageCategory.ListPostCate');
    }
    public function ListProductCate() {
        return view('Admin.ManageCategory.ListProductCate');
    }
    public function CreateCategory() {
        return view('Admin.ManageCategory.CreateCategory');
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
            if ($ParentCateID == $value->CategoryId)
            {
                $content = $content."<option value ='$value->CategoryId' selected='true'>$value->CategoryName</ option >";
            }
            else
            {
                $content = $content."<option value ='$value->CategoryId' >$value->CategoryName</ option >";
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
        if($data["ParentCateId"] != 0) {
            $level = 2;
        }
        if($data['CategoryName'] == null || $data['Description'] == null || $data['CategoryType'] == null || $data['ParentCateId']) {
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
            "ParentCateId" => $data['ParentCateId'],
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
}
