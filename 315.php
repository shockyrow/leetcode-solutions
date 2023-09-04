<?php

class Solution {
    /**
     * @var int[]
     */
    private array $counted = [];

    /**
     * @param int[] $nums
     * @return int[]
     */
    function countSmaller(array $nums): array {
        $result = [];

        foreach (array_reverse($nums) as $num) {
            $count = $this->findFor($num);
            $result[] = $count;
            array_splice($this->counted, $count, 0, $num);
        }

        return array_reverse($result);
    }

    private function findFor(int $num): int {
        $l = 0;
        $r = count($this->counted);

        while ($l < $r) {
            $m = (int)(($r + $l) / 2);

            if ($this->counted[$m] < $num) {
                $l = $m + 1;
            } else {
                $r = $m;
            }
        }

        return $l;
    }
}
