<?php
namespace App\Repository;

use App\Models\Personnel;
use Illuminate\Support\Facades\DB;
use App\Interface\PersonnelsRepositoryInterface;


class PersonnelsRepository implements PersonnelsRepositoryInterface

{
    public function getAllPersonnels()
    {
        return Personnel::all();
    }
}