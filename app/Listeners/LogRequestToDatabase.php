<?php namespace App\Listeners;

use App\Events\ImageRequested;
use App\Models\Log;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogRequestToDatabase {

  /**
   * Create the event listener.
   *
   * @return void
   */
  public function __construct() {
  }

  /**
   * Handle the event.
   *
   * @param  PodcastWasPurchased  $event
   * @return void
   */
  public function handle(ImageRequested $event) {
    Log::create(
      [
        'uri' => $event->request->path(),
        'referer' => $event->request->server('HTTP_REFERER'),
        'url' => $event->request->fullUrl(),
      ]
    );
  }

}