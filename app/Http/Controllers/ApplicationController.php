<?php

namespace App\Http\Controllers;

use App\Classes\WebSocketServer\ConfigAppProvider;
use App\Models\Application;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $applications = Application::with("user")
            ->when(Auth::user()->isAdmin(), function ($q) {
                return $q->whereUserId(Auth::user()->id);
            })
            ->get();

        return view("applications.all", compact("applications"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $application = new Application();
        return view("applications.create", compact("application"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {


        $application = $request->isMethod("post")
            ? new Application
            : Application::find($request->application_id);

        $this->validate($request, [
            "name" => "required|unique:applications,id," . $application->id,
//            "key" => "required|unique:applications,id," . $application->id,
//            "secret" => "required|unique:applications,id," . $application->id,
//            "comment" => "required",
        ]);


        $application = $request->isMethod("post")
            ? new Application
            : Application::find($request->application_id);

        $application->name = $request->name;
        $application->key = random_int(1000000,9999999);
        $application->secret = Str::random(10);
        $application->comment = $request->comment;
        $application->user_id = Auth::user()->id;

        $application->save();

        ConfigAppProvider::flushCache();
        \Illuminate\Support\Facades\Artisan::call("websockets:restart");

        $message = $request->isMethod("post")
            ? "New Application Created!"
            : "Application Edited!";

        if ($request->isMethod("post"))
            return redirect()->to(route("applications.index"))->with(["success" => $message]);

        return redirect()->back()->with(["success" => $message]);

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Application $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Application $application
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        return view("applications.edit", compact("application"));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Application $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        //
    }
}
