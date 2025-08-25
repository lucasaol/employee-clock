<?php

namespace App\Enums;

enum TimeRecordType: string
{
    case IN = 'in';
    case OUT = 'out';

    public function label(): string
    {
        return match($this) {
            self::IN => 'Entrada',
            self::OUT => 'Saída'
        };
    }
}
