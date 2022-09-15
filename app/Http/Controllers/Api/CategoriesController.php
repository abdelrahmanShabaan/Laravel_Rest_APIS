<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Http\Traits\GeneralTrait;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    use GeneralTrait;

    public function index()
    {

           $categories = category::select()->get();
           //return response()->json($categories);
            return $this -> returnData('categories',$categories );
    }

        public function getCategoryById(Request $request)
    {

        $category = category::select()->find($request -> id);
        if (!$category)
          return $this -> returnError('001','هذا المنتج غير موجود');
        return $this -> returnData('category', $category);
    }

    public function changeStatus(Request $request)
    {
        //validation
        Category::where('id',$request -> id) -> update(['active' =>$request ->  active]);

        return $this -> returnSuccessMessage('تم تغيير الحاله بنجاح');

    }

}

