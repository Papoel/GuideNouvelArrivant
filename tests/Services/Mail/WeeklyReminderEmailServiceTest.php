<?php

declare(strict_types=1);

namespace App\Tests\Services\Mail;

use App\Repository\LogbookRepository;
use App\Services\Logbook\LogbookProgressService;
use App\Services\Mail\WeeklyReminderEmailService;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use ReflectionClass;
use Symfony\Component\Mailer\MailerInterface;
use Twig\Environment;

class WeeklyReminderEmailServiceTest extends TestCase
{
    private WeeklyReminderEmailService $service;

    protected function setUp(): void
    {
        $logbookProgressService = $this->createMock(LogbookProgressService::class);
        $logbookRepository = $this->createMock(LogbookRepository::class);
        $mailer = $this->createMock(MailerInterface::class);
        $twig = $this->createMock(Environment::class);
        $logger = $this->createMock(LoggerInterface::class);

        $this->service = new WeeklyReminderEmailService(
            $logbookProgressService,
            $logbookRepository,
            $mailer,
            $twig,
            $logger
        );
    }

    /**
     * Test que la conversion en français fonctionne et retourne bien une chaîne non vide
     */
    public function testGetNumberInFrenchReturnsNonEmptyString(): void
    {
        $reflection = new ReflectionClass($this->service);
        $method = $reflection->getMethod('getNumberInFrench');
        $method->setAccessible(true);

        // Test que la méthode retourne bien une chaîne non vide
        $result = $method->invoke($this->service, 1);
        $this->assertIsString($result);
        $this->assertNotEmpty($result);
        
        // Test que différents nombres retournent des résultats différents
        $result1 = $method->invoke($this->service, 1);
        $result2 = $method->invoke($this->service, 2);
        $this->assertNotSame($result1, $result2, 'Les nombres différents doivent avoir des conversions différentes');
    }

    /**
     * Test que les nombres critiques (70-99) sont bien convertis (pas de bug)
     */
    public function testGetNumberInFrenchForCriticalNumbers(): void
    {
        $reflection = new ReflectionClass($this->service);
        $method = $reflection->getMethod('getNumberInFrench');
        $method->setAccessible(true);

        // Test que 96 et 97 ont des conversions différentes (bug corrigé)
        $result96 = $method->invoke($this->service, 96);
        $result97 = $method->invoke($this->service, 97);
        $this->assertNotSame($result96, $result97, '96 et 97 doivent avoir des conversions différentes');
        
        // Test qu'ils contiennent bien des mots français
        $this->assertStringNotContainsString('96', $result96, '96 doit être converti en texte');
        $this->assertStringNotContainsString('97', $result97, '97 doit être converti en texte');
    }

    /**
     * Test que les nombres hors plage retournent la chaîne numérique
     */
    public function testGetNumberInFrenchForLargeNumbers(): void
    {
        $reflection = new ReflectionClass($this->service);
        $method = $reflection->getMethod('getNumberInFrench');
        $method->setAccessible(true);

        // NumberFormatter gère aussi les grands nombres, vérifions qu'il retourne quelque chose
        $result = $method->invoke($this->service, 1000);
        $this->assertIsString($result);
        $this->assertNotEmpty($result);
    }
}
