<?php namespace App\Events;

use App\Podcast;
use App\Events\Event;
use Illuminate\Http\Request;

class ImageRequested extends Event {

    public $request;

    /**
     * Create a new event instance.
     *
     * @param  Podcast  $podcast
     * @return void
     */
    public function __construct(Request $request) {
      $this->request = $request;
    }

}