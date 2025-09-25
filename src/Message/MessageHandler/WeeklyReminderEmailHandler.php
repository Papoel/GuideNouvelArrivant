<?php

declare(strict_types=1);

namespace App\Message\MessageHandler;

use App\Message\WeeklyReminderEmailMessage;
use App\Services\Mail\WeeklyReminderEmailService;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class WeeklyReminderEmailHandler
{
    public function __construct(
        private readonly WeeklyReminderEmailService $reminderService
    ) {
    }

    public function __invoke(WeeklyReminderEmailMessage $message): void
    {
        // Service envoie d'email
        $this->reminderService->send($message->triggeredAt);
    }
}
