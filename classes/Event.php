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
    $events = Event::select('id', 'title', 'start', 'end', 'backgroundColor', 'borderColor', 'apartment_id')->get()->toArray();

    //Adding text color to events (white) and allDay option
    $i = 0;
    foreach($events as $event)
    {
      //sa switchom ovisno o id-u apartmana dodajem boju i tekst u title
      switch ($event['apartment_id']) {
        case 1:
          $events[$i]['title'] = $events[$i]['title'] . ' (Apartment 1)';
          $events[$i]['backgroundColor'] = '#007BFF';
          $events[$i]['borderColor'] = '#007BFF';
          break;

          case 2:
          $events[$i]['title'] = $events[$i]['title'] . ' (Apartment 2)';
          $events[$i]['backgroundColor'] = '#FF3333';
          $events[$i]['borderColor'] = '#FF3333';
          break;

        case 3:
          $events[$i]['title'] = $events[$i]['title'] . ' (Apartment 3)';
          $events[$i]['backgroundColor'] = '#330000';
          $events[$i]['borderColor'] = '#330000';
          break;

        case 4:
          $events[$i]['title'] = $events[$i]['title'] . ' (Apartment 4)';
          $events[$i]['backgroundColor'] = '#006633';
          $events[$i]['borderColor'] = '#006633';
          break;

        case 5:
          $events[$i]['title'] = $events[$i]['title'] . ' (Apartment 5)';
          $events[$i]['backgroundColor'] = '#9933FF';
          $events[$i]['borderColor'] = '#9933FF';
          break;

        case 6:
          $events[$i]['title'] = $events[$i]['title'] . ' (Apartment 6)';
          $events[$i]['backgroundColor'] = '#202020';
          $events[$i]['borderColor'] = '#202020';
          break;
      }

      $events[$i]['textColor'] = 'rgb(255, 255, 255)';
      $events[$i]['allDay'] = true;
      $events[$i]['description'] = 'neki random komentar';

      $i++;
    }
    return json_encode($events);
  }
}
