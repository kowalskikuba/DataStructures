# Linked list
Linked list is a sequence of **nodes** connected by references.

There are few types of those lists:
1. Singly linked list 
- easy to add to the tail and remove from head
- Can be used for:
  - job queues
  - message queues
  - event processing

### Structure
`A -> B -> C`


| State              | Representation (pointer) |
|--------------------|--------------------------|
| empty              | null, null               |
| insert A           | A ( null), A (null)      |
| insert B           | A (B), B (null)          |
| insert C           | A (B), B (C), C (null)   |
| get (return first) | B (C), C (null)|

2 Doubly linked List

### Structure
`A <-> B <-> C`

| State     | Representation (prev pointer, next pointer)    |
|-----------|------------------------------------------------|
| empty     | null, null                                     |
| append A  | A (null, null), A (null, null)                 |
| append B  | A (null, B), B (A, null)                       |
| append C  | A (null, B), B (A, C), C (B, null)             |
| prepend D | D (null, A, ), A (D, B), B (A, C), C (B, null) |