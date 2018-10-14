<?php

namespace AlarmControl;

use BinSoul\Net\Mqtt\Client\React\ReactMqttClient;
use BinSoul\Net\Mqtt\Connection;
use BinSoul\Net\Mqtt\DefaultMessage;
use BinSoul\Net\Mqtt\DefaultSubscription;
use BinSoul\Net\Mqtt\Message;
use BinSoul\Net\Mqtt\Subscription;
use Evenement\EventEmitter;
use React\EventLoop\LoopInterface;
use React\Socket\Connector;

class Broker extends EventEmitter {

    /** @var LoopInterface */
    protected $loop;

    /** @var Connector */
    protected $connector;

    /** @var ReactMqttClient */
    protected $client;

    protected $url;

    const TOPIC_PREFIX = 'home';

    const EVENT_COMMAND = 'command';

    public function __construct(LoopInterface $loop, $url)
    {

        $this->loop = $loop;
        $this->url = $url;

        $this->connector = new Connector($loop);
        $this->client = new ReactMqttClient($this->connector, $loop);


    }

    public function connect()
    {
        $that = $this;

        $this->client->on('connect', function (Connection $connection) use ($that) {
            $that->client->subscribe(new DefaultSubscription('home/#'));
        });

        // Re-emit messages from the broker so the alarm class can listen for them
        $this->client->on('message', function (Message $message) use ($that) {
            if(!$message->isDuplicate()){
                $that->emit(self::EVENT_COMMAND, [$message->getTopic(), $message->getPayload()]);
            }
        });

        $this->client->connect($this->url);

    }

    public function send($topic, $data){

        $topic = self::TOPIC_PREFIX . DS . $topic;

        $this->client->publish(new DefaultMessage($topic, $data))
            ->then(function (Message $message) {
                echo sprintf("Publish: %s => %s\n", $message->getTopic(), $message->getPayload());
            })
            ->otherwise(function (\Exception $e) {
                echo sprintf("Error: %s\n", $e->getMessage());
            });
    }


}