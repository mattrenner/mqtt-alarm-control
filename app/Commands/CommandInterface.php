<?php

namespace AlarmControl\Commands;

interface CommandInterface {

    /**
     * Description of what the command will do
     *
     * @return string
     */
    public static function getDescription();

    /**
     * Sprintf pattern for the command
     *
     * @return string
     */
    public static function getCommandPattern();

    /**
     * Internal keyword for the command
     *
     * @return string
     */
    public static function getInternalDefinition();

    /**
     * Internal pattern for receiving from the broker
     *
     * @return string
     */
    public static function getInternalPathPattern();

}