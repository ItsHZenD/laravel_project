<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use PDO;

class PostController extends Controller
{
    use ResponseTrait;
    private object $model;
    public function __construct()
    {
        $this->model = Post::query();
    }

    public function index(){
        // return $this->model->first()->currency_salary_code;
        $data = $this->model->paginate(10);
        foreach($data as $each) {
            // $each->append('currency_salary_code');
            $each->currency_salary = $each->currency_salary_code;
            $each->status = $each->status_name;
        }

        // return response()->json([
        //     'success' => true,
        //     'data' => $data->getCollection(),
        //     'pagination' => $data->linkCollection()
        // ]);

        // return $this->errorResponse('Import Failed');

        $arr['data'] = $data->getCollection();
        $arr['pagination'] = $data->linkCollection();

        return $this->successResponse($arr);
    }
}
