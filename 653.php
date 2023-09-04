<?php

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution
{
    private int $target;
    private array $map = [];

    /**
     * @param TreeNode $root
     * @param Integer $k
     * @return Boolean
     */
    function findTarget($root, $k)
    {
        $this->mapTree($root);
        $this->target = $k;

        return $this->solve($root);
    }

    private function solve($root): bool
    {
        if ($root === null) {
            return false;
        }

        $remaining = $this->target - $root->val;

        if ($remaining !== $root->val && isset($this->map[$remaining])) {
            return true;
        }

        return $this->solve($root->left) || $this->solve($root->right);
    }

    private function mapTree($root): void
    {
        if ($root === null) {
            return;
        }

        $this->map[$root->val] = true;

        $this->mapTree($root->left);
        $this->mapTree($root->right);
    }
}
