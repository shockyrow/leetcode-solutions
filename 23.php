<?php

final class CustomListNode
{
    public int $val = 0;
    public ?CustomListNode $next = null;

    function __construct(int $val = 0, CustomListNode $next = null)
    {
        $this->val = $val;
        $this->next = $next;
    }
}

final class Solution
{

    /**
     * @param CustomListNode[] $nodes
     */
    function mergeKLists(array $nodes = []): ?CustomListNode
    {
        $root = null;

        do {
            $min_index = null;
            $min_value = null;

            foreach ($nodes as $index => $node) {
                $value = $node?->val;

                if ($value !== null && ($min_value === null || $min_value > $value)) {
                    $min_index = $index;
                    $min_value = $value;
                }
            }

            if ($min_index === null) {
                break;
            }

            $new_node = new CustomListNode($min_value);
            $nodes[$min_index] = $nodes[$min_index]->next;

            if ($root === null) {
                $root = $new_node;
            } else {
                $last_node->next = $new_node;
            }

            $last_node = $new_node;
        } while(true);

        return $root;
    }
}
