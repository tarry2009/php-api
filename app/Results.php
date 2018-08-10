<?php

namespace App;

class Results
{
    /**
* @var array
*/
    protected $items = [];

    /**
* Construct the results with the given items.
*
* @param array $items
*/
    public function __construct($items = [])
    {
        $this->items = $items;
    }

    /**
* Check if the specified item is in the results.
*
* @param string $item
* @return bool
*/
    public function has($item)
    {
        return in_array($item, $this->items);
    }

    /**
* Remove an item from the results, or null if the results is empty.
*
* @return string
*/
    public function takeOne()
    {
        return array_shift($this->items);
    }

    /**
* Retrieve all items from the results that start with the specified letter.
*
* @param string $letter
* @return array
*/
    public function startsWith($letter)
    {
        return array_filter($this->items, function ($item) use ($letter) {
            return stripos($item, $letter) === 0;
        });
    }
}
