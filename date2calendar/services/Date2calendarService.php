<?php

namespace Craft;

/**
 * Date2Calendar Service.
 *
 * All the logic goes here.
 *
 * @author    Stefan Friedrich <friedrich.stefan@gmail.com>
 * @link      http://github.com/stefanfriedrich
 */
class Date2calendarService extends BaseApplicationComponent
{

    /**
     * Download ICS-File.
     *
     * @return string
     */
    public function download($date)
    {


$fileContent = 'BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//hacksw/handcal//NONSGML v1.0//EN
CALSCALE:GREGORIAN
BEGIN:VEVENT
DTEND:'.($date->actionParams['dateend']).'
UID:'.uniqid().'
LOCATION:'.($date->actionParams['location']).'
DESCRIPTION:'.($date->actionParams['details']).'
URL;VALUE=URI:
SUMMARY:'.($date->actionParams['text']).'
DTSTART:'.($date->actionParams['datestart']).'
END:VEVENT
END:VCALENDAR';
            
            return $fileContent;

    }
}
