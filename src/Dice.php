<?php

namespace Dice;

class Dice
{
    public static function rollOne(int $sides)
    {
        return (random_int(1, $sides));
    }

    public static function roll(int $number, int $sides)
    {
        $rolls = [];
        for ($i = 0; $i < $number; $i++) {
            $rolls[] = self::rollOne($sides);
        }

        return $rolls;
    }

    public static function rollLow($number, $sides, $factor = 2)
    {
        $rolls = self::rollHigh($number, $sides, $factor);
        foreach ($rolls as $num => $roll) {
            $rolls[$num] = $sides + 1 - $roll;
        }

        return $rolls;
    }

    public static function rollHigh(int $number, int $sides, float $factor = 2)
    {
        $sides = (int)floor(pow($sides, $factor));
        $rolls = [];
        for ($i = 0; $i < $number; $i++) {
            $rolls[] = (int)ceil(pow(self::rollOne($sides), 1 / $factor));
        }

        return $rolls;
    }
}
