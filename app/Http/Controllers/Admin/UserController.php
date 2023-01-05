<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserRoleEnum;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private object $model;
    private string $table;
    public function __construct()
    {
        $this->model = User::query();
        $this->table = (new User())->getTable();
        View::share('title', ucwords($this->table));
        View::share('table', $this->table);
    }
    public function index(Request $request)
    {
        $selectedRole = $request->get('role');
        $selectedCity = $request->get('city');

        $query = $this->model->clone()
            ->with('company:id,name')
            ->latest();
        if(!empty($selectedRole) && $request->get('role') !== "All" ){
            $query->where('role', $selectedRole);
        }
        if(!empty($selectedCity) && $request->get('city') !== "All" ){
            $query->where('city', $selectedCity);
        }
        $data = $query->paginate();


        // $data = $this->model->clone()
        //     ->when($request->has('role'), function($q){
        //         return $q->where('role', request('role'));
        //     })
        //     ->when($request->has('city'), function($q){
        //         return $q->where('city', request('city'));
        //     })
        //     ->with('company:id,name')
        //     ->latest()
        //     ->paginate();

        $roles = UserRoleEnum::asArray();

        $cities = $this->model->clone()
            ->distinct()
            ->pluck('city');



        return view("admin.$this->table.index", [
            'data' => $data,
            'roles' => $roles,
            'cities' => $cities,
            'selectedRole' => $selectedRole,
            'selectedCity' => $selectedCity,

        ]);
    }
}
