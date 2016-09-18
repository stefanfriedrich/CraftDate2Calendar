<?php

namespace Craft;

/**
 * Date2Calendar Twig_Extension & Filter.
 *
 * @author    Stefan Friedrich <friedrich.stefan@gmail.com>
 * @link      http://github.com/stefanfriedrich
 */

use Twig_Extension;
use Twig_Filter_Method;

class Date2calendarTwigExtension extends Twig_Extension {

	public function getName() {
		return 'Date2calendar';
	}

	public function getFilters() {
		return [
			'date2calendar' => new Twig_Filter_Method( $this, 'date2calendar' ),
		];
	}

    public function dateToCal($timestamp) {
     	return date('Ymd\THis\Z', $timestamp);
    }

    public function escapeString($string) {
      return preg_replace('/([\,;])/','\\\$1', $string);
    }
	
	public function date2calendar( $arrEvent, $calType = 'GC', $extratime = 0 ) {

		// timestamp or not?
		// this will break in 05/18/2033 @ 3:33am (UTC) ;)
		if (substr($arrEvent["start"], 0, 2) == 20) {

			$criteria = craft()->elements->getCriteria(ElementType::Entry);
			$criteria->id = $arrEvent["id"];
			$entries = $criteria->find();

			foreach ($entries as $entry)
			{

				$strStart  			= $entry->start->getTimestamp() + $extratime;
				$strEnd  			= $entry->end->getTimestamp() + $extratime;
				$eventTitle    		= $this->escapeString($entry->title);
				$eventDescription 	= $this->escapeString($entry->description);
				$eventLocation 		= $this->escapeString($entry->location);

			}

		} else {

			$strStart  			= $arrEvent["start"] + $extratime;
			$strEnd  			= $arrEvent["end"] + $extratime;
			$eventTitle    		= $this->escapeString($arrEvent["title"]);
			$eventDescription 	= $this->escapeString($arrEvent["description"]);
			$eventLocation 		= $this->escapeString($arrEvent["location"]);

		}


		// link to download ics-file
		if (strtoupper($calType) == 'ICS') {

			$url = craft()->getSiteUrl() . "actions/date2calendar/download?"
			 . "datestart=".$this->dateToCal($strStart)."&"
			 . "dateend=".$this->dateToCal($strEnd)."&"
			 . "text=".$eventTitle."&"
			 . "location=".$eventLocation."&"
			 . "details=".$eventDescription;

		} 

		// link to google calendar
		else {

			$url = "http://www.google.com/calendar/event?action=TEMPLATE&"
				 . "dates=".$this->dateToCal($strStart)."/".$this->dateToCal($strEnd)."&"
				 . "text=".$eventTitle."&"
				 . "location=".$eventLocation."&"
				 . "details=".$eventDescription;
		
		}

		return $url;

	}

}