<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CompanyFormRequest;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $company = Company::all();
        $company = DB::table('companies')->get();
        return view('dashboard.company.index', compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('dashboard.company.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyFormRequest $request)
    {
        $data = $request->validated();
        $company = new Company;
        $company->name = $data['name'];
        $company->email = $data['email'];
        $company->branch = $data['branch'];
        $company->department = $data['department'];
        $company->website = $data['website'];

        if ($request->hasfile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/company/', $filename);
            $company->logo = $filename;
        }

        $company->save();
        return redirect('companies');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($company_id)
    {
        $company = Company::find($company_id);
        return view('dashboard.company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyFormRequest $request, $company_id)
    {
        $data = $request->validated();
        $company = Company::find($company_id);
        $company->name = $data['name'];
        $company->email = $data['email'];
        $company->branch = $data['branch'];
        $company->department = $data['department'];
        $company->website = $data['website'];


        if ($request->hasfile('logo')) {
            $destination = 'uploads/company' . $company->logo;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/company/', $filename);
            $company->image = $filename;
        }
        $company->update();
        return redirect('companies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($company_id)
    {
        $company = Company::find($company_id);
        if ($company) {
            $destination = 'uploads/company' . $company->logo;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            // $company->employees()->delete();
            $company->delete();
            return redirect('companies');
        } else {
            return redirect('companies')->with('message', 'No category id found');
        }
    }
}
