<?php

namespace AlarmControl\Model;

interface ModelInterface {

    public function getModelName();

    public function getExpectedEstablishedMessage();

    public function getStatusCommand();

    public function getKeepAliveTimeout();

    public function getSupportedMessages();

    public function getSupportedCommands();

    public function getIgnoreMessages();


}