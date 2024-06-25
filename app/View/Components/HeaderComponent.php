<?php

namespace App\View\Components;

use Illuminate\View\Component;
use DB;
class HeaderComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $ListProductCategory = DB::table('categories')->Where('IsActive', 1)->Where('CategoryType', 2)->get();
        $ListBlogCategory = DB::table('categories')->Where('IsActive', 1)->Where('CategoryType', 1)->get();
        $account = session()->get('account');
        return view('components.header-component')->with(compact('ListProductCategory', 'ListBlogCategory', 'account'));
    }
}
