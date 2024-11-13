<?php

namespace App\Http\Controllers;

use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;

class StudentExportController extends Controller
{
    /**
     * Ekspor data student ke file Excel.
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function export()
    {
        return Excel::download(new StudentsExport, 'students.xlsx');
    }
}
