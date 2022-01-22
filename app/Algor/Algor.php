<?php

namespace App\Algor;

class Algor
{
    public static function calculate($min, $max, $deltaX, $num): array
    {
        $total = array();
        for ($i = $min; $deltaX > 0 ? $i <= $max : $i >= $max; $i += $deltaX) {
            if ($num % 2 == 0)
                $total[] = self::funMax($i, $num);
            else
                $total[] = self::funMin($i, $num);
        }
        return $total;
    }

    private static function funMax($deltaX, $num): array
    {
        $result = array();
        $result['deltaX'] = $deltaX;
        $result['error'] = array();

        $sin = sin($deltaX + $num);
        $cos = cos($deltaX);
        $log = (1 - $num) / $sin;
        if ($sin == 0 || $deltaX == 0)
            $result['error'][] = 'Division by 0 or sin(x + num) is 0';
        if ($cos == 0)
            $result['error'][] = 'Cos(x) is 0';
        if ($log < 0)
            $result['error'][] = 'Logarithm of negative number';

        $first = log($log, 21);
        $second = abs($cos / $num);
        $maxResult = max($first, $second);

        $result['f1'] = $first;
        $result['f2'] = $second;
        $result['result'] = is_nan($first) || is_nan($second) ? 'Error' : $maxResult;

        return $result;
    }

    private static function funMin($deltaX, $num): array
    {
        $result = array();
        $result['deltaX'] = $deltaX;
        $result['error'] = array();

        $cos = cos($deltaX - $num);
        $sin = sin($deltaX);
        $log = (1 - $num) / $cos;
        if ($cos == 0 || $deltaX == 0)
            $result['error'][] = 'Division by 0 or cos(x + num) is 0';
        if ($sin == 0)
            $result['error'][] = 'Sin(x) is 0';
        if ($log < 0)
            $result['error'][] = 'Logarithm of negative number';

        $first = log($log, 21);
        $second = $sin / $num;
        $minResult = min($first, $second);

        $result['f1'] = $first;
        $result['f2'] = $second;
        $result['result'] = is_nan($first) || is_nan($second) ? 'Error' : $minResult;

        return $result;
    }
}
