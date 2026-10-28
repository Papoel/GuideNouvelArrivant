<?php

declare(strict_types=1);

namespace App\Tests\Audit;

use App\Audit\FieldLabels;
use App\Entity\Service;
use App\Entity\User;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class FieldLabelsTest extends TestCase
{
    #[Test]
    public function knownFieldsAreTranslated(): void
    {
        $this->assertSame('Prénom', FieldLabels::label(User::class, 'firstname'));
        $this->assertSame('Tuteur', FieldLabels::label(User::class, 'mentor'));
        $this->assertSame('Chef de service', FieldLabels::label(Service::class, 'chef'));
    }

    #[Test]
    public function genericLabelsApplyToAnyEntity(): void
    {
        $this->assertSame('Créé le', FieldLabels::label(Service::class, 'createdAt'));
        $this->assertSame('Rôles', FieldLabels::label(Service::class, 'roles'));
    }

    #[Test]
    public function unknownFieldsAreHumanized(): void
    {
        $this->assertSame('Some custom field', FieldLabels::label(Service::class, 'someCustomField'));
    }
}
