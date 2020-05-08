<?php

namespace App;

use stdClass;

/**
 * Class AlexaResponse
 * @package App
 * @property string $version
 * @property object $response;
 */
class AlexaResponse
{
    public $version = "1.0";
    public $response;

    public function __construct(string $output_speech_text) {
        $outputSpeech = new stdClass();
        $outputSpeech->type = "PlainText";
        $outputSpeech->text = $output_speech_text;

        $this->response = new stdClass();
        $this->response->outputSpeech = $outputSpeech;
        $this->response->shouldEndSession = true;
    }

    public function setOutputSpeechText(string $text) {
        $this->response->outputSpeech->text = $text;
    }
}
