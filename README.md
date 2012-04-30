This PHP script runs from the command line, like so:

    php trello-to-csv.php input.json listname

It outputs a file called input.json.csv that includes active lists in which listname is contained in the list title.  Without the second parameter it outputs all active lists and cards.

You can get input.json by going to the Trello board, clicking the Board Menu on the right side, clicking Profile, then the Share, Print, and Export link, and finally, clicking JSON.
