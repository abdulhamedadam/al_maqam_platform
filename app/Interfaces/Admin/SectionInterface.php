<?php

namespace App\Interfaces\Admin;

interface SectionInterface
{
    public function getAllSections();
    public function storeSection($data);
    public function findSectionById($id);
    public function updateSection($data, $id);
    public function deleteSection($id);
}
