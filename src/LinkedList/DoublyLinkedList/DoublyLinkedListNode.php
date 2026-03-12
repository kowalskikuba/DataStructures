<?php
declare(strict_types=1);

namespace App\LinkedList\DoublyLinkedList;

use App\LinkedList\Node;

class DoublyLinkedListNode implements Node
{
    public function __construct(
        public string                      $value,
        public DoublyLinkedListNode | null $prev = null,
        public DoublyLinkedListNode | null $next = null,
    ) {
    }
}