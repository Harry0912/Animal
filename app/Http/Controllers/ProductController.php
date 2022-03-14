<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\TypeModel;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\TypeRequest;
use Intervention\Image\ImageManagerStatic;

class ProductController extends Controller
{
    public function __construct(ProductModel $productModel, TypeModel $typeModel)
    {
        $this->ProductModel = $productModel;
        $this->TypeModel = $typeModel;
    }

    public function index()
    {
        $products = $this->ProductModel->get();
        $types = $this->TypeModel->where('deleted_at', null)->get();

        return view('product/product_list', [
            'products' => $products,
            'types' => $types
        ]);
    }

    public function create()
    {
        return view('product/product_add');
    }

    public function store(ProductRequest $request)
    {
        $title = $request->product_title;
        $intro = $request->product_intro;
        $ingredients = $request->product_ingredients;
        $weight = $request->product_weight;
        $content = $request->product_content;
        $image = $request->product_image->store('upload/product', 'public');


        $this->ProductModel->insert([
            'product_title' => $title,
            'product_intro' => $intro,
            'product_ingredients' => $ingredients,
            'product_weight' => $weight,
            'product_content' => $content,
            'product_image' => $image
        ]);
    }

    public function type_list()
    {
        $types = $this->TypeModel->where('deleted_at', null)->get();

        return view('product/product_type', [
            'types' => $types
        ]);
    }

    public function type_store(TypeRequest $request)
    {
        $type_name = $request->type_name;
        // $type_name_collect = DB::table('producttypes')->get();

        // $type_name_collect->transform(function($item) {
        //     dump($item->type_name);
        // });
        // exit;

        $this->TypeModel->insert([
            'type_name' => $type_name
        ]);
    }

    public function type_destroy($id)
    {
        $this->TypeModel->find($id)->delete();
    }
}
