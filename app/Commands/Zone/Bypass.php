<?php

namespace AlarmControl\Commands\Zone;

use AlarmControl\Commands\CommandInterface;

class Bypass implements CommandInterface {

    /**
     * @return string
     */
    public static function getDescription()
    {
        return 'Bypass Zone';
    }

    /**
     * @return string
     */
    public static function getCommandPattern()
    {
        // BYPASS <zone_id>

        return 'BYPASS %s';
    }

    /**
     * @return string
     */
    public static function getInternalDefinition()
    {
        return 'bypass';
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