<?php namespace App\Http\Controllers;

use Intervention\Image\ImageManager;

class HomeController extends Controller {

  public function index() {
    return view('home');
  }

}