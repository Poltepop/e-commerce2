<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function adminProduct()
    {
        return view('admin.product');
    }

    public function formCreate()
    {
        return view('admin.form-product-cerate');
    }

    public function formUpdate()
    {
        return view('admin.form-product-update');
    }
}
