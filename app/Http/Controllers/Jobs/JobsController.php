<?php

namespace App\Http\Controllers\Jobs;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Job\Search;
use Illuminate\Http\Request;
use App\Models\Job\Job;
use App\Models\Job\JobSaved;
use App\Models\Job\Application;
use Auth;
use DB;


class JobsController extends Controller
{
    public function single($id)
    {
        $job = Job::find($id);


        $relatedJobs = Job::where('categoria', $job->categoria)->where('id', '!=', $id)->take(5)->get();

        $relatedJobsCount = Job::where('categoria', $job->categoria)->where('id', '!=', $id)->take(3)->count();

        //Categories
        $categories = DB::table('categories')
            ->join('jobs', 'jobs.categoria', '=', 'categories.nombre')
            ->select('categories.nombre AS nombre', 'categories.id AS id', DB::raw('COUNT(jobs.categoria) AS total'))
            ->groupBy('jobs.categoria')
            ->get();


        //Guardar trabajo
        if (auth()->user()) {
            $savedJob = JobSaved::where('job_id', $id)->where('user_id', Auth::user()->id)->count();

            //Comprobar si ha solicitado trabajo
            $appliedJob = Application::where('user_id', Auth::user()->id)->where('job_id', $id)->count();


            return view('jobs.single', compact('job', 'relatedJobs', 'relatedJobsCount', 'savedJob', 'appliedJob', 'categories'));
        } else {

            return view('jobs.single', compact('job', 'relatedJobs', 'relatedJobsCount', 'categories'));
        }


    }


    public function saveJob(Request $request)
    {
        $saveJob = JobSaved::create([
            'job_id' => $request->job_id,
            'user_id' => $request->user_id,
            'imagen' => $request->imagen,
            'titulo_trabajo' => $request->titulo_trabajo,
            'region_trabajo' => $request->region_trabajo,
            'tipo_trabajo' => $request->tipo_trabajo,
            'empresa' => $request->empresa
        ]);

        if ($saveJob) {
            return redirect('/jobs/single/'.$request->job_id.'')->with('save', 'Empleo guardado exitosamente.');

        }
    }



    public function applyJob(Request $request)
    {
        if (Auth::user()->cv == 'No cv') {
            return redirect('/jobs/single/'.$request->job_id)->with('apply', 'Actualiza el cv.');

        }else{
            $applyJob = Application::create([
                'cv' => Auth::user()-> cv,
                'email' => Auth::user()-> email,
                'job_id' => $request->job_id,
                'user_id' => Auth::user()->id,
                'imagen' => $request->imagen,
                'titulo_trabajo' => $request->titulo_trabajo,
                'region_trabajo' => $request->region_trabajo,
                'tipo_trabajo' => $request->tipo_trabajo,
                'empresa' => $request->empresa
            ]);

            if ($applyJob) {
                return redirect('/jobs/single/'.$request->job_id)->with('applied', 'Cv enviado exitosamente.');

            }
        }
    }

    public function search(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        Request() -> validate([
            'titulo_trabajo' => 'required',
            'region_trabajo' => 'required',
            'tipo_trabajo' => 'required',
        ]);


        Search::create([
           "keyword" => $request -> titulo_trabajo,
        ]);


        $titulo_trabajo = $request->get('titulo_trabajo');
        $region_trabajo = $request->get('region_trabajo');
        $tipo_trabajo = $request->get('tipo_trabajo');

        $searches = Job::select()->where('titulo_trabajo', 'like', "%$titulo_trabajo%")
            ->where('region_trabajo', 'like', "%$region_trabajo%")
            ->where('tipo_trabajo', 'like', "%$tipo_trabajo%")
            ->get();

        return view('jobs.search', compact('searches'));
    }

    public function about()
    {

        return view('pages.about');
    }

    public function contact(){

        return view('pages.contact');
    }

}

