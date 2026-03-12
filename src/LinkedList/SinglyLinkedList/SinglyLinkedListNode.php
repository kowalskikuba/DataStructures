<?php
declare(strict_types=1);

namespace App\LinkedList\SinglyLinkedList;

use App\LinkedList\Node;

class SinglyLinkedListNode implements Node
{
    public function __construct(
        public string                      $value,
        public SinglyLinkedListNode | null $next = null,
    ) {
    }
}