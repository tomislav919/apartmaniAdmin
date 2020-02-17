<?php
use Illuminate\Database\Eloquent\Model as Eloquent;
class Event extends Eloquent
{
  protected $fillable = ['title', 'comment', 'start', 'end', 'allDay', 'backgroundColor', 'borderColor', 'calendar_id', 'apartment_id'];

  public static function getForApartment ($apartmentId)
  {
    $events = Event::select('id', 'title', 'start', 'end', 'backgroundColor', 'borderColor')->where('apartment_id', '=', $apartmentId)->get()->toArray();

    //Adding text color to events (white) and allDay option
    $i = 0;
    foreach($events as $event)
    {
      $events[$i]['textColor'] = 'rgb(255, 255, 255)';
      $events[$i]['allDay'] = true;
      $events[$i]['description'] = 'neki random komentar';

      $i++;
    }
    return json_encode($events);
  }

  public static function getAll ()
  {
    $events = Event::select('id', 'title', 'start', 'end', 'backgroundColor', 'borderColor')->get()->toArray();

    //Adding text color to events (white) and allDay option
    $i = 0;
    foreach($events as $event)
    {
      $events[$i]['textColor'] = 'rgb(255, 255, 255)';
      $events[$i]['allDay'] = true;
      $events[$i]['description'] = 'neki random komentar';

      $i++;
    }
    return json_encode($events);
  }
}
