<?php

namespace App\Repositories;

/**
* 
*/
class ApplicationRepository
{

	public function companies()
	{
		return \DB::table('qgroup_companies')->select('*')->get();
	}

	public function departments()
	{
		$departments =  \DB::table('qgroup_departments')
                            ->select('*')
                            ->where('company_id', '1')
                            ->get();

                        return $departments;
	}
	

        
}