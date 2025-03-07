<?php


namespace App\Repositories\Admin;


use App\Interfaces\Admin\CoursesInterface;
use App\Models\Course;

class CoursesRepository implements CoursesInterface
{
   public function all()
   {
       return Course::with(['courseMoneys'])->orderBy('id','desc')->get();
   }
   /***********************************************/
    public function all_active()
    {
        return Course::with(['courseMoneys'])->where('status','1')->orderBy('id','desc')->get();
    }
    /***********************************************/
    public function find($id)
    {
        return Course::with(['courseMoneys'])->where('status','1')->find($id);
    }
}
