<?php

namespace App\Repositories\Admin;

use App\Interfaces\Admin\StudentInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StudentRepository implements StudentInterface
{
    public function getAllStudents()
    {
        return User::where('role', 'student')->select('id', 'name', 'email', 'phone', 'birthday', 'gender', 'country', 'state')->get();
    }

    public function getById($id)
    {
        return User::findOrFail($id);
    }

    public function create(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        $data['role'] = 'student';
        return User::create($data);
    }

    public function update($id, array $data)
    {
        $student = User::findOrFail($id);

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $student->update($data);
        return $student;
    }

    public function delete($id)
    {
        return User::destroy($id);
    }
}
