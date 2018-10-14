<?php

namespace AlarmControl\Commands\Area;

use AlarmControl\Commands\CommandInterface;

class Disarm implements CommandInterface {

    /**
     * @return string
     */
    public static function getDescription()
    {
        return 'Disarm Area';
    }

    /**
     * @return string
     */
    public static function getCommandPattern()
    {
        // DISARM <user_id> <code>

        return 'DISARM %s %s';
    }

    /**
     * @return string
     */
    public static function getInternalDefinition()
    {
        return 'disarm';
    }

    /**
     * Internal pattern for receiving from the broker
     *
     * @return string
     */
    public static function getInternalPathPattern()
    {
        return '#alarm/area/(?<identifier>[0-9]{1})/set#i';
    }
}