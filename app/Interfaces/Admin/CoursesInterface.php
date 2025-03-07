<?php


namespace App\Interfaces\Admin;


interface CoursesInterface
{
    public function all();
    public function all_active();
    public function find($id);
}
