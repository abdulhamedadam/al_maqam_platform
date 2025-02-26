<?php

namespace App\Services\Admin;

use App\Repositories\Admin\StudentRepository;

class StudentService
{
    protected $studentRepository;

    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function listStudents()
    {
        return $this->studentRepository->getAllStudents();
    }

    public function getStudent($id)
    {
        return $this->studentRepository->getById($id);
    }

    public function storeStudent(array $data)
    {
        return $this->studentRepository->create($data);
    }

    public function updateStudent($id, array $data)
    {
        return $this->studentRepository->update($id, $data);
    }

    public function deleteStudent($id)
    {
        return $this->studentRepository->delete($id);
    }
}
