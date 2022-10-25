<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
   	protected $fillable = ['name'];

   	public function users(){
   		return $this->belongsToMany(User::class)
         ->withTimestamps()
         ->withPivot(['is_manager'])
         ->as('project_user');
   		/*
			if pivot table name is differet than set the relation like so,
			return $this->belongsToMany(User::class,'projects_users','projects_id','users_id');
			Note: By default systtem automatically read/look for project_user (Not user_project).
			foriegn id's naming convension will be like so project_id and user_id.

         change the name of pivot
         ->as('project_user');
   		*/
   	}

      public function managers(){
         return $this->belongsToMany(User::class)
         ->withTimestamps()
         ->withPivot(['is_manager'])
         ->wherePivot('is_manager',1)
         ->as('project_manager');

         /*
         if we have another field priority mean periority of manager/project
         then get data with priority wise like so

         wherePivotIn('priority',[1,2])
         */
         
      }


      public function myusers(){
         return $this->belongsToMany(User::class)
         ->withTimestamps()
         ->withPivot(['manager_id'])
         ->using(ProjectUser::class);
      }
}
