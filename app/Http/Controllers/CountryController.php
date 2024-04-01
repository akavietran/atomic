<?php

namespace App\Http\Controllers;

use App\Services\CountryService;
use App\Http\Requests\CountryRequest;



class CountryController extends Controller
{
    protected $countryService;

    public function __construct(CountryService $countryService)
    {
        $this->countryService = $countryService;
    }

    public function showCountry()
    {
        $countries = $this->countryService->getAll();
        return view('index', compact('countries'));
    }

    public function createCountry()
    {
        return view('FormCreate');
    }

    public function storeCountry(CountryRequest $request)
    {
        $this->countryService->create($request->validated());
        return redirect()->route('index');
    }

    public function editCountry($id)
    {
        $country = $this->countryService->getById($id);
        return view('FormEdit', compact('country'));
    }

    public function updateCountry(CountryRequest $request, $id)
    {
        $this->countryService->update($id, $request->validated());
        return redirect()->route('index');
    }

    public function destroyCountry($id)
    {
        $this->countryService->delete($id);
        return redirect()->route('index');
    }
}

    
