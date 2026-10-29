<?php

declare(strict_types=1);

namespace App\Tests\Audit;

use App\Audit\AuditContext;
use App\Audit\AuditNotificationSubscriber;
use PHPUnit\Framework\Attributes\AllowMockObjectsWithoutExpectations;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\MockArraySessionStorage;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\HttpFoundation\RequestStack;

#[AllowMockObjectsWithoutExpectations]
class AuditNotificationSubscriberTest extends TestCase
{
    private AuditContext $context;
    private AuditNotificationSubscriber $subscriber;

    protected function setUp(): void
    {
        /** @var TokenStorageInterface&MockObject $tokenStorage */
        $tokenStorage = $this->createMock(TokenStorageInterface::class);
        $this->context = new AuditContext($tokenStorage, new RequestStack());
        $this->subscriber = new AuditNotificationSubscriber($this->context);
    }

    private function eventFor(string $path): ResponseEvent
    {
        $request = Request::create($path);
        $request->setSession(new Session(new MockArraySessionStorage()));
        /** @var HttpKernelInterface&MockObject $kernel */
        $kernel = $this->createMock(HttpKernelInterface::class);

        return new ResponseEvent($kernel, $request, KernelInterface::MAIN_REQUEST, new Response());
    }

    #[Test]
    public function flashAddedOnAdminPathWhenAuditWritten(): void
    {
        $this->context->addFlushedCount(3);
        $event = $this->eventFor('/admin/audit-log');

        $this->subscriber->onKernelResponse($event);

        $flashes = $event->getRequest()->getSession()->getFlashBag()->peek('info');
        $this->assertCount(1, $flashes);
        $this->assertStringContainsString('3 modification(s)', $flashes[0]);
    }

    #[Test]
    public function noFlashOutsideAdminPaths(): void
    {
        $this->context->addFlushedCount(2);
        $event = $this->eventFor('/dashboard/mentor');

        $this->subscriber->onKernelResponse($event);

        $this->assertCount(0, $event->getRequest()->getSession()->getFlashBag()->peek('info'));
    }

    #[Test]
    public function noFlashWhenNothingAudited(): void
    {
        $event = $this->eventFor('/admin/user');

        $this->subscriber->onKernelResponse($event);

        $this->assertCount(0, $event->getRequest()->getSession()->getFlashBag()->peek('info'));
    }

    #[Test]
    public function managerPathIsCovered(): void
    {
        $this->context->addFlushedCount(1);
        $event = $this->eventFor('/manager/progress');

        $this->subscriber->onKernelResponse($event);

        $this->assertCount(1, $event->getRequest()->getSession()->getFlashBag()->peek('info'));
    }
}
