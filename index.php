<?php

/**
 * Генерирует массив из 100 элементов, подходящий под решение задачи
 * @return array{0: array<int, int>, 1: int}
 */
function getTestCase(): array
{
    $pairsCount = 0;
    $arr = [];
    $previousElement = rand(0, 50);
    $arr[0] = $previousElement;

    for ($i = 1; $i < 100; $i++) {
        if (rand(0, 3) === 0) {
            $arr[$i] = $previousElement;
            $pairsCount++;
        } else {
            $arr[$i] = rand(0, 50);
            while($arr[$i] === $previousElement){
                $arr[$i] = rand(0, 50);
            }
        }
        $previousElement = $arr[$i];
    }

    return [$arr, $pairsCount];
}

/**
 * РЕШЕНИЕ ЗАДАЧИ
 * @param array $array
 * @return int
 */
function solution(array $array): int
{
    $pairsCount = 0;
    for ($i = 0; $i < count($array) - 1; $i++) {
        if ($array[$i] === $array[$i + 1]) {
            $pairsCount++;
        }
    }

    return $pairsCount;
}

// ЗАПУСК ПРОВЕРКИ РЕШЕНИЯ ЗАДАЧИ
[$array, $expectedResult] = getTestCase();
if (($result = solution($array)) === $expectedResult) {
    exit("успешно: ожидалось $expectedResult, решение вернуло $result");
}
exit("неуспешно: ожидалось $expectedResult, решение вернуло $result");