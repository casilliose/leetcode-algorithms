<?php

/**
 * You are given two non-empty linked lists representing two non-negative integers. The digits are stored in reverse order, and each of their nodes contains a single digit. Add the two numbers and return the sum as a linked list.
 *
 * You may assume the two numbers do not contain any leading zero, except the number 0 itself.
 *
 * You may assume the two numbers do not contain any leading zero, except the number 0 itself.
 *
 * Input: l1 = [2,4,3], l2 = [5,6,4]
 * Output: [7,0,8]
 * Explanation: 342 + 465 = 807.
 *
 * Example 2:
 *
 * Input: l1 = [0], l2 = [0]
 * Output: [0]
 *
 * Example 3:
 *
 * Input: l1 = [9,9,9,9,9,9,9], l2 = [9,9,9,9]
 * Output: [8,9,9,9,0,0,0,1]
 *
 * Constraints:
 *
 * The number of nodes in each linked list is in the range [1, 100].
 * 0 <= Node.val <= 9
 * It is guaranteed that the list represents a number that does not have leading zeros.
 */

class ListNode
{
    public $val = 0;
    public $next = null;

    function __construct($val = 0, $next = null)
    {
        $this->val = $val;
        $this->next = $next;
    }
}

class Solution
{

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2)
    {
        $numberFirst = "";
        $numberSecond = "";
        while (true) { // включаем бесконечный цикл так как не можем знать вложенность
            if ($l1->next != null) { // проверяем что у нас есть следующий елемент
                $numberFirst .= $l1->val; // канкатенируем цифры в строку
                $l1 = $l1->next; // достаем следующий елемент
            }
            if ($l2->next != null) {
                $numberSecond .= $l2->val;
                $l2 = $l2->next;
            }
            if ($l1->next == null && $l2->next == null) { // если прошли в обоих списках то заканчиваем
                $numberFirst .= $l1->val;
                $numberSecond .= $l2->val;
                break;
            }
        }

        $numberFirst = strrev($numberFirst); // переворачиваем строку
        $numberSecond = strrev($numberSecond); // переворачиваем строку
        $summa = bcadd($numberFirst, $numberSecond); // складываем 2 числа с повышенной точностью
        $l3 = str_split($summa); // создаем массив с цифрами
        $node = null;
        foreach ($l3 as $item) {
            $node = new ListNode($item, $node); // создаем список
        }
        return $node;
    }
}