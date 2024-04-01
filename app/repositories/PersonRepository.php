<?php

namespace App\Repositories;

use App\Models\Person;
use App\Models\Company;

class PersonRepository
{
    public function getCompany()
    {
        return Company::all();
    }
    public function getAll()
    {
        return Person::all();
    }

    public function getById($id)
    {
        return Person::findOrFail($id);
    }

    public function create($data)
    {
        try {
            return Person::create($data);
        } catch (\Exception $th) {
            throw new \Exception('Failed to create Person. Please check the information again.');
        }
    }

    public function update($id, $data)
    {
        try {
            $person = Person::findOrFail($id);
            return $person->update($data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete($id)
    {
        try {
            $person = Person::findOrFail($id);

            if ($person) {
                return $person->delete();
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
