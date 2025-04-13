<?php

namespace App\Utils;

interface TableInterface {
    public function deleteMany(array $dataIds): void;
    public function updateMany(array $dataIds): void;
}
