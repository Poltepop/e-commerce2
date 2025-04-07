<?php

namespace App\Utils;

use App\Models\Product;
use Illuminate\Support\Str;

trait GenerateSlug {
    private ?int $count = null;
    private ?string $slug = null;
    public function generateProductSlug(string $word): static
    {
        $slug = Str::slug(strtolower($word)); // sample word -> sample-word
        $this->count = Product::select('slug')
                                ->where('slug',  'LIKE', '%'. $slug . '%')
                                ->count('slug');

        if ($this->count == 0 || null) {
            $this->setSlug($slug);
        } else {
            $uniqSlug = $slug . '-' . ($this->count + 1 - 1);
            $this->setSlug($uniqSlug);
        }

        $this->resetCountSlug();

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }

    public function resetCountSlug(): void
    {
        $this->count = null;
    }
}
