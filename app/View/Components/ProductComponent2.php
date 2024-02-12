<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProductComponent2 extends Component
{

    public $product;
    public $displayType;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($product, $displayType = null)
    {
        $this->product = $product;
        $this->displayType = $displayType;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product-component2');
    }
}
