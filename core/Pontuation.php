<?php

require_once 'JsonGetter.php';
require_once 'CSVGetter.php';

class Pontuation {
    private const PATH_TO_JSON = './target/tickets_points.json';

    public static function build($json_data) {
        $jsonGetter = JsonGetter::getData($json_data);
        foreach($jsonGetter as &$json) {
            foreach($json["Interactions"] as &$interaction) {
                if ($interaction["Sender"] == 'Customer') {
                    $message = $interaction['Message'];
                $subject = $interaction["Subject"];
                $points = 0;
                
                    $acknowledgment = CSVGetter::getWords(0);
                    foreach($acknowledgment as $thank) {
                        $points -= 12 * substr_count(strtolower($subject), strtolower($thank));
                        $points -= 4 * substr_count(strtolower($message), strtolower($thank));
                    }
                    $questions = CSVGetter::getWords(1);
                    foreach($questions as $question) {
                        $points -= 6 * substr_count(strtolower($subject), strtolower($question));
                        $points -= 2 * substr_count(strtolower($message), strtolower($question));
                    }
                    $exchanges = CSVGetter::getWords(2);
                    foreach($exchanges as $exchange) {
                        $points += 15 * substr_count(strtolower($subject), strtolower($exchange));
                        $points += 5 * substr_count(strtolower($message), strtolower($exchange));
                    }
                    $lateness = CSVGetter::getWords(3);
                    foreach($lateness as $late) {
                        $points += 30 * (substr_count(strtolower($subject), strtolower($late)));
                        $points += 10 * (substr_count(strtolower($message), strtolower($late)));
                    }
                    $complaints = CSVGetter::getWords(4);
                    foreach($complaints as $complaint) {
                        $points += 45 * (substr_count(strtolower($subject), strtolower($complaint)));
                        $points += 15 * (substr_count(strtolower($message), strtolower($complaint)));
                    }
                    
                    $interaction['Points'] = $points;
                } else { $interaction['Points'] = 0; }
                $myJSON     = json_encode($jsonGetter, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
                
            }
        }
        $fp = fopen(Pontuation::PATH_TO_JSON, 'w');
        fwrite($fp, $myJSON);
        fclose($fp);
    }
}
