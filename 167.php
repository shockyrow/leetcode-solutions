<?php

class Solution {
    /**
     * @param Integer[] $numbers
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($numbers, $target) {
        $map = [];

        foreach ($numbers as $index => $num) {
            $remaining = $target - $num;

            if (isset($map[$remaining])) {
                return [$map[$remaining] + 1, $index + 1];
            }

            $map[$num] = $index;
        }

        return [];
    }
}
