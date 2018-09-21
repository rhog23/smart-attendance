<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Date
{
  public $timezone;
  public $format;

  function __construct()
  {
    $this->timezone = 'Asia/Jakarta';
    $this->format = 'D, j F Y';
    date_default_timezone_set($this->timezone);
  }

  function set_timezone($timezone)
  {
    $this->timezone = $timezone;
  }

  function set_format($format)
  {
    $this->format = $format;
  }

  function get_date()
  {
    return date($this->format);
  }
}