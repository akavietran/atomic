<?php

namespace App\Repositories;

use App\Models\Country;

class CountryRepository
{
    public function getAll()
    {
        return Country::all();
    }

    public function getById($id)
    {
        return Country::findOrFail($id);
    }

    public function create($data)
    {
        try {
            $data['updated_at'] = null;
            if (!isset($data['description']) || empty($data['description'])) {
                $data['description'] = null;
            }

            return Country::create($data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update($id, $data)
    {
        try {
            $country = Country::findOrFail($id);
            return $country->update($data);
           
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete($id)
    {
        try {
            $country = Country::findOrFail($id);

            if ($country) {
                return $country->delete();
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
