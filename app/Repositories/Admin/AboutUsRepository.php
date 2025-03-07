<?php


namespace App\Repositories\Admin;


use App\Interfaces\Admin\AboutUsInterface;
use App\Models\AboutUS;

class AboutUsRepository implements AboutUsInterface
{

    public function all()
    {
      return AboutUS::all();
    }
    /******************************************/
    public function find($id)
    {
       return AboutUS::find($id);
    }
    /********************************************/
    public function create($data)
    {
        return AboutUS::create($data);
    }
    /*********************************************/
    public function update($data,$id)
    {
        $about_us=$this->find($id);
        return $about_us->update($data);
    }
    /***********************************************/
    public function delete($id)
    {
        $about_us=$this->find($id);
        return $about_us->delete();
    }
    /***********************************************/
    public function get_first_active()
    {
       return AboutUS::where('status','1')->first();
    }
}
