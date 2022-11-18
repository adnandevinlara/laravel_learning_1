<?php

use Illuminate\Database\Seeder;
use App\Project;
use App\User;
// use Illuminate\Database\Eloquent\Factories\Factory;
class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Project::class,10)->create();

        foreach (Project::all() as $key => $project) {
        	$users = User::inRandomOrder()->take(rand(1,3))->pluck('id');
            foreach ($users as $key => $user) {
                // $project->users()->attach($users,['is_manager'=>rand(0,1)]);
                $project->users()->attach($users,['is_manager'=>rand(0,1),'manager_id'=>User::inRandomOrder()->first()->id]);
            }
        	
        }
    }
}
