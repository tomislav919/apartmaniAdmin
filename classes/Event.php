<?php
use Illuminate\Database\Eloquent\Model as Eloquent;
class Event extends Eloquent
{
  protected $fillable = ['name', 'comment', 'startDate', 'endDate'];
}
