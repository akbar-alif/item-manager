<?php

/**
 * @param $argc
 * @return void
 */
function checkIfArgumentsAreGiven($argc): void {
    if ($argc < 3) {
        echo "Please provide arguments fileName and action" . PHP_EOL;
        availableActions();
        exit(1); // Exit with a non-zero status code to indicate an error
    }
}

/**
 * @param string $fileName
 * @return void
 */
function isTxtFile(string $fileName): void {
    $extension = explode(".", $fileName)[1] ?? null;
    if (is_null($extension)) {
        echo "Only .txt extension is allowed" . PHP_EOL;
        exit(1);
    }
}

/**
 * @return void
 */
function availableActions(): void {
    echo  <<<'EOD'
    Available actions: 
        add      Add a new item with a name and price "php index.php «fileName.txt» add"
        update   Update an existing item's name and price "php index.php «fileName.txt» update"
        delete   Remove an existing item by specifying both name and price "php index.php «fileName.txt» delete"
        list     Display a list of all available items "php index.php «fileName.txt» list"
        clear    Remove all items from the list "php index.php «fileName.txt» clear"
        total    Calculate and display the total sum of all item prices "php index.php «fileName.txt» total"
    EOD;
}
