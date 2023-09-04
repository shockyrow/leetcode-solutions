<?php

class Solution
{
    private int $next_group = 0;
    /**
     * @var int[]
     */
    private array $map = [];

    /**
     * @param string[] $strs
     */
    public function numSimilarGroups(array $strs): int
    {
        foreach ($strs as $str) {
            $this->findGroup($str);
        }

        return count(
            array_unique(
                array_values($this->map)
            )
        );
    }

    private function findGroup(string $str): void
    {
        $group = null;
        $update_groups = [];

        foreach ($this->resolveVariants($str) as $variant) {
            if (isset($this->map[$variant])) {
                $update_groups[] = $this->map[$variant];
            }
        }

        $update_groups = array_unique($update_groups);

        $this->next_group++;
        $this->map[$str] = $this->next_group;

        if (count($update_groups) === 0) {
            return;
        }

        foreach ($this->map as $str => $group) {
            if (in_array($group, $update_groups)) {
                $this->map[$str] = $this->next_group;
            }
        }
    }

    private function resolveVariants(string $str): array
    {
        $variants = [$str];
        $len = strlen($str);

        for ($l = 0; $l < $len - 1; $l++) {
            for ($r = $l + 1; $r < $len; $r++) {
                $variant = $str;
                $variant[$l] = $str[$r];
                $variant[$r] = $str[$l];

                $variants[] = $variant;
            }
        }

        return $variants;
    }
}
