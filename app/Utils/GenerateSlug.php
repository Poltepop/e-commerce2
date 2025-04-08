<?php

namespace App\Utils;

use App\Models\Product;
use Illuminate\Support\Str;

trait GenerateSlug {
    private ?string $result = null;
    public function generateProductSlug(string $word): static
    {
        if (!empty(trim($word))) {
            $slug = Str::slug(strtolower($word)); // sample word -> sample-word
            $count = Product::select('slug')
                                    ->where('slug',  'LIKE', '%'. $slug . '%')
                                    ->count('slug');

            if ($count == 0 || null) {
                $this->setSlug($slug);
            } else {
                $uniqSlug = $slug . '-' . ($count + 1 - 1);
                $this->setSlug($uniqSlug);
            }
        }

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->result;
    }

    private function setSlug(string $slug): void
    {
        $this->result = $slug;
    }
}
