<?php namespace App\Http\Controllers;

use Intervention\Image\ImageManager;
use App\Events\ImageRequested;
use Illuminate\Http\Request;

class PlaceholdersController extends Controller {

  protected $image_manager;

  protected $format;

  public function __construct() {
    $this->image_manager = new ImageManager();
    $this->format = 'png';
  }

  /**
   * Show the profile for the given user.
   *
   * @param  int  $id
   * @return Response
   */
  public function widthHeight(Request $request, $width, $height) {
    $image = $this->image_manager->canvas($width, $height, '#ffffff');

    $image->text($width .'x'. $height, $width / 2, $height / 2, function($font) {
      $font->file(base_path() . '/resources/fonts/OpenSans-Regular.ttf');
      $font->size(24);
      $font->color('#000000');
      $font->align('center');
      $font->valign('center');
      $font->angle(0);
    });

    event(new ImageRequested($request));

		$response = response()->make($image->encode($this->format), 200);
		$response->header('Content-Type', 'image/'. $this->format);

    return $response;
  }

}