<?php
declare(strict_types=1);

namespace App\LinkedList;

interface LinkedList
{
    public function append(string $value): void;

    public function get(): string | null;
}