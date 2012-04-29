<?php
/**
 * @file Provides the class that takes a trello json file and outputs a csv file.
 */

class TrelloBoardToCsv {
  public $filename = '';
  public $json = '';
  public $csv = '';

  /**
   * Constructor
   * Checks that the input file exists and kicks off the sequence.
   */
  function __construct($filename) {
    if (file_exists($filename)) {
      $this->filename = $filename;
      $this->file_to_json();
      $this->json_to_csv();
      $this->save_csv();
    }
    else {
      throw new Exception('File does not exist.');
    }
  }
  
  /**
   * Read in the file and decodes the json.
   */
  function file_to_json() {
    $file = file_get_contents($this->filename);
    if ($file === FALSE) {
      throw new Exception('Could not read file.');
    }
    $decoded = json_decode($file);
    if ($decoded === NULL) {
      throw new Exception('Could not decode the JSON.');
    }
    $this->json = $decoded;
  }

  /**
   * Takes the decoded json and saves the interesting data.
   */
  function json_to_csv() {
    $output = '';
    $output .= $this->json->name . "\n";
    
    foreach ($this->json->lists as $i => $list) {
      if ($list->closed == FALSE) {
        $output .= "\n" . $list->name . "\n";

        foreach ($this->json->cards as $j => $card) {
          if ($card->closed == FALSE && $card->idList == $list->id) {
            $output .= $card->name . "\n";
          }
        }

      }
    }
    
    $this->csv = $output;
  }
  
  /**
   * Creates the CSV file
   */
  function save_csv() {
    $result = file_put_contents($this->filename . '.csv', $this->csv);
    if ($result === FALSE) {
      throw new Exception('Could not write the file.');
    }
  }

}
