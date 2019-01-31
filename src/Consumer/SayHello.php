<?php

namespace AcmeApplication\Consumer;

/**
 * Class SayHello
 * @package AcmeApplication\Consumer
 */
class SayHello
{
    const ENDPOINT = 'https://data.police.uk/api/forces';

    /**
     * @param $myMessage
     * @note Our example consumer, we're not going to use the message here.
     */
    public function processPoliceForces($myMessage = '')
    {
        $data = json_decode(file_get_contents(self::ENDPOINT));

        foreach ($data as $force) {
            echo sprintf($this->getRandMessage(), $force->name) . PHP_EOL;
        }
    }

    /**
     * @return string
     */
    private function getRandMessage()
    {
        $key = rand(0,4);
        $sentences = [
            "Here's a force to be reckoned with: %s",
            "Call the cops at %s - we need help",
            "Policemen and women in %s are great",
            "%s have a pretty small police force",
            "Wooo woo wooo! It's %s!"
        ];
        return $sentences[$key];
    }
}