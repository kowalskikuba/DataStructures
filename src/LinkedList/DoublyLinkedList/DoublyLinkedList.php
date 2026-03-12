<?php

declare(strict_types=1);

namespace App\LinkedList\DoublyLinkedList;

use App\LinkedList\SinglyLinkedList\SinglyLinkedListNode;

final class DoublyLinkedList
{
    public function __construct(
        private DoublyLinkedListNode | null $head = null,
        private DoublyLinkedListNode | null $tail = null,
    ) {
    }

    public function isEmpty(): bool
    {
        return $this->head === null;
    }

    public function append(string $value): DoublyLinkedListNode
    {
        $node = new DoublyLinkedListNode($value);
        $this->appendNode($node);

        return $node;
    }

    public function prepend(string $value): DoublyLinkedListNode
    {
        $node = new DoublyLinkedListNode($value);
        $this->prependNode($node);

        return $node;
    }

    public function removeHead(): ?string
    {
        if ($this->head === null) {
            return null;
        }

        $removed = $this->head;

        if ($this->head === $this->tail) {
            $this->head = null;
            $this->tail = null;

            return $removed->value;
        }

        $this->head = $removed->next;
        $this->head->prev = null;

        $removed->next = null;
        $removed->prev = null;

        return $removed->value;
    }

    public function removeTail(): ?string
    {
        if ($this->tail === null) {
            return null;
        }

        $removed = $this->tail;

        if ($this->head === $this->tail) {
            $this->head = null;
            $this->tail = null;

            return $removed->value;
        }

        $this->tail = $removed->prev;
        $this->tail->next = null;

        $removed->prev = null;
        $removed->next = null;

        return $removed->value;
    }

    public function remove(DoublyLinkedListNode $node): void
    {
        if ($this->head === null) {
            return;
        }

        if ($node === $this->head) {
            $this->removeHead();
            return;
        }

        if ($node === $this->tail) {
            $this->removeTail();
            return;
        }

        $prev = $node->prev;
        $next = $node->next;

        if ($prev === null || $next === null) {
            throw new \InvalidArgumentException('Cannot remove a detached or foreign node.');
        }

        $prev->next = $next;
        $next->prev = $prev;

        $node->prev = null;
        $node->next = null;
    }

    public function moveToFront(DoublyLinkedListNode $node): void
    {
        if ($node === $this->head) {
            return;
        }

        $this->remove($node);
        $this->prependNode($node);
    }

    /**
     * @return list<string>
     */
    public function toArray(): array
    {
        $values = [];
        $current = $this->head;

        while ($current !== null) {
            $values[] = $current->value;
            $current = $current->next;
        }

        return $values;
    }

    private function appendNode(DoublyLinkedListNode $node): void
    {
        $this->assertDetached($node);

        if ($this->tail === null) {
            $this->head = $node;
            $this->tail = $node;
            return;
        }

        $node->prev = $this->tail;
        $this->tail->next = $node;
        $this->tail = $node;
    }

    private function prependNode(DoublyLinkedListNode $node): void
    {
        $this->assertDetached($node);

        if ($this->head === null) {
            $this->head = $node;
            $this->tail = $node;
            return;
        }

        $node->next = $this->head;
        $this->head->prev = $node;
        $this->head = $node;
    }

    private function assertDetached(DoublyLinkedListNode $node): void
    {
        if ($node->prev !== null || $node->next !== null) {
            throw new \InvalidArgumentException('Node must be detached before insertion.');
        }

        if ($node === $this->head || $node === $this->tail) {
            throw new \InvalidArgumentException('Node is already part of this list.');
        }
    }
}