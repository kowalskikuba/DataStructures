<?php
declare(strict_types=1);

namespace App\LinkedList\SinglyLinkedList;

use App\LinkedList\LinkedList;

class SinglyLinkedList implements LinkedList
{
    public function __construct(
        private SinglyLinkedListNode | null $head = null,
        private SinglyLinkedListNode | null $tail = null,
    ) {
    }

    public function append(string $value): void
    {
        $node = new SinglyLinkedListNode($value);

        if ($this->head === null || $this->tail === null) {
            $this->head = $node;
            $this->tail = $node;

            return;
        }

        $this->tail->next = $node;
        $this->tail = $node;
    }

    public function get(): string | null
    {
        if ($this->isEmpty()) {
            return null;
        }

        $value = $this->head->value;

        $this->head = $this->head->next;

        if ($this->head === null) {
            $this->tail = null;
        }

        return $value;

    }

    public function isEmpty(): bool
    {
        return $this->head === null;
    }
}