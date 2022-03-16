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

        return view('type/type_list', [
            'types' => $types
        ]);
    }

    public function store(TypeRequest $request)
    {
        $type_name = $request->type_name;

        $this->TypeModel->insert([
            'type_name' => $type_name
        ]);
    }

    public function destroy($id)
    {
        $this->TypeModel->find($id)->delete();
    }
}
