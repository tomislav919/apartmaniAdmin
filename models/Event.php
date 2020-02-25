<?php
use Illuminate\Database\Eloquent\Model as Eloquent;
class Event extends Eloquent
{
  protected $fillable = ['title', 'comment', 'start', 'end', 'allDay', 'backgroundColor', 'borderColor', 'calendar_id', 'apartment_id', 'textColor', 'description'];

  public static function getForApartment ($apartmentId)
  {
    $events = Event::select('id', 'title', 'start', 'end', 'allDay', 'textColor', 'backgroundColor', 'borderColor', 'description')->where('apartment_id', '=', $apartmentId)->get()->toArray();

    //Adding Id to extended props
    $i = 0;
    foreach($events as $event)
    {
      $events[$i]['idFromDB'] = $event['id'];
      $i++;
    }
    return json_encode($events);
  }


  public static function getAll ()
  {
    $events = Event::join('apartments', 'apartments.id', '=', 'events.apartment_id')
                    ->select(
                        'events.id',
                        'title',
                        'start',
                        'end',
                        'allDay',
                        'description',
                        'textColor',
                        'apartment_id',
                        'apartments.name',
                        'apartments.backgroundColor',
                        'apartments.borderColor')
                    ->get()->toArray();

    //Adding prolonged texts
    $i = 0;
    foreach($events as $event)
    {
          $events[$i]['title'] = $events[$i]['title'] . ' (' . $events[$i]['name'] .')';
      $i++;
    }
    return json_encode($events);
  }
}
