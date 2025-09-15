<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Admin\Admin;
use App\Models\Job\Job;
use App\Models\Job\Application;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use File;


class AdminsController extends Controller
{
    //

    public function viewLogin()
    {

        return view("admins.view-login");

    }

    public function checkLogin(Request $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
            return redirect()->route('admins.dashboard');
        }
        
        return redirect()->back()->with(['error' => 'Error, cuenta incorrecta']);
    }

    public function index()
    {
        $jobs = Job::select()->count();

        $categories = Category::select()->count();

        $admins = Admin::select()->count();

        $applications = Application::select()->count();


        return view("admins.index", compact('jobs', 'categories', 'admins', 'applications'));
    }

    public function admins()
    {
        $admins = Admin::all();
        return view("admins.all-admins", compact('admins',));
    }

    public function createAdmins()
    {
        return view("admins.create-admins",);
    }

    public function storeAdmins(Request $request)
    {
        Request()->validate([
            'name' => 'required|max:40',
            'email' => 'required|max:50',
            'password' => 'required|max:100',

        ]);

        $createAdmins = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($createAdmins) {
            return redirect('admin/all-admins/')->with('create', 'Cuenta creada exitosamente.');
        }
    }

    public function displayCategories()
    {

        $categories = Category::all();
        return view("admins.display-categories", compact('categories'),);
    }

    public function createCategories()
    {

        return view("admins.create-categories");
    }

    public function storeCategories(Request $request)
    {
        Request()->validate([
            'nombre' => 'required|max:40',


        ]);

        $createCategory = Category::create([
            'nombre' => $request->nombre,

        ]);

        if ($createCategory) {
            return redirect('admin/display-categories')->with('create', 'Categoria creada exitosamente.');
        }
    }

    public function editCategories($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $category = Category::find($id);

        return view("admins.edit-categories", compact('category'));
    }

    public function updateCategories(Request $request, $id)
    {
        Request()->validate([
            'nombre' => 'required|max:40',

        ]);

        $categoryUpdate = Category::find( $id);
        $categoryUpdate->update([
            "nombre" => $request->nombre

        ]);

        if ($categoryUpdate) {
            return redirect('/admin/display-categories')->with('update', 'Categoria actualizada correctamente.');

        }
    }

    public function deleteCategories($id)
    {
        $deleteCategory = Category::find($id);
        $deleteCategory->delete();

        if ($deleteCategory) {
            return redirect('/admin/display-categories')->with('delete', 'Categoria eliminada correctamente.');

        }
    }

    public function allJobs()
    {
        $jobs = Job::all();

        return view('admins.all-jobs', compact('jobs'));



    }

    public function createJobs()
    {
        $categories = Category::all();

        return view('admins.create-jobs', compact('categories'));
    }


    public function storeJobs(Request $request)
    {
        Request()->validate([
            'titulo_trabajo' => 'required|max:40',
            'region_trabajo' => 'required|max:50',
            'empresa' => 'required|max:50',
            'tipo_trabajo' => 'required|max:50',
            'vacante' => 'required|max:50',
            'experiencia' => 'required|max:200',
            'salario' => 'required|max:20',
            'genero' => 'required|max:20',
            'descripcion_trabajo' => 'required|max:1000',
            'responsabilidades' => 'required|max:1000',
            'educacion_experiencia' => 'required|max:100',
            'otrosbeneficios' => 'required|max:100',
            'categoria' => 'required|max:50',
            'imagen' => 'required|max:100',
        ]);

        $destinationPath = 'assets/images/';
        $myimage = $request -> imagen -> getClientOriginalName();
        $request -> imagen -> move(public_path($destinationPath), $myimage);

        $createJobs  = Job::create([
            'titulo_trabajo' => $request-> titulo_trabajo,
            'region_trabajo' => $request-> region_trabajo,
            'empresa' => $request-> empresa,
            'tipo_trabajo' => $request-> tipo_trabajo,
            'vacante' => $request-> vacante,
            'experiencia' => $request-> experiencia,
            'salario' => $request-> salario,
            'genero' => $request-> genero,
            'descripcion_trabajo' => $request-> descripcion_trabajo,
            'responsabilidades' => $request -> responsabilidades,
            'educacion_experiencia' => $request-> educacion_experiencia,
            'otrosbeneficios' => $request->otrosbeneficios,
            'categoria' => $request-> categoria,
            'imagen' => $myimage,

        ]);

        if ($createJobs) {
            return redirect('admin/display-jobs/')->with('create', 'Empleo creado exitosamente.');
        }
    }

    public function deleteJobs($id){
        $deleteJob = Job::find($id);
        if(File::exists(public_path('assets/images/' . $deleteJob -> imagen))){
            File::delete(public_path('assets/images/' . $deleteJob -> imagen));
        } else{
            //dd('El archivo no existe');
        }
        $deleteJob->delete();

        if ($deleteJob) {
            return redirect('/admin/display-jobs')->with('delete', 'Empleo eliminado correctamente.');

        }
    }


    public function displayApps(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $apps = Application::all();
        return view('admins.all-apps', compact( 'apps'));
    }

    public function deleteApplications($id)
    {
        $deleteApplications = Application::find($id);
        $deleteApplications->delete();

        if ($deleteApplications) {
            return redirect('/admin/display-apps/')->with('delete', 'Aplicacion de empleo eliminada correctamente.');

        }
    }
}




