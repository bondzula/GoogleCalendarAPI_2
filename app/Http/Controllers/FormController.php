<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use GuzzleHttp\Client;
use App\Http\Requests\CalendarFormRequests;

class FormController extends Controller
{

    protected $client;

    function __construct(){

        $client = new Google_Client();
        $client->setAuthConfig('client_secret.json');
        $client->addScope(Google_Service_Calendar::CALENDAR);

        $this->client = $client;
    }

    public function store(CalendarFormRequests $requests){

        $cal = $requests->input();
        $dateTime = "{$cal['date']}T{$cal['time']}:00";
        $service = new Google_Service_Calendar($this->client);
        $calendarId = 'primary';

        $event = new Google_Service_Calendar_Event(array(
            'summary' => 'TMS test',
            "attendees" => array(
                array(
                    "email" => $cal['email'],
                    "displayName" => $cal['name'],
                    "responseStatus" => "accepted",
                    "comment" => $cal['notes']
                )
            ),
            'start' => array(
                'dateTime' => $dateTime,
                'timeZone' => 'Europe/Belgrade',
            ),
            'end' => array(
                'dateTime' => $dateTime,
                'timeZone' => 'Europe/Belgrade',
            ),
            "reminders" => array(
                "useDefault" => false,
                "overrides" => array(
                    array("method" => "email", "minutes" => 30)
                ))));

        $result = $service->events->insert($calendarId, $event);
        if (!$result) {
            return view('fail');
        }
        return redirect('/success');
    }

    public function index(){
        return view('form');
    }
}
