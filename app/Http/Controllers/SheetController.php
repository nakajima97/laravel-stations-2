<?php

namespace App\Http\Controllers;

use App\Models\Sheet;
use Illuminate\Http\Request;

class SheetController extends Controller
{
    public function index()
    {
        $sheet_map = Sheet::all()->mapToGroups(function ($item, $key) {
            return [$item['row'] => $item['column']];
        });
        return view('sheets.index', ['sheet_map' => $sheet_map]);
    }
}
