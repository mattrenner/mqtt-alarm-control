<?php

namespace AlarmControl\Commands\Panel;

use AlarmControl\Commands\CommandInterface;

class Mem implements CommandInterface {

    /**
     * @return string
     */
    public static function getDescription()
    {
        return 'Memory';
    }

    /**
     * @return string
     */
    public static function getCommandPattern()
    {
        // MEM <num_events>

        return 'MEM %s';
    }

    /**
     * @return string
     */
    public static function getInternalDefinition()
    {
        return 'mem';
    }

    /**
     * Internal pattern for receiving from the broker
     *
     * @return string
     */
    public static function getInternalPathPattern()
    {
        return '#alarm/panel/(?<identifier>[0-9]{1})/set#i';
    }
}