<?php

declare(strict_types=1);

namespace App\Message;

final class WeeklyReminderEmailMessage
{
    public function __construct(
        public readonly \DateTimeImmutable $triggeredAt
    ) {
    }
}
