<?php

/*

1. Two Sum

Given an array of integers nums and an integer target, return indices of the two numbers such that they add up to target.

You may assume that each input would have exactly one solution, and you may not use the same element twice.

You can return the answer in any order.


Example 1:

Input: nums = [2,7,11,15], target = 9
Output: [0,1]
Explanation: Because nums[0] + nums[1] == 9, we return [0, 1].

Example 2:

Input: nums = [3,2,4], target = 6
Output: [1,2]

Example 3:

Input: nums = [3,3], target = 6
Output: [0,1]

Constraints:

    2 <= nums.length <= 104
    -109 <= nums[i] <= 109
    -109 <= target <= 109
    Only one valid answer exists.


Follow-up: Can you come up with an algorithm that is less than O(n2) time complexity?

 */

class Solution
{
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target)
    {
        $count = count($nums); // получаем количество элементов в массиве, именно заранее что бы не делать это по циклу
        $map = []; // создаем переменную для хранения вычисляемого значения и поиска по ключу нужной позиции со сложностью O(1)
        for ($i = 0; $i < $count; $i++) { // запускаем цикл для прохода по всем елементам массива с линейно сложность O(n)
            if (isset($map[$nums[$i]])) { // проверяем есть ли у нас в вычесленных значениях текущий елемент массива
                return [$map[$nums[$i]], $i]; // если есть значит возвращаем наш сохранненый ключ и наш текущий так как они дали в паре $target
            } else {
                // если $target наша цель значит мы можем получить ее как $target - n = X, сохранить X как ключ а ключ как значение,
                // и проверять на каждой итерации цикла что наш текущий елемент есть в $map
                $map[$target - $nums[$i]] = $i;
            }
        }
        return []; // вернем на всякий пустой массив что бы тесты не зафейлить
    }
    // второй вариант реализации
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSumSecond($nums, $target)
    {
        $flippedNums = array_flip($nums); // создаем новый инвертированный массив где ключи это значения а значения ключи
        foreach ($nums as $key => $val) { // идем по всем елементам массива
            if (isset($flippedNums[$target - $val]) && $key != $flippedNums[$target - $val]) { // проверяем что $target - текущий елемент есть в массиве и ключи разные
                return [$key, $flippedNums[$target - $val]]; // возвращаем ключи в парядке прохода
            }
        }
        return [];
    }
}