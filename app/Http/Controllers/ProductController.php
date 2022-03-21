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

    public function types()
    {
        $types = $this->TypeModel->get()->toArray();
        $total = 0;
        foreach ($types as $key => $value) {
            $count = $this->ProductModel->where('type_id', $value['type_id'])->count();
            $types[$key]['count'] = $count;
            $total += $count;
        }

        return array($types, $total);
    }

    public function index($type_id = false)
    {
        // if ($type_id) {
        //     $products = $this->ProductModel->where('type_id', $type_id)->paginate(1);
        // } else {
        //     $products = $this->ProductModel->paginate(1);
        // }
        if ($type_id) {
            $products = $this->ProductModel->where('type_id', $type_id)->paginate(4);
        } else {
            $products = $this->ProductModel->paginate(4);
        }
        
        //熱門商品(點擊數)排行，取前3筆
        $hits = $this->ProductModel->orderBy('hits', 'desc')->limit(3)->get();
        
        $types = $this->types();

        return view('product/product_list', [
            'products' => $products,
            'types' => $types[0],
            'total' => $types[1],
            'hits' => $hits
        ]);
    }

    public function show($id)
    {
        $types = $this->types();
        $product = $this->ProductModel->with('type')->find($id);

        //產品點擊數+1
        $product->hits = $product->hits+1;
        $product->save();

        //熱門商品(點擊數)排行，取前3筆
        $hits = $this->ProductModel->orderBy('hits', 'desc')->limit(3)->get();

        return view('product/product_info', [
            'product' => $product,
            'types' => $types[0],
            'total' => $types[1],
            'hits' => $hits
        ]);
    }

    public function create()
    {
        $types = $this->types();
        return view('product/product_add', [
            'action' => '/product_add/store',
            'buttonId' => 'productAdd',
            'buttonName' => '新增',
            'types' => collect($types[0])
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
        $on_sale = ($request->on_sale) ? 'Y' : 'N';
        $price = $request->product_price;
        $discount = $request->discount_price;
        $image = ($request->product_image)?$request->product_image->store('upload/product', 'public'):null;

        $this->ProductModel->insert([
            'type_id' => $type_id,
            'product_title' => $title,
            'product_intro' => $intro,
            'product_ingredients' => $ingredients,
            'product_weight' => $weight,
            'product_content' => $content,
            'on_sale' => $on_sale,
            'product_price' => $price,
            'discount_price' => $discount,
            'product_image' => $image
        ]);
    }

    public function edit($id)
    {
        $types = $this->types();
        $product = $this->ProductModel->find($id);

        return view('/product/product_add', [
            'action' => '/product_update/'.$id,
            'buttonId' => 'productEdit',
            'buttonName' => '儲存',
            'product' => $product,
            'types' => $types[0],
            'total' => $types[1]
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
        $product->on_sale = ($request->on_sale) ? 'Y' : 'N';
        $product->product_price = $request->product_price;
        $product->discount_price = $request->discount_price;
        if ($request->product_image) $product->product_image = $request->product_image->store('upload/product', 'public');
        $product->save();
    }

    public function destroy($id)
    {
        $this->ProductModel->find($id)->delete();
    }

    public function search($keyword)
    {
        $products = $this->ProductModel->where('product_title', 'like', '%'.$keyword.'%')->get();

        //熱門商品(點擊數)排行，取前3筆
        $hits = $this->ProductModel->orderBy('hits', 'desc')->limit(3)->get();
        
        $types = $this->types();

        return view('product/product_list', [
            'products' => $products,
            'types' => $types[0],
            'total' => $types[1],
            'hits' => $hits
        ]);
    }
}
