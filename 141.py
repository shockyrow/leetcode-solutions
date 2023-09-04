# Definition for singly-linked list.
# class ListNode:
#     def __init__(self, x):
#         self.val = x
#         self.next = None
class Solution:
    def hasCycle(self, head: Optional[ListNode]) -> bool:
        return self.solve(head)

    def solve(self, head: Optional[ListNode]) -> bool:
        if head is None:
            return False

        if head.val is None:
            return True

        head.val = None

        return self.solve(head.next)
