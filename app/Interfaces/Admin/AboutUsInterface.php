<?php


namespace App\Interfaces\Admin;


interface AboutUsInterface
{
    public function all();
    public function get_first_active();
    public function find($id);
    public function create($data);
    public function update($data,$id);
    public function delete($id);

}
