<?php

namespace AlarmControl\Commands\Zone;

use AlarmControl\Commands\CommandInterface;

class Unbypass implements CommandInterface {

    /**
     * @return string
     */
    public static function getDescription()
    {
        return 'Unbypass Zone';
    }

    /**
     * @return string
     */
    public static function getCommandPattern()
    {
        // UNBYPASS <zone_id>

        return 'UNBYPASS %s';
    }

    /**
     * @return string
     */
    public static function getInternalDefinition()
    {
        return 'unbypass';
    }

    /**
     * Internal pattern for receiving from the broker
     *
     * @return string
     */
    public static function getInternalPathPattern()
    {
        return '#alarm/zone/(?<identifier>[0-9]{1})/set#i';
    }
}