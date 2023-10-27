<?php

class Items {
    /**
     * Items constructor.
     * @param string $fileName
     */
    public function __construct(private readonly string $fileName) {}

    /**
     * @return void
     */
    public function add(): void {
        $itemName = $this->getItemName();
        $itemPrice = $this->getItemPrice();
        $item = self::getItem($itemName, $itemPrice);

        if ($this->checkIfItemExists($item)) {
            echo "Item " . trim($item) . " already exists!" . PHP_EOL;
            exit(1);
        }

        $saved = file_put_contents($this->fileName, $item, FILE_APPEND);

        if ($saved) {
            echo "Item added successfully." . PHP_EOL;
            $this->addMoreOrExit();
        } else {
            echo "Error writing to the file." . PHP_EOL;
        }
    }

    /**
     * @return void
     */
    public function update(): void {
        $oldItemName = $this->getItemName("Enter the old item name: ");
        $oldItemPrice = $this->getItemPrice("Enter the old item price: ");
        $oldItem = $this->getItem($oldItemName, $oldItemPrice);

        if (!$this->checkIfItemExists($oldItem)) {
            echo "Item " . trim($oldItem) . "  does not exists" . PHP_EOL;
            exit(1);
        }

        $newItemName = $this->getItemName("Enter updated item name: ");
        $newItemPrice = $this->getItemPrice("Enter updated item price: ");
        $newItem = $this->getItem($newItemName, $newItemPrice);

        if ($this->checkIfItemExists($newItem)) {
            echo "Item " . trim($newItem) . " already exists!" . PHP_EOL;
            exit(1);
        }

        $content = $this->getContentAsString();
        $newContent = str_replace($oldItem, $newItem, $content);
        $saved = file_put_contents($this->fileName, $newContent);
        echo $saved ? "Item updated successfully." . PHP_EOL : "Could not update item" . PHP_EOL;
        
    }

    /**
     * @return void
     */
    public function delete(): void {
        $itemName = $this->getItemName("Enter the item name that you want to delete: ");
        $itemPrice = $this->getItemPrice("Enter the item price that you want to delete: ");

        $item = $this->getItem($itemName, $itemPrice);
        if (!$this->checkIfItemExists($item)) {
            echo "Item " . trim($item) . "  does not exists" . PHP_EOL;
            exit(1);
        }

        $content = $this->getContentAsString();

        $newContent = str_replace($item, "", $content);
        $saved = file_put_contents($this->fileName, $newContent);
        echo $saved ? "Item deleted successfully." . PHP_EOL : "Could not delete item" . PHP_EOL;
    }

    /**
     * @return void
     */
    public function clear(): void {
        file_put_contents($this->fileName, '');
        echo "All items cleared" . PHP_EOL;
    }

    /**
     * @return void
     */
    public function list(): void {
        echo $this->getContentAsString();
    }

    /**
     * @return void
     */
    public function total(): void {
        $items = $this->getContentAsArray();
        $totalPrice = 0;
        foreach ($items as $item) {
            $totalPrice += floatval(trim(explode(" - ", $item)[1] ?? 0));
        }

        echo "Total price is $totalPrice" . PHP_EOL;
    }

    /**
     * @param string $itemName
     * @param int $itemPrice
     * @return string
     */
    private function getItem(string $itemName, int $itemPrice): string {
        return "$itemName - $itemPrice" . PHP_EOL;
    }

    /**
     * @param string $item
     * @return false|int|string
     */
    private function checkIfItemExists(string $item): false|int|string {
        $content = $this->getContentAsString();
        return str_contains($content, $item);
    }

    /**
     * @return void
     */
    private function addMoreOrExit(): void {
        echo "Add more or enough? (1: Add more, 2: Enough))" . PHP_EOL;
        $choice = readline();
        if ($choice == '1') {
            self::add();
        } else if ($choice == '2') {
            exit(1);
        } else {
            echo "Wrong input!" . PHP_EOL;
            exit(1);
        }
    }

    /**
     * @return bool|array
     */
    private function getContentAsArray(): bool|array {
        return file_exists($this->fileName) ? file($this->fileName, FILE_SKIP_EMPTY_LINES) : [];
    }

    /**
     * @return string
     */
    private function getContentAsString(): string {
        return file_exists($this->fileName) ? file_get_contents($this->fileName) : "";
    }

    /**
     * @return false|string|void
     */
    private function getItemName(string $message = "Enter item name: ") {
        echo $message;
        $itemName = readline();
        if (is_numeric($itemName)) {
            echo "Item name should be string!" . PHP_EOL;
            exit(1);
        }
        return $itemName;
    }

    /**
     * @return float|int|string|void
     */
    private function getItemPrice(string $message = "Enter item price: ") {
        echo $message;
        $price = readline();
        if (!is_numeric($price)) {
            echo "Price should be numeric!" . PHP_EOL;
            exit(1);
        }
        return $price;
    }
}
