<?php

namespace App\Http\Controllers;
use App\Models\Drug;
use App\Http\Requests\AddDrug;
use Illuminate\Support\Facades\Mail;
use App\Mail\AddNewMailTemplate;

use Illuminate\Http\Request;

class DrugController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drug = new Drug();
        $all_drugs = $drug->allDrugs();
        return view('Drug.drug', [
            'all_drugs' => $all_drugs,
            'total_drugs' => $this->getTotalDrugs(),
            'total_categories' => $this->getTotalCategories(),
            'total_out_of_stock' => $this->getTotalOutOfStock(),
            'total_low_stock' => $this->getTotalLowStock(),
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Capture the previous URL
        $previousUrl = url()->previous();

        //Define allowed paths
        $allowedPaths = ['http://127.0.0.1:8000/dashboard', 'http://127.0.0.1:8000/drugs'];

        //Check if the previous URL is in allowed paths
        if (in_array($previousUrl, $allowedPaths)) {
            //Store the previous URL in session
            session(['savedUrl' => $previousUrl]);
        }

        //Retrieve the saved URL from the session (default to dashboard if not set)
        $savedUrl = session('savedUrl', 'http://127.0.0.1:8000/dashboard');

        //Pass the saved URL to the form view
        return view('Drug.add_drug',[
            'previousUrl' => $savedUrl,
           ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddDrug $request)
    {
        $drug = new Drug();
        $previousUrl = $request->input('previous_url');
        if($drug->checkDuplicateDrug($request)){
            return redirect($previousUrl)->with('error', 'Drug already exists');
        }else{
            $drug->addNewDrug($request);

            $email = 'ayenadikyaw.tgi@gmail.com';
            Mail::to($email)->send(new AddNewMailTemplate($request, 'drugs'));

            return redirect($previousUrl)->with('success', 'Drug added successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //Capture the previous URL
        $previousUrl = url()->previous();

        //Define allowed paths
        $allowedPaths = ['http://127.0.0.1:8000/dashboard', 'http://127.0.0.1:8000/drugs'];

        //Check if the previous URL is in allowed paths
        if (in_array($previousUrl, $allowedPaths)) {
            //Store the previous URL in session
            session(['savedUrl' => $previousUrl]);
        }

        //Retrieve the saved URL from the session (default to dashboard if not set)
        $savedUrl = session('savedUrl', 'http://127.0.0.1:8000/dashboard');

        //Pass the saved URL to the form view
        $drug = new Drug();
        $drug = $drug->getDrugById($id);
        return view('Drug.edit_drug', [
            'drug' => $drug,
            'previousUrl' => $savedUrl,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddDrug $request, string $id)
    {
        $drug = new Drug();
        $drug->updatedrug($request, $id);
        $previousUrl = $request->input('previous_url');
        $redirectUrl = parse_url($previousUrl, PHP_URL_PATH);
        return redirect($redirectUrl)->with('success', 'Drug updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $drug = new Drug();
        $drug->deleteDrug($id);
        return redirect(url()->previous())->with('success', 'Drug deleted successfully');
    }

    public function getTotalDrugs()
    {
        $drug = new Drug();
        return $drug->getTotalDrugs();
    }

    public function getTotalCategories()
    {
        $drug = new Drug();
        return $drug->getTotalCategories();
    }

    public function getTotalOutOfStock()
    {
        $drug = new Drug();
        return $drug->getTotalOutOfStock();
    }

    public function getTotalLowStock()
    {
        $drug = new Drug();
        return $drug->getTotalLowStock();
    }
}
