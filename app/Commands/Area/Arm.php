<?php

namespace AlarmControl\Commands\Area;

use AlarmControl\Commands\CommandInterface;

class Arm implements CommandInterface {

    /**
     * @return string
     */
    public static function getDescription()
    {
        return 'Arm Area';
    }

    /**
     * @return string
     */
    public static function getCommandPattern()
    {
        // ARMAWAY <user_id> <code>

        return 'ARMAWAY %s %s';
    }

    /**
     * @return string
     */
    public static function getInternalDefinition()
    {
        return 'arm';
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