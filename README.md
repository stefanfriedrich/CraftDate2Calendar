# Date2Calendar
A plugin for Craft that returns a link for Google Calendar or an ICS-file from your dates/events in Craft. 

## Installation

To install Date2Calendar, follow these steps:

Upload the plural folder to craft/plugins/.
Go to Settings > Plugins from your Craft control panel and enable the Date2Calendar plugin.

## Usage

Simple usage if your entryfields for the event are named like this:
entry.start
entry.end
entry.title
entry.description
entry.location

If so, use this:
```jinja
<a href="{{ entry | date2calendar }}">Link</a>
```

If not, give the plugin a little array:

```jinja
{% set event = {'start'		  : entry.start.getTimestamp(),
				'end'		  : entry.end.getTimestamp(),
				'title'		  : entry.title | striptags,
				'description' : entry.description | striptags,
				'location'	  : entry.location | striptags } %}
<a href="{{ event | date2calendar }}">Link</a>
```

In return you'll get an url that creates an entry in Google Calendar when called. 


## Options

{{ entry | date2calendar }} 			=> returns the link for google calendar
{{ entry | date2calendar('GC') }} 		=> returns the link for google calendar
{{ entry | date2calendar('ICS') }} 		=> downloads an ics-file for outlook, ical, whatever..
{{ entry | date2calendar('GC', +2) }} 	=> returns the link for google calendar with the date plus 2 hours 
{{ entry | date2calendar('ICS', -2) }} 	=> returns the link for google calendar with the date minus 2 hours 
