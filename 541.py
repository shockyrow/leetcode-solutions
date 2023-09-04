class Solution:
    def reverseStr(self, s: str, k: int) -> str:
        r = ''

        for i in range(len(s)):
            if self.inRange(i, k):
                ni = min(((int(i / k) + 1) * k), len(s)) - (i % k + 1)
                r += s[ni]
            else:
                r += s[i]

        return r

    @staticmethod
    def inRange(i: int, k: int) -> bool:
        return int(i / k) % 2 == 0

