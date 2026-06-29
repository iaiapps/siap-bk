<?php

namespace App\Http\Controllers;

use App\Exports\StudentExport;
use App\Imports\StudentImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportExportController extends Controller
{
    public function index()
    {
        return view('admin.import-export.index');
    }

    public function export()
    {
        return Excel::download(new StudentExport, 'siswa.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new StudentImport, $request->file('file'));

        return redirect()->route('import-export.index')
            ->with('success', 'Data siswa berhasil diimport.');
    }
}
