<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Job\Application;
use App\Models\Job\JobSaved;
use File;


class UsersController extends Controller{
    public function profile(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $profile = User::find(Auth::user()->id);

        return view('users.profile', compact('profile'));

    }


    public function applications(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $applications = Application::where('user_id', Auth::user()->id)->get();

        return view('users.applications', compact('applications'));

    }


    public function jobsaved(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $jobsaved = jobsaved::where('user_id', '=', Auth::user()->id)->get();

        return view('users.jobsaved', compact('jobsaved'));

    }

    public function editDetails(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $userDetails = User::find(Auth::user()->id);

        return view('users.editdetails', compact('userDetails'));

    }


    public function updateDetails(Request $request)
    {

        Request() -> validate([
            'name' => 'required|max:40',
            'titulo_trabajo' => 'required|max:40',
            'bio' => 'required|max:400',
            'facebook' => 'required|max:100',
            'twitter' => 'required|max:100',
            'linkedin' => 'required|max:100',
        ]);

        $userUpdateDetails = User::find(Auth::user()->id);
        $userUpdateDetails->update([
            'name' => $request->name,
            'titulo_trabajo' => $request->titulo_trabajo,
            'bio' => $request->bio,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin
        ]);

        if ($userUpdateDetails) {
            return redirect('/users/edit-details')->with('update', 'Perfil actualizado correctamente.');

        }
    }

        public
        function editCv(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
        {

            return view('users.editcv');

        }


        public function updateCv(Request $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
        {
        $oldCv = User::find(Auth::user()->id);

        if(File::exists(public_path('assets/cvs/' . $oldCv -> cv))){
            File::delete(public_path('assets/cvs/' . $oldCv -> cv));
            } else{
            //dd('El archivo no existe');
        }
        //$oldCv -> delete();

        $destinationPath = 'assets/cvs/';
        $mycv = $request -> cv -> getClientOriginalName();
        $request -> cv -> move(public_path($destinationPath), $mycv);

        $oldCv -> update([
            "cv" => $mycv

        ]);

        return redirect('/users/profile') -> with('updatecv', 'CV actualizado correctamente');

        }


}
