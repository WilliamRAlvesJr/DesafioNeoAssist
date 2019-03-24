<?php

class CSVGetter {
    private const PATH_TO_CSV = './resources/words.csv';
    
    public static function getWords($column) {
        $row = 1;
        
        if (($handle = fopen(CSVGetter::PATH_TO_CSV, "r")) !== FALSE) {
            $categorie_words = [];
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if($row == 1){ $row++; continue; }
                $row++;
                array_push($categorie_words, $data[$column]);
            }
            fclose($handle);
            return $categorie_words;
        }
    }
}