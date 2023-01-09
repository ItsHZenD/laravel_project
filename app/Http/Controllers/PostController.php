<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use PDO;

class PostController extends Controller
{
    private object $model;
    public function __construct()
    {
        $this->model = Post::query();
    }

    public function index(){
        return  $this->model->paginate();
    }
}
