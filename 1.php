<?php

class Solution {
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        $map = [];

        foreach ($nums as $index => $num) {
            $map[$num] = $index;
        }

        foreach ($nums as $index => $num) {
            $remaining = $target - $num;

            if (isset($map[$remaining]) && $map[$remaining] !== $index) {
                return [$index, $map[$remaining]];
            }
        }

        return [];
    }
}
