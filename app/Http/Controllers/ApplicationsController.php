<?php
namespace App\Http\Controllers;

use App\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Notifications\ApplicationRecieved;
use App\Http\Requests\storeApplicationRequest;

class ApplicationsController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('guest');
    }*/
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
        $applicants = Application::latest()->paginate(10);
    }
    public function store(storeApplicationRequest $request)
    {
        Log::info('application request', ['request' => request()->all() ]);
        
        $saveApplication = $this->saveApplication($request);

         return response()->json([
                        'data' => $saveApplication,
                        'message' => "You have successfully submitted your application",
                        'status' => 'success',
                        'result_code' => 100
            ]);
        
    }
}


