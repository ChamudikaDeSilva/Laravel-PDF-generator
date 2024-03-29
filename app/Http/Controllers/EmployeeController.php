<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Employee;
use PDF;

class EmployeeController extends Controller {

    // Display user data in view
    public function showEmployees()
    {
        $employee = Employee::all();
        return view('index', compact('employee'));
    }

    // Generate PDF
 
public function createPDF()
{
    // retrieve all records from the Employee model
    $data = Employee::all();

    // share data to view using an associative array
    $viewData = [
        'employee' => $data,
    ];

    // load the view with data
    $pdf = PDF::loadView('pdf_view', $viewData);

    // sanitize and download PDF file with download method
    return $pdf->download('employee_details.pdf');
}


}
