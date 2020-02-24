<?php


class eventController
{
    public function createEvent($req)
    {
        $event = Event::Create([
          'title' => $req['title'],
          'start' => $req['start'],
          'end' => null,
          'backgroundColor' => $req['backgroundColor'],
          'borderColor' => $req['borderColor'],
          'calendar_id' => 1,
          'apartment_id' => $req['apartmentId'],
          'allDay' => 'true',
          'textColor' => 'rgb(255, 255, 255)'
        ]);
        $data = [];
        $data['id'] = $event->id;
        $data['result'] = 'event created';
        return $data;
    }

    public function eventDelete($req)
    {
        Event::where('id', '=', $req['id'])->delete();

        return 'event deleted';
    }

    public function eventUpdate($req)
    {
        Event::where('id', '=', $req['id'])
          ->update
          ([
            'title' => $req['title'],
            'start' => $req['start'],
            'end' => $req['end'],
          ]);
        return 'event updated';
    }
}
