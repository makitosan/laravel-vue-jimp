<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    //
  protected function save()
  {
    $img = request()->input('img');
    $img = str_replace('data:image/png;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    $fileData = base64_decode($img);
    Storage::disk('local')->put('/images/test.png', $fileData, 'public');
  }
}
