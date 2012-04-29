<?php
/**
 * Takes a Trello board JSON file and creates a CSV file.
 * Usage:  php trell-to-csv.php thefile.json [list_title]
 * Would output thefile.json.csv
 * If list_title is specified only prints lists whose titles contain that string.
 */

require_once('classes/TrelloBoardToCsv.class.php');

$filename = $argv[1];
$list_title = '';
if (isset($argv[2])) {
  $list_title = $argv[2];
}

try {
  $t = new TrelloBoardToCsv($filename, $list_title);
  print 'Success!' . "\n";
}
catch (Exception $e) {
  print 'Exception thrown: ' . $e->getMessage();
}

