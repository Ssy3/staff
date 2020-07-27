<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Auth;
//use App\Group;

class AttendanceScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
     public function apply(Builder $builder, Model $model)
     {
       if (Auth::hasUser()) {
         if (Auth::user()->hasRole('admin')) { // for admin role, show all the attendance records
           $builder->leftjoin('users', 'attendance_sheet.user_id', '=', 'users.id')
                  ->leftjoin('group_to_user', 'group_to_user.user_id', '=', 'users.id')
                  ->select('users.name as name','users.email as email','attendance_sheet.action as action','attendance_sheet.created_at as created_at');
         }
         elseif (Auth::user()->hasPermissionTo('view attendance sheet')) { // show the attendance of all group members (admin dose not have groups)
           $userGroups = Auth::user()->group;
             foreach ($userGroups as $userGroup) {
               $userGroupIDs[] =  $userGroup->id;
             };
           $builder->join('users', 'attendance_sheet.user_id', '=', 'users.id')
                  ->join('group_to_user', 'group_to_user.user_id', '=', 'users.id')
                  ->whereIn('group_to_user.group_id', $userGroupIDs)
                  ->select('users.name as name','users.email as email','attendance_sheet.action as action','attendance_sheet.created_at as created_at');
         } else { // for users without view attendance sheet permission, show their attendance only
           $userId = Auth::user()->id;
           $builder->where('user_id', '=', $userId);
         }
       }

     }
}
