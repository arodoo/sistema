<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Session;
//use DB;
//use Session;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request){
        $search = "";
        $limit = 3;
        if ($request->has('search')){
            $search = $request->input('search');
    
            if (trim($search) != ''){
                $data = User::where('name', 'like', "%$search%")
                    ->orwhere('email', 'like', "%$search%")->get();
            } else {
                $data = User::all();
            }
        } else {
            $data = User::all();
        }
        $currentPage = Paginator::resolveCurrentPage() - 1;
        $perPage = $limit;
        $currentPageSearchResults = $data->slice($currentPage * $perPage, $perPage)->all();
        $data = new LengthAwarePaginator($currentPageSearchResults, count($data), $perPage);
        return view('admin.usuarios.index', ['data' => $data, 'search' => $search, 'page' => $currentPage]);
    }

    public function create(){
        return view('admin.usuarios.create');
    }

    public function store(Request $request){
        try{
            
            DB::beginTransaction();
            $validated = $request->validate([
                'nombre' => ['required', 'string', 'max:40'],
                //'pApellido' => ['required', 'string', 'max:30'],
                //'sApellido' => ['required', 'string', 'max:30'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8'],
            ]);
    
            User::create([
                'name' => $validated['nombre'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);
    
    
            DB::commit();
            Session::flash('status', "Se ha agregado correctamente el registro");
            Session::flash('status_type', 'success');
            return redirect(route('users.index'));
    
        }catch(\Illuminate\Database\QueryException $ex){
            DB::rollBack();
            Session::flash('status', $ex->getMessage());
            Session::flash('status_type', 'error-Query');
            return back();
        }catch(\Exception $e)
        {
            DB::rollBack();
                Session::flash('status', $e->getMessage());
                Session::flash('status_type', 'error');
                return back();
        }
    }

    public function edit($id){
        //dos maneras diferentes de hacer lo mismo
        $user2 = USer::where('id','=',$id)->get();
        $user = User::findOrFail($id);
        return view('admin.user.edit', ['user' => $user]);
    }

    public function update(Request $request, $id){
        try {
            DB::beginTransaction();
            $validated = $request->validate([
                'nombre'=> ['required', 'string', 'max:100'],
                'password' => ['required', 'string', 'min:8'],
            ]);

            $valida = User::where('email', '=', $request['email'])->first();
            if($valida != null && $valida->id == $id){
                $data = [
                    'name'=> $request['nombre'],
                    'password'=>$request['email'],
                    'password'=> Hash::make($request['password'])
                ];
            }else{
                Session::flash('status', 'Correo electrónico ya asignado');
                Session::flash('status_type', 'warning');
                return back();
            }

            $user = User::findOrFail($id);
            $user->update($data);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
