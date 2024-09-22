<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class Create extends Component
{
    public $title;
    public $desc;
    public $price;
    public $image;

    public function render()
    {
        return view('livewire.product.create');
    }

    public function store()
    {
        
        Product::create([
            'title'  => $this->title,
            'desc' => $this->desc,
            'price' => $this->price,

        ]);

        $this->emit('productStored');
    }
}
