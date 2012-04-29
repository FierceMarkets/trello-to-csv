This PHP script runs from the command line, like so:

  php trello-to-csv.php input.json listname

It outputs a file called input.json.csv that includes active lists in which listname is contained in the list title.  Without the second parameter it outputs all active lists and cards.
