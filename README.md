# Command-Line Item Manager

## Overview

This PHP script allows you to manage a list of items, their names, and prices through a command-line interface. You can use a set of commands to add, update, delete, list, clear, and calculate the total of the items. The script takes two arguments: the file name for storage and the action to perform.

## Features

- **Add**: Add a new item with a name and price.
- **Update**: Update an existing item's name and price.
- **Delete**: Remove an existing item by specifying both name and price.
- **Clear**: Remove all items from the list.
- **List**: Display a list of all available items.
- **Total**: Calculate and display the total sum of all item prices.

## Usage

1. Clone or download the repository to your local machine.

2. Navigate to the project directory.

3. Run the script in your terminal using PHP, specifying the file name for storage and the action to perform:

   ```bash
   php index.php yourlist.txt add
   ```

   Replace `yourlist.txt` with the desired file name. Only `.txt` files are allowed.

4. Follow the on-screen prompts and use the available commands to manage your list of items.

## Example Commands

- To add an item:
  ```bash
  php index.php yourlist.txt add
  Enter item name: Apple
  Enter item price: 1.99
  ```

- To update an item:
  ```bash
  php index.php yourlist.txt update
  Enter the old item name: Apple
  Enter the old item price: 1.99
  Enter updated item name: Red Apple
  Enter updated item price: 2.49
  ```

- To delete an item:
  ```bash
  php index.php yourlist.txt delete
  Enter the item name that you want to delete: Red Apple
  Enter the item price that you want to delete: 2.49
  ```

- To clear all items:
  ```bash
  php index.php yourlist.txt clear
  ```

- To list all items:
  ```bash
  php index.php yourlist.txt list
  ```

- To calculate the total price of all items:
  ```bash
  php index.php yourlist.txt total
  ```

## Contributing

If you find any issues or have suggestions for improvements, feel free to create an issue or a pull request in this repository.
