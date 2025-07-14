<?php

namespace App\Form\DataTransformer;

use App\Enum\JobEnum;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

/**
 * @implements DataTransformerInterface<Collection<int, JobEnum>|array<string>, array<string>>
 */
class JobsArrayTransformer implements DataTransformerInterface
{
    /**
     * Transforme une collection d'objets JobEnum en tableau de valeurs string
     *
     * @param Collection<int, JobEnum>|array<string>|null $value
     * @return array<string>
     */
    public function transform($value): array
    {
        if (null === $value) {
            return [];
        }

        if ($value instanceof Collection) {
            $result = [];
            foreach ($value as $job) {
                // We know from the PHPDoc that $job is JobEnum, but we need to keep this check
                // for runtime safety as Collection could contain other types
                /** @var mixed $job */
                if ($job instanceof JobEnum) {
                    $result[] = $job->value;
                }
            }
            return $result;
        }

        // We know from the PHPDoc that $value is either Collection, array or null at this point
        // Since we've handled Collection and null, it must be an array
        /** @var array<string> $value */
        return $value;
    }

    /**
     * Transforme un tableau de valeurs string en tableau de valeurs string
     * (l'entité s'occupera de la conversion en JobEnum)
     *
     * @param array<string>|null $value
     * @return array<string>
     */
    public function reverseTransform($value): array
    {
        if (null === $value) {
            return [];
        }

        // This check is kept for runtime safety, even though PHPStan knows $value is an array from PHPDoc
        /** @var mixed $value */
        if (!is_array($value)) {
            throw new TransformationFailedException('Expected an array.');
        }

        /** @var array<string> $value */
        return $value;
    }
}
