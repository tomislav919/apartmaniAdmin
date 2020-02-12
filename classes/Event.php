<?php
use Illuminate\Database\Eloquent\Model as Eloquent;
class Event extends Eloquent
{
  protected $fillable = ['name', 'comment', 'startDate', 'endDate'];

  public static function getForApartment ($apartmentId)
  {
    $events = Event::select('title', 'start', 'end', 'backgroundColor', 'borderColor')->get()->toArray();

    return json_encode($events);
  }
}
