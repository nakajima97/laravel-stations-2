<?php

namespace App\Http\Controllers;

class PracticeController extends Controller
{
  public function sample()
  {
    return view('practice');
  }

  public function sample2()
  {
    $test = 'practice2';
    return view('practice2', ['testParam' => $test]);
  }
}