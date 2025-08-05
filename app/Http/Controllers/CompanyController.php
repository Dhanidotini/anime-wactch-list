<?php

namespace App\Http\Controllers;

use App\Models\Animes\Company;
use App\Models\Animes\Genre;
use Illuminate\Http\Request;
use App\Models\Animes\Studio;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all()->sortBy('name');
        return view("pages.companies.index", compact(['companies']));
    }
    public function show(Company $company)
    {
        $genres = Genre::genre()->get();
        $company->allAnimes();
        return view('pages.companies.show', compact(['company', 'genres']));
    }
}
