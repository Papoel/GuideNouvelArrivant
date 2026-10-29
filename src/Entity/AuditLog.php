<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AuditLogRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/** Journal d'audit des modifications ORM (insert, update, delete, collections).
 * Alimenté par App\Audit\AuditFlushListener lors de chaque flush Doctrine.
 */
#[ORM\Entity(repositoryClass: AuditLogRepository::class)]
#[ORM\Table(name: 'audit_log')]
#[ORM\Index(name: 'idx_audit_entity', columns: ['entity_class', 'entity_id'])]
#[ORM\Index(name: 'idx_audit_occurred_at', columns: ['occurred_at'])]
#[ORM\Index(name: 'idx_audit_actor', columns: ['actor_id'])]
class AuditLog
{
    public const ACTION_INSERT = 'INSERT';
    public const ACTION_UPDATE = 'UPDATE';
    public const ACTION_DELETE = 'DELETE';
    public const ACTION_COLLECTION_UPDATE = 'COLLECTION_UPDATE';

    public const ACTOR_USER = 'user';
    public const ACTOR_CONSOLE = 'console';
    public const ACTOR_ANONYMOUS = 'anonymous';

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    /** @phpstan-ignore property.unusedType (ID is assigned by Doctrine) */
    private ?int $id = null;

    #[ORM\Column]
    private \DateTimeImmutable $occurredAt;

    #[ORM\Column(length: 20)]
    private string $action;

    #[ORM\Column(name: 'entity_class', length: 255)]
    private string $entityClass;

    #[ORM\Column(name: 'entity_id', length: 64, nullable: true)]
    private ?string $entityId = null;

    #[ORM\Column(name: 'entity_label', length: 255, nullable: true)]
    private ?string $entityLabel = null;

    /** @var array<string, mixed>|null Différences avant/après ou snapshot de l'entité */
    #[ORM\Column(type: Types::JSON, nullable: true)]
    private ?array $changeset = null;

    #[ORM\Column(name: 'actor_type', length: 20)]
    private string $actorType;

    #[ORM\Column(name: 'actor_id', length: 64, nullable: true)]
    private ?string $actorId = null;

    #[ORM\Column(name: 'actor_label', length: 255, nullable: true)]
    private ?string $actorLabel = null;

    /** @var array<string, mixed>|null Contexte d'exécution (route, IP, commande) */
    #[ORM\Column(type: Types::JSON, nullable: true)]
    private ?array $context = null;

    /**
     * @param array{action: string, entityClass: string, entityId: ?string, changeset: ?array, actorType: string, actorId: ?string, actorLabel: ?string, context: ?array} $data
     */
    /** @param array{action: string, entityClass: string, entityId: string|null, entityLabel?: string|null, changeset: array<string, mixed>|null, actorType: string, actorId: string|null, actorLabel: string|null, context: array<string, mixed>|null} $data */
    public function __construct(array $data)
    {
        $this->occurredAt = new \DateTimeImmutable('now', new \DateTimeZone('Europe/Paris'));
        $this->action = $data['action'];
        $this->entityClass = $data['entityClass'];
        $this->entityId = $data['entityId'];
        $this->entityLabel = $data['entityLabel'] ?? null;
        $this->changeset = $data['changeset'];
        $this->actorType = $data['actorType'];
        $this->actorId = $data['actorId'];
        $this->actorLabel = $data['actorLabel'];
        $this->context = $data['context'];
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOccurredAt(): \DateTimeImmutable
    {
        return $this->occurredAt;
    }

    public function getAction(): string
    {
        return $this->action;
    }

    public function getEntityClass(): string
    {
        return $this->entityClass;
    }

    /** Retourne le nom court de la classe d'entité (ex: User). */
    public function getEntityShortClass(): string
    {
        $pos = strrpos($this->entityClass, '\\');

        return false === $pos ? $this->entityClass : substr($this->entityClass, $pos + 1);
    }

    public function getEntityId(): ?string
    {
        return $this->entityId;
    }

    public function getEntityLabel(): ?string
    {
        return $this->entityLabel;
    }

    /** Affichage compact "Classe · Libellé" pour les listes. */
    public function getEntityDisplay(): string
    {
        return null === $this->entityLabel ? $this->getEntityShortClass() : $this->getEntityShortClass() . ' · ' . $this->entityLabel;
    }

    /** @return array<string, mixed>|null */
    public function getChangeset(): ?array
    {
        return $this->changeset;
    }

    public function getActorType(): string
    {
        return $this->actorType;
    }

    public function getActorId(): ?string
    {
        return $this->actorId;
    }

    public function getActorLabel(): ?string
    {
        return $this->actorLabel;
    }

    /** @return array<string, mixed>|null */
    public function getContext(): ?array
    {
        return $this->context;
    }

    /** Résumé lisible des modifications, ex. "firstname : Bruce → Pascal". */
    public function getChangesSummary(): string
    {
        if (null === $this->changeset || [] === $this->changeset) {
            return '';
        }

        $parts = [];
        foreach ($this->changeset as $field => $change) {
            if (in_array($field, ['_cascade', '_attached'], true) && is_array($change)) {
                $prefix = '_attached' === $field ? 'Rattaché : ' : 'Cascade : ';
                $parts[] = $prefix . implode(', ', array_map(
                    static function (mixed $class, mixed $info): string {
                        $count = is_array($info) && is_numeric($info['count'] ?? null) ? (int) $info['count'] : 1;
                        return sprintf('%s ×%d', (string) $class, $count);
                    },
                    array_keys($change),
                    $change
                ));
                continue;
            }
            $label = \App\Audit\FieldLabels::label($this->entityClass, (string) $field);
            if (is_array($change) && array_key_exists('added', $change)) {
                $parts[] = sprintf('%s (+%d/-%d)', $label, count((array) $change['added']), count((array) $change['removed']));
            } elseif (is_array($change) && array_key_exists('old', $change)) {
                $parts[] = sprintf('%s : %s → %s', $label, $this->short($change['old']), $this->short($change['new']));
            } else {
                $parts[] = sprintf('%s = %s', $label, $this->short($change));
            }

            if (count($parts) >= 5) {
                $parts[] = '…';
                break;
            }
        }

        return implode(', ', $parts);
    }

    private function short(mixed $value): string
    {
        $text = match (true) {
            null === $value => '∅',
            is_bool($value) => $value ? 'true' : 'false',
            is_scalar($value) => (string) $value,
            default => (string) json_encode($value),
        };

        return mb_strlen($text) > 40 ? mb_substr($text, 0, 37) . '…' : $text;
    }

    /** Détail lisible des modifications, une ligne par champ — pour la page détail. */
    public function getChangesDetailedSummary(): string
    {
        if (null === $this->changeset || [] === $this->changeset) {
            return '';
        }

        $lines = [];
        foreach ($this->changeset as $field => $change) {
            if (in_array($field, ['_cascade', '_attached'], true) && is_array($change)) {
                $parts = [];
                foreach ($change as $class => $info) {
                    if (!is_array($info)) {
                        continue;
                    }
                    $part = sprintf('%s (%d)', (string) $class, is_numeric($info['count'] ?? null) ? (int) $info['count'] : 1);
                    if (!empty($info['items']) && is_array($info['items'])) {
                        $part .= ' : ' . implode(', ', array_map(static fn (mixed $item): string => is_string($item) ? $item : '', $info['items']));
                    }
                    $parts[] = $part;
                }
                $lines[] = ('_attached' === $field ? 'Éléments rattachés : ' : 'Suppressions en cascade : ') . implode(' · ', $parts);
                continue;
            }
            $label = \App\Audit\FieldLabels::label($this->entityClass, (string) $field);
            if (is_array($change) && array_key_exists('added', $change)) {
                $lines[] = sprintf('%s : +%s | -%s', $label, implode(', ', array_map(static fn (mixed $v): string => is_string($v) ? $v : '', (array) $change['added'])), implode(', ', array_map(static fn (mixed $v): string => is_string($v) ? $v : '', (array) $change['removed'])));
            } elseif (is_array($change) && array_key_exists('old', $change)) {
                $lines[] = sprintf('%s : %s → %s', $label, $this->shortValue($change['old']), $this->shortValue($change['new']));
            } else {
                $lines[] = sprintf('%s = %s', $label, $this->shortValue($change));
            }
        }

        return implode("\n", $lines);
    }

    /** Changements normalisés pour l'affichage détaillé.
     *
     * @return list<array{field: string, type: 'added'|'removed'|'update'|'collection'|'value'|'cascade'|'attached', old?: mixed, new?: mixed, value?: mixed, added?: array<int|string, mixed>, removed?: array<int|string, mixed>, summary?: array<int|string, mixed>}>
     */
    public function getNormalizedChanges(): array
    {
        if (null === $this->changeset) {
            return [];
        }

        $changes = [];
        foreach ($this->changeset as $field => $change) {
            if ('_attached' === $field && is_array($change)) {
                $changes[] = ['field' => 'Éléments rattachés', 'type' => 'attached', 'summary' => $change];
                continue;
            }
            if ('_cascade' === $field && is_array($change)) {
                $changes[] = ['field' => 'Suppressions en cascade', 'type' => 'cascade', 'summary' => $change];
                continue;
            }
            $label = \App\Audit\FieldLabels::label($this->entityClass, (string) $field);

            if (is_array($change) && array_key_exists('added', $change)) {
                $changes[] = ['field' => $label, 'type' => 'collection', 'added' => (array) $change['added'], 'removed' => (array) $change['removed']];
            } elseif (is_array($change) && array_key_exists('old', $change)) {
                $changes[] = [
                    'field' => $label,
                    'type' => match (true) {
                        null === $change['old'] => 'added',
                        null === $change['new'] => 'removed',
                        default => 'update',
                    },
                    'old' => $this->displayValue($change['old']),
                    'new' => $this->displayValue($change['new']),
                ];
            } else {
                $changes[] = ['field' => $label, 'type' => 'value', 'value' => $this->displayValue($change)];
            }
        }

        return $changes;
    }

    public function getActionLabel(): string
    {
        return match ($this->action) {
            self::ACTION_INSERT => 'Création',
            self::ACTION_UPDATE => 'Modification',
            self::ACTION_DELETE => 'Suppression',
            self::ACTION_COLLECTION_UPDATE => 'Liaisons modifiées',
            default => $this->action,
        };
    }

    public function getActorTypeLabel(): string
    {
        return match ($this->actorType) {
            self::ACTOR_USER => 'Utilisateur',
            self::ACTOR_CONSOLE => 'Console',
            self::ACTOR_ANONYMOUS => 'Anonyme',
            default => $this->actorType,
        };
    }

    private function displayValue(mixed $value): string
    {
        $text = match (true) {
            null === $value => '∅',
            is_bool($value) => $value ? 'oui' : 'non',
            is_scalar($value) => (string) $value,
            default => (string) json_encode($value, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
        };

        return mb_strlen($text) > 500 ? mb_substr($text, 0, 497) . '…' : $text;
    }

    /** JSON lisible du contexte — pour la page détail. */
    public function getContextPrettyJson(): string
    {
        return null === $this->context ? '' : (string) json_encode($this->context, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    private function shortValue(mixed $value): string
    {
        $text = match (true) {
            null === $value => '∅',
            is_bool($value) => $value ? 'true' : 'false',
            is_scalar($value) => (string) $value,
            default => (string) json_encode($value, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
        };

        return mb_strlen($text) > 200 ? mb_substr($text, 0, 197) . '…' : $text;
    }
}
