<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        $companies = $request->user()->companies;

        return response()->json($companies);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'cfe_number' => 'required|string|max:255',
            'address' => 'required|string',
        ]);

        $company = $request->user()->companies()->create([
            'name' => $request->name,
            'cfe_number' => $request->cfe_number,
            'address' => $request->address,
        ]);

        return response()->json($company, 201);
    }

    public function update(Request $request, $id)
    {
        $company = $request->user()->companies()->findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'cfe_number' => 'required|string|max:255',
            'address' => 'required|string',
        ]);

        $company->update([
            'name' => $request->name,
            'cfe_number' => $request->cfe_number,
            'address' => $request->address,
        ]);

        return response()->json($company);
    }

    public function destroy(Request $request, $id)
    {
        $company = $request->user()->companies()->findOrFail($id);
        $company->delete();

        return response()->json(['message' => 'Entreprise supprimée avec succès']);
    }
}

