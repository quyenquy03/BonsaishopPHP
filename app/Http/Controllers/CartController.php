<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Illuminate\Support\Str;

class CartController extends Controller
{
    public function AddToCart(Request $request) {
        $ProductID = $request->productid;
        $product = DB::table('products as p')
            ->join('categories as c', 'c.CategoryID', '=', 'p.CategoryId')
            ->where('IsDeleted', false)->Where('ProductID', $ProductID)->first();
        if(!$product) {
            return array(
                'status' => 1,
                'message' => 'Không tìm thấy sản phẩm'
            );
        }
        $cart = session()->get('cart');
        if (!$cart) {
            $cart = [
                $ProductID => [
                    "ProductName" => $product->ProductName,
                    "quantity" => 1,
                    "ProductPrice" => $product->ProductPrice,
                    "ProductImage" => $product->ProductImage,
                    "ProductSlug" => $product->ProductSlug,
                    "ProductID" => $product->ProductID,
                    "ProductDisCount" => $product->ProductDisCount,
                    "CategoryId" => $product->CategoryId,
                    "CategoryName" => $product->CategoryName
                ]
            ];
        }
        if (isset($cart[$ProductID])) {
            $cart[$ProductID]['quantity']++;
            session()->put('cart', $cart);
            return array(
                'status' => 0,
                'message' => 'Tăng số lượng lên 1'
            );
        }
        $cart[$ProductID] = [
            "ProductName" => $product->ProductName,
            "quantity" => 1,
            "ProductPrice" => $product->ProductPrice,
            "ProductImage" => $product->ProductImage,
            "ProductSlug" => $product->ProductSlug,
            "ProductID" => $product->ProductID,
            "ProductDisCount" => $product->ProductDisCount,
            "CategoryId" => $product->CategoryId,
            "CategoryName" => $product->CategoryName
        ];
        session()->put('cart', $cart);
        return array(
            'status' => 0,
            'message' => 'Them vao gio hang thanh cong'
        );
    }
    public function GetProductFromCart() {
        $cart = session()->get('cart');
        $ListProvince = DB::table('provinces')->get();
        return view('Client.Cart')->with(compact('cart', 'ListProvince'));
    }
    public function DeleteCartItem(Request $request) {
        $ProductID = $request->productid;
        if($ProductID) {
            $cart = session()->get('cart');
            if (isset($cart[$ProductID])) {

                unset($cart[$ProductID]);

                session()->put('cart', $cart);
            }
            $total = 0;
            foreach ($cart as $key => $value) {
                $total = $total + ($value['quantity'] * $value['ProductPrice']);
            }
            return array(
                'status' => 0,
                'total' => $total,
                'message' => 'Đã xoá sản phẩm khỏi giỏ hàng'
            );
        }
        return array(
            'status' => 1,
            'message' => 'Không tìm thấy sản phẩm'
        );
    }
    public function DecreaseCart(Request $request) {
        $ProductID = $request->productid;
        if($ProductID) {
            $cart = session()->get('cart');
            if (isset($cart[$ProductID])) {
                $cart[$ProductID]['quantity']--;
                session()->put('cart', $cart);
            }
            $total = 0;
            foreach ($cart as $key => $value) {
                $total = $total + ($value['quantity'] * $value['ProductPrice']);
            }
            return array(
                'status' => 0,
                'total' => $total,
                'totalCheckout' => $cart[$ProductID]['quantity'] * $cart[$ProductID]['ProductPrice'],
                'message' => 'Đã giảm số lượng'
            );
        }
        return array(
            'status' => 1,
            'message' => 'Không tìm thấy sản phẩm'
        );
    }
    public function IncreaseCart(Request $request) {
        $ProductID = $request->productid;
        if($ProductID) {
            $cart = session()->get('cart');
            if (isset($cart[$ProductID])) {
                $cart[$ProductID]['quantity']++;
                session()->put('cart', $cart);
            }
            $total = 0;
            foreach ($cart as $key => $value) {
                $total = $total + ($value['quantity'] * $value['ProductPrice']);
            }
            return array(
                'status' => 0,
                'total' => $total,
                'totalCheckout' => $cart[$ProductID]['quantity'] * $cart[$ProductID]['ProductPrice'],
                'message' => 'Đã tăng số lượng'
            );
        }
        return array(
            'status' => 1,
            'message' => 'Không tìm thấy sản phẩm'
        );
    }
    public function ClearCart() {
        session()->forget('cart');
    }
    public function Checkout(Request $request) {
        $cart = session()->get('cart');
        if(!$cart) {
            return Redirect::to('/cart');
        }
        session()->forget('cart');
        toastr()->success('Đặt hàng thành công');
        return Redirect::to('/');
    }
}
// 