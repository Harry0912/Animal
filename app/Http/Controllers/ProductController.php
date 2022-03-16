<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\TypeModel;
use App\Http\Requests\ProductRequest;
use Intervention\Image\ImageManagerStatic;

class ProductController extends Controller
{
    public function __construct(ProductModel $productModel, TypeModel $typeModel)
    {
        $this->ProductModel = $productModel;
        $this->TypeModel = $typeModel;
    }

    public function index($type_id = false)
    {
        // if ($type_id) {
        //     $products = $this->ProductModel->where('type_id', $type_id)->paginate(1);
        // } else {
        //     $products = $this->ProductModel->paginate(1);
        // }
        if ($type_id) {
            $products = $this->ProductModel->where('type_id', $type_id)->get();
        } else {
            $products = $this->ProductModel->get();
        }
        
        $types = $this->TypeModel->get();

        return view('product/product_list', [
            'products' => $products,
            'types' => $types
        ]);
    }

    public function show($id)
    {
        $types = $this->TypeModel->get();
        $product = $this->ProductModel->with('type')->find($id);

        return view('product/product_info', [
            'types' => $types,
            'product' => $product
        ]);
    }

    public function create()
    {
        $types = $this->TypeModel->get();
        return view('product/product_add', [
            'buttonId' => 'productAdd',
            'buttonName' => '新增',
            'types' => $types
        ]);
    }

    public function store(ProductRequest $request)
    {
        $type_id = $request->type_id;
        $title = $request->product_title;
        $intro = $request->product_intro;
        $ingredients = $request->product_ingredients;
        $weight = $request->product_weight;
        $content = $request->product_content;
        // $image = $request->product_image->store('upload/product', 'public');


        $this->ProductModel->insert([
            'type_id' => $type_id,
            'product_title' => $title,
            'product_intro' => $intro,
            'product_ingredients' => $ingredients,
            'product_weight' => $weight,
            'product_content' => $content,
            // 'product_image' => $image
        ]);
    }

    public function edit($id)
    {
        $types = $this->TypeModel->get();
        $product = $this->ProductModel->find($id);

        return view('/product/product_add', [
            'buttonId' => 'productEdit',
            'buttonName' => '儲存',
            'types' => $types,
            'product' => $product
        ]);
    }

    public function update(ProductRequest $request, $id)
    {
        $product = $this->ProductModel->find($id);

        $product->type_id = $request->type_id;
        $product->product_title = $request->product_title;
        $product->product_intro = $request->product_intro;
        $product->product_ingredients = $request->product_ingredients;
        $product->product_weight = $request->product_weight;
        $product->product_content = $request->product_content;
        $product->save();
    }

    public function destroy($id)
    {
        $this->ProductModel->find($id)->delete();
    }
}
