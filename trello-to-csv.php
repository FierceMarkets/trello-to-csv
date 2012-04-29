<?php
/**
 * Takes a Trello board JSON file and creates a CSV file.
 * Usage:  php trell-to-csv.php thefile.json
 * Would output thefile.json.csv
 */

require_once('classes/TrelloBoardToCsv.class.php');

try {
  $t = new TrelloBoardToCsv($argv[1]);
  print 'Success!' . "\n";
}
catch (Exception $e) {
  print 'Exception thrown: ' . $e->getMessage();
}

