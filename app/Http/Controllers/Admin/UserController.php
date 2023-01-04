<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Doctrine\DBAL\Schema\View;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private object $model;
    private string $table;
    public function __construct()
    {
        $this->model = User::query();
        $this->table = (new User())->getTable();
        view()->share('title',  ucwords($this->table));
    }
    public function index(){
        $data = $this->model->paginate();
        return view("admin.$this->table.index",[
            'data' => $data,
        ]);
    }
}
