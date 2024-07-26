<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProductCard extends Component
{
    public $image;
    public $brand;
    public $name;
    public $price;
    public $oldPrice;
    public $detailUrl;

    public function __construct($image, $brand, $name, $price, $oldPrice = null, $detailUrl = '#')
    {
        $this->image = $image;
        $this->brand = $brand;
        $this->name = $name;
        $this->price = $price;
        $this->oldPrice = $oldPrice;
        $this->detailUrl = $detailUrl;
    }

    public function render()
    {
        return view('components.cardproduct');
    }
}

