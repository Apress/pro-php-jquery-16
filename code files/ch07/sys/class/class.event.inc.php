<?php

declare(strict_types=1);

/**
 * Stores event information
 *
 * PHP version 7
 *
 * LICENSE: This source file is subject to the MIT License, available
 * at http://www.opensource.org/licenses/mit-license.html
 *
 * @author     Jason Lengstorf <jason.lengstorf@ennuidesign.com>
 * @copyright  2010 Ennui Design
 * @license    http://www.opensource.org/licenses/mit-license.html
 */
class Event
{

    /**
     * The event ID
     *
     * @var int
     */
    public $id;

    /**
     * The event title
     *
     * @var string
     */
    public $title;

    /**
     * The event description
     *
     * @var string
     */
    public $description;

    /**
     * The event start time
     *
     * @var string
     */
    public $start;

    /**
     * The event end time
     *
     * @var string
     */
    public $end;

    /**
     * Accepts an array of event data and stores it,
     * otherwise returns an empty event
     *
     * @param array $event Associative array of event data
     * @return void
     */
    public function __construct($event=NULL)
    {
        if ( is_array($event) )
        {
            $this->id = $event['event_id'];
            $this->title = $event['event_title'];
            $this->description = $event['event_desc'];
            $this->start = $event['event_start'];
            $this->end = $event['event_end'];
        }
        else
        {
            $this->id = NULL;
            $this->title = "";
            $this->description = "";
            $this->start = "";
            $this->end = "";
        }
    }

}

?>