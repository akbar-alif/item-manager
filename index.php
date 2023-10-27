<?php

require_once "helpers.php";
require_once "Items.php";
require_once "Commands.php";

checkIfArgumentsAreGiven($argc);

// Access the command-line argument
$fileName = $argv[1];
$action = $argv[2];

isTxtFile($fileName);

$items = new Items($fileName);
switch ($action) {
    case Commands::ADD:
        $items->add();
        break;
    case Commands::UPDATE:
        $items->update();
        break;
    case Commands::DELETE:
        $items->delete();
        break;
    case Commands::TOTAL:
        $items->total();
        break;
    case Commands::LIST:
        $items->list();
        break;
    case Commands::CLEAR:
        $items->clear();
        break;
    default:
        echo "Wrong action $action" . PHP_EOL;
        availableActions();
}






