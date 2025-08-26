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

    public function icon(): string
    {
        return match($this) {
            self::IN => '<svg class="w-5 h-5 text-green-500 inline" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v12m0 0l-4-4m4 4l4-4" />
                                    </svg>',
            self::OUT => '<svg class="w-5 h-5 text-red-500 inline" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21V9m0 0l-4 4m4-4l4 4" />
                                    </svg>'
        };
    }
}
