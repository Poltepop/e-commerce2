<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class ProductRequest extends Form
{
    public string $name;
    public float $price;
    public float $weight;
    public ?string $short_description = null;
    public ?string $description = null;
    public string $status;
}
