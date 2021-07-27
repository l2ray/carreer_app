<?php

namespace App\Http\Controllers;

use DB;
use App\Repositories\ApplicationRepository;
use App\Notifications\ApplicationRecieved;
use App\Application;
use App\Quotation;
use App\Http\Requests\storeApplicationRequest;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class HomeController extends Controller
{
     public $applicationRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('auth');

        $this->applicationRepository = new ApplicationRepository;

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin(Request $request)
    {
        // $applicants = Application::latest()->with(['company', 'department'])->paginate(15);
        $applicants = $this->filter($request);

        $companies = $this->applicationRepository->companies();

        $departments = $this->applicationRepository->departments();

        $applicants = $applicants->latest()->with(['company', 'department'])->paginate(15);

        return view('admin', ['companies' => $companies, 'departments' => $departments, 'applicants' => $applicants]);
      
    }
    public function index()
    {
        $applicants = Application::latest()->with(['company', 'department'])->paginate(10);

        // return $applicants;
      
        return view('home', ['applicants'=> $applicants]);
    }
    public function filter(Request $request)
    {
        $applicants = Application::query();

        if ($request->filled('first_name')) {
            $applicants->where('first_name', $request->input('first_name'));
            
        } 
        if ($request->filled('middle_name')) {

            $applicants->where('middle_name', $request->input('middle_name'));
            
        }
        if ($request->filled('last_name')) {

            $applicants->where('last_name', $request->input('last_name'));
            
        }
        if ($request->filled('mobile_number')) {

            $applicants->where('mobile_number', $request->input('mobile_number'));
           
        }
        if ($request->filled('highest_qualification')) {
            $applicants->where('highest_qualification', $request->input('highest_qualification'));
            
        }
        if ($request->filled('company')) {
            $applicants->where('company_of_interest', $request->input('company'));
        }
        if ($request->filled('area_of_interest')) {
            $applicants->where('area_of_interest', $request->input('area_of_interest'));
        }

        if ($request->filled('status')) {
            $applicants->where('status', $request->input('status'));
        }

        return $applicants;
        // return $applicants->paginate();

            $filteredResult = $applicants->paginate(10);
            return view('home', ['applicants'=> $filteredResult]);
    }
    public function applicantDoc($id)
    {
         $applicant = Application::find($id);        
        return \Response::download( base_path("storage/app/$applicant->cv_resume"));
    }

    public function applicantSupportDoc1($id)
    {
         $applicant = Application::find($id);        
        return \Response::download( base_path("storage/app/$applicant->support_docs1"));
    }
    public function applicantSupportDoc2($id)
    {
         $applicant = Application::find($id);        
        return \Response::download( base_path("storage/app/$applicant->support_docs2"));
    }
    public function applicantSupportDoc3($id)
    {
         $applicant = Application::find($id);        
        return \Response::download( base_path("storage/app/$applicant->support_docs3"));
    }
    
    public function show($id)
    {
            $applicant = Application::find($id)->load(['company', 'department']);
            
            return view('applications.show',compact('applicant'));
    }
    public function update($id)
    {  
        // return request()->all();
        $applicant = Application::find($id);
        $applicant->best_match = request()->best_match;
        $applicant->status = request()->status;
        $applicant->hr_comments = request()->hr_comments;
        $applicant->save();
        // $applicant->notify(new ApplicationRecieved());
        return redirect('/applicants')->with('message' , 'Updated!');
    }
    public function create()
    {
        $companies = \DB::table('qgroup_companies')->select('*')->get();

        $departments =  \DB::table('qgroup_departments')
                            ->select('*')
                            ->where('company_id', '1')
                            ->get();

        return view('applications.create', compact(['companies', 'departments']));
        // return view('/createapplicant.newapplicant', compact(['companies', 'departments']));
    }
    public function store(storeApplicationRequest $request)
    { 

        $saveApplication = $this->saveApplication($request);

         return redirect('/applicants')->with('message' , 'New Applicant saved successfully');
     
       
    }

}

