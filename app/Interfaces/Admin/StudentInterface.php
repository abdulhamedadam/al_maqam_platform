<?php

namespace App\Interfaces\Admin;

interface StudentInterface
{
    public function getAllStudents();
    public function getById($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}
