<?php

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution {
    function addTwoNumbers(ListNode $l1, ListNode $l2): ListNode {
        $root_node = null;

        $carry = 0;

        do {
            $first = $l1 !== null ? $l1->val : 0;
            $second = $l2 !== null ? $l2->val : 0;
            $sum = $carry + $first + $second;
            $carry = (int)($sum / 10);
            $digit = $sum % 10;

            $new_node = new ListNode($digit);

            if ($root_node === null) {
                $root_node = $new_node;
            } else {
                $last_node->next = $new_node;
            }

            $last_node = $new_node;

            $l1 = $l1?->next;
            $l2 = $l2?->next;
        } while($l1 || $l2 || $carry);

        return $root_node;
    }
}
