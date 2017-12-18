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

}
