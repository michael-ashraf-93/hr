<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $job = new \App\Job();
        $job->title = 'Developer';
        $job->min_salary = '1000';
        $job->max_salary = '2000';
        $job->save();

        $region= new \App\Region();
        $region->name = 'Africa';
        $region->save();

        $country = new \App\Country();
        $country->name = 'Egypt';
        $country->region_id = $region->id;
        $country->save();

        $location = new \App\Location();
        $location->street_address = 'Shoubra street';
        $location->postal_code = '12345';
        $location->city = 'Cairo';
        $location->country_id = $country->id;
        $location->save();

        $department = new \App\Department();
        $department->name = 'Web Development';
        $department->location_id = $location->id;
        $department->manager_id = null ;
        $department->save();

        $user = new \App\User();
        $user-> fname = 'Michael';
        $user-> lname = 'Ashraf';
        $user-> phone = '01221166412';
        $user-> hire_date = date('Y-m-d');
        $user-> salary = '1500';
        $user-> commission_pct = '1.5';
        $user-> manager_id = null;
        $user-> department_id = $department->id;
        $user-> job_id = $job->id;
        $user-> email = 'michael@admin.com';
        $user-> password = bcrypt('123456');
        $user->save();

    }
}
