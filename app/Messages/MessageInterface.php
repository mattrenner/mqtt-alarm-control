<?php

namespace AlarmControl\Messages;

interface MessageInterface {

    /**
     * Text description of the message meaning
     *
     * @return string
     */
    public static function getDescription();

    /**
     * Regex for the message sent by the alarm panel
     *
     * @return string
     */
    public static function getMessagePattern();

    /**
     * Keyword for the message
     *
     * @return string
     */
    public static function getInternalDefinition();

    /**
     * Topic path to send message to
     *
     * @return string
     */
    public static function getInternalPath();


}