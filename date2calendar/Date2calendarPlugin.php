<?php

namespace Craft;

/**
 * Date2Calendar Plugin.
 *
 * Returns a link to create an entry in Google Calendar or an ICS-File
 *
 * @author    Stefan Friedrich <friedrich.stefan@gmail.com>
 * @link      http://github.com/stefanfriedrich
 */
class Date2calendarPlugin extends BasePlugin
{
    /**
     * Get plugin name.
     *
     * @return string
     */
    public function getName()
    {
        return Craft::t('Date2calendar');
    }

    /**
     * Get plugin version.
     *
     * @return string
     */
    public function getVersion()
    {
        return '1.5.0';
    }

    /**
     * Get plugin developer.
     *
     * @return string
     */
    public function getDeveloper()
    {
        return 'Stefan Friedrich';
    }

    /**
     * Get plugin developer url.
     *
     * @return string
     */
    public function getDeveloperUrl()
    {
        return 'https://github.com/stefanfriedrich';
    }

    /**
     * Get plugin url.
     *
     * @return string
     */
    public function getPluginUrl() {
        return 'https://github.com/stefanfriedrich/CraftDate2calendar';
    }

    /**
     * Get plugin description.
     *
     * @return string
     */
     public function getDescription() {
        return 'A plugin for Craft that returns a link for Google Calendar or an ICS-File from your dates/events in Craft.';
    }

    /**
     * Get plugin documentation url.
     *
     * @return string
     */
    public function getDocumentationUrl() {
        return $this->getPluginUrl().'/blob/master/README.md';
    }

    /**
     * Get the plugin’s releases JSON feed URL.
     *
     * @return string
     */    
    public function getReleaseFeedUrl() {
        return 'https://raw.githubusercontent.com/stefanfriedrich/CraftDate2calendar/master/releases.json';
    }

    /**
     * Adds the twig extension.
     *
     * @return string
     */    
    public function addTwigExtension() {
        Craft::import('plugins.date2calendar.twigextensions.Date2calendarTwigExtension');
        return new Date2calendarTwigExtension();
    }
}
