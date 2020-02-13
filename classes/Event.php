<?php
use Illuminate\Database\Eloquent\Model as Eloquent;
class Event extends Eloquent
{
  protected $fillable = ['title', 'comment', 'start', 'end', 'allDay', 'backgroundColor', 'borderColor', 'calendar_id', 'apartment_id'];

  public static function getForApartment ($apartmentId)
  {
    $events = Event::select('title', 'start', 'end', 'backgroundColor', 'borderColor')->get()->toArray();

    //Adding text color to events (white) and allDay option
    $i = 0;
    foreach($events as $event)
    {
      $events[$i]['textColor'] = 'rgb(255, 255, 255)';
      $events[$i]['allDay'] = true;
      $i++;
    }
    return json_encode($events);
  }
}
