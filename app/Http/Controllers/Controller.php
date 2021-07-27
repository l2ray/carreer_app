<?php

namespace App\Http\Controllers;

use App\Application;
use Illuminate\Http\Request;
use App\Notifications\ApplicationRecieved;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    protected function saveApplication(Request $request)
    {

	$fileExt = $request->file('cv_resume')->getClientOriginalExtension();
       
	$applicant = new Application;
	$applicant->first_name = $request->first_name;
	$applicant->middle_name = $request->middle_name;
	$applicant->last_name = $request->last_name;
	$applicant->email = $request->email;
	$applicant->date_of_birth = $request->date_of_birth;
	$applicant->mobile_number = $request->mobile_number;
	$applicant->secondary_mobile = $request->secondary_mobile;
	$applicant->address = $request->address;
	$applicant->company_of_interest = $request->company_of_interest;
	$applicant->highest_qualification = $request->highest_qualification;
	$applicant->field_of_work = $request->field_of_work;
	$applicant->area_of_interest = $request->area_of_interest;
	$applicant->additional_comments = $request->additional_comments;
	$applicant->communication_medium = $request->communication_medium;
	$applicant->support_docs1 = '';
	$applicant->support_docs2 = '';
	$applicant->support_docs3 = '';
	$fileExt = $request->file('cv_resume')->getClientOriginalExtension();
	$fileName = $applicant->first_name.$applicant->last_name. '_'. date('Ymdhis'). '.'. $fileExt;

	$path = $request->file('cv_resume')->storeAs('applicants',$fileName);


	     if ($request->hasFile('support_docs1')) {
	        //
	        $fileExtension1 = $request->file('support_docs1')->getClientOriginalExtension();
	        $fileName1 = $applicant->full_name. '_doc_'. date('his'). '.'. $fileExt;
	        $path1 = $request->file('support_docs1')->store($fileName1);
	        $applicant->support_docs1 = $path1;

	        

	     } 

	    if ($request->hasFile('support_docs2')) {
	        
		 $fileExtension2 = $request->file('support_docs2')->getClientOriginalExtension();
		 $fileName2 = $applicant->full_name. '_doc_'. date('his'). '.'. $fileExt;
		 $path2 = $request->file('support_docs2')->store($fileName2);
		 $applicant->support_docs2 = $path2;
	        

	    }
	    if ($request->hasFile('support_docs3')) {
	        
		$fileExtension3 = $request->file('support_docs3')->getClientOriginalExtension();
		$fileName3 = $applicant->full_name. '_doc_'. date('his'). '.'. $fileExt;
		$path3 = $request->file('support_docs3')->store($fileName3);  
		$applicant->support_docs3 = $path3;             

	    }

	        $applicant->cv_resume = $path;

	       // for admin
	       $applicant->best_match = $request->best_match;
        	       $applicant->status = $request->status;
                   $applicant->hr_comments = $request->hr_comments;
                   
	        $saveApplication = $applicant->save();

	        $applicant->notify(new ApplicationRecieved());

	        return $saveApplication;
    
    }
}
