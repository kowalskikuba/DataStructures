<?php
declare(strict_types=1);

namespace App\Tests;

use App\LinkedList\SinglyLinkedList\SinglyLinkedList;
use PHPUnit\Framework\TestCase;

class SinglyLinkedTest extends TestCase
{
    public function testFunctionality(): void
    {
        $linkedList = new SinglyLinkedList(); // list is empty

        $linkedList->append('A'); // list contain A
        $linkedList->append('B'); // list contain A, B
        $linkedList->append('C'); // list contain A, B, C

        $this->assertSame('A', $linkedList->get()); // list contain B, C
        $this->assertSame('B', $linkedList->get()); // list contain C
        $this->assertSame('C', $linkedList->get()); // list is empty
        $this->assertTrue($linkedList->isEmpty());
        $this->assertNull($linkedList->get());
    }
}