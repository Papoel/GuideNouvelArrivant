<?php

declare(strict_types=1);

namespace App\Tests\Audit;

use App\Audit\AuditContext;
use PHPUnit\Framework\Attributes\AllowMockObjectsWithoutExpectations;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

#[AllowMockObjectsWithoutExpectations]
class AuditContextTest extends TestCase
{
    private AuditContext $context;

    protected function setUp(): void
    {
        /** @var TokenStorageInterface&MockObject $tokenStorage */
        $tokenStorage = $this->createMock(TokenStorageInterface::class);
        $this->context = new AuditContext($tokenStorage, new RequestStack());
    }

    #[Test]
    public function mergedContextIsExposedInContext(): void
    {
        $this->context->mergeContext(['template' => 'Carnet standard']);
        $this->context->mergeContext(['batch' => 42]);

        $ctx = $this->context->context();
        $this->assertSame('Carnet standard', $ctx['template']);
        $this->assertSame(42, $ctx['batch']);
    }

    #[Test]
    public function resetClearsExtraContextAndFlushedCount(): void
    {
        $this->context->mergeContext(['template' => 'Carnet standard']);
        $this->context->addFlushedCount(3);

        $this->context->reset();

        // Simule la requête suivante : le contexte métier a disparu,
        // seul le contexte HTTP de la nouvelle requête reste.
        $this->assertSame([], $this->context->context());
        $this->assertSame(0, $this->context->getFlushedCount());
    }

    #[Test]
    public function requestContextSurvivesReset(): void
    {
        $requestStack = new RequestStack();
        $request = Request::create('/admin/audit-log');
        $request->attributes->set('_route', 'admin_audit_log');
        $requestStack->push($request);

        /** @var TokenStorageInterface&MockObject $tokenStorage */
        $tokenStorage = $this->createMock(TokenStorageInterface::class);
        $context = new AuditContext($tokenStorage, $requestStack);
        $context->mergeContext(['template' => 'X']);
        $context->reset();

        $ctx = $context->context();
        $this->assertArrayNotHasKey('template', $ctx);
        $this->assertSame('admin_audit_log', $ctx['route'] ?? null);
        $this->assertArrayHasKey('ip', $ctx);
    }
}
