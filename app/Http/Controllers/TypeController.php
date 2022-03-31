<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeModel;
use App\Http\Requests\TypeRequest;

class TypeController extends Controller
{
    public function __construct(TypeModel $typeModel)
    {
        $this->TypeModel = $typeModel;
    }

    public function index()
    {
        $types = $this->TypeModel->get();

        $breadcrumbp[] = [
            'name' => '產品',
            'active' => '/product_list'
        ];
        $breadcrumbp[] = [
            'name' => '產品分類',
            'active' => 'active'
        ];

        return view('type/type_list', [
            'types' => $types,
            'breadcrumb' => $breadcrumbp
        ]);
    }

    public function store(TypeRequest $request)
    {
        $type_name = trim($request->type_name);

        $this->TypeModel->insert([
            'type_name' => $type_name
        ]);
    }

    public function update()
    {
        $type_id_array = $_POST['type_id'];
        $type_name_array = $_POST['type_name'];

        foreach ($type_id_array as $key => $value) {
            $type = $this->TypeModel->find($type_id_array[$key]);
            $type->type_name = trim($type_name_array[$key]);
            $type->save();
        }
    }

    public function destroy($id)
    {
        $this->TypeModel->find($id)->delete();
    }
}
