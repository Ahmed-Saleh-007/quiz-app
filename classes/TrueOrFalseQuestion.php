<?php

class TrueOrFalseQuestion implements Question_interface {
    private $question;
    private $options;
    
    public function __construct($question){
        $this->question = $question;
        $this->options = array("True","False");
    }

    function get_question() {
        return $this->question;
    }

    function get_options() {
        return $this->options;
    }
    
}
