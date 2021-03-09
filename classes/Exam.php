<?php

class Exam implements Exam_interface {

    private $url;
    private $page;
    private $questions;
    private $answers;
    private $question_number;
    

    function getQuestion_number() {
        return count($this->questions);
    }

    function getPage() {
        return $this->page;
    }
    
    public function __construct() {
          
        $this->page = $_SESSION["currentpage"];
        $this->questions = $this->get_questions();
        $this->answers = $this->get_answers();
    }

    public function load_exam_page($page) {
        if (isset($this->questions[$page - 1])) {
            return $this->questions[$page - 1];
        } else {
            throw new Exception("Question doesn't exist");
        }
    }
    
    public function get_Qustion_answer($current_page) {
        return $this->answers[$current_page - 2];
    }

    private function get_questions() {
        $lines = file(exam_file);
        $questions = array();
        foreach ($lines as $line) {
            if (substr($line, 0, 1) === "Q") {
                $new_mcquestion = new MCQuestion($line);
                $questions[] = $new_mcquestion;
            } elseif (substr($line, 0, 1) === "*") {
                $new_tofquestion = new TrueOrFalseQuestion(str_replace("*", "", $line));
                $questions[] = $new_tofquestion;
            } else {
                if(@count($new_mcquestion->get_options()) <= 3) {
                    $new_mcquestion->Add_an_Option($line);
                }
            }
        }
        return $questions;
    }
    
    // make function to get exam answers
    private function get_answers() {
        $lines = file(answer_file);
        $answers = array();
        $answers = $lines;
        return $answers;
    }
    
}
