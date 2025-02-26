<?php

namespace App\Enums;

enum TeacherStatus: int
{
    case Pending = 0;
    case Approved = 1;
    case Refused = 2;

    public static function labels(): array
    {
        return [
            self::Pending->value => trans('teachers.pending'),
            self::Approved->value => trans('teachers.approved'),
            self::Refused->value => trans('teachers.refused'),
        ];
    }
}
