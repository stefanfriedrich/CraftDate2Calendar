<?php

namespace Craft;

/**
 * Date2Calendar Controller.
 *
 * Route to download is here.
 *
 * @author    Stefan Friedrich <friedrich.stefan@gmail.com>
 * @link      http://github.com/stefanfriedrich
 */
class Date2calendarController extends BaseController
{
    /**
     * Allow anonymous access to controller.
     *
     * @var bool
     */
    protected $allowAnonymous = true;

    /**
     * Download ICS
     */
    public function actionDownload()
    {

        $filename = 'ICS_' . str_replace(' ', '_', preg_replace ( '/[^a-z0-9 ]/i', '', $this->actionParams['text'] ) ). '.ics';
        header('Content-type: text/calendar; charset=utf-8');
        header('Content-Disposition: attachment; filename=' . $filename);
      
$fileContent = 'BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//hacksw/handcal//NONSGML v1.0//EN
CALSCALE:GREGORIAN
BEGIN:VEVENT
DTEND:'.($this->actionParams['dateend']).'
UID:'.uniqid().'
LOCATION:'.($this->actionParams['location']).'
DESCRIPTION:'.($this->actionParams['details']).'
URL;VALUE=URI:
SUMMARY:'.($this->actionParams['text']).'
DTSTART:'.($this->actionParams['datestart']).'
END:VEVENT
END:VCALENDAR';

        echo $fileContent;
        exit;

    }

}
