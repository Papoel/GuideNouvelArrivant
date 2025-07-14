<?php

namespace App\Form\DataTransformer;

use App\Enum\JobEnum;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class JobsArrayTransformer implements DataTransformerInterface
{
    /**
     * Transforme une collection d'objets JobEnum en tableau de valeurs string
     *
     * @param Collection|array|null $value
     * @return array
     */
    public function transform($value): array
    {
        if (null === $value) {
            return [];
        }

        if ($value instanceof Collection) {
            $result = [];
            foreach ($value as $job) {
                if ($job instanceof JobEnum) {
                    $result[] = $job->value;
                }
            }
            return $result;
        }

        if (is_array($value)) {
            return $value;
        }

        return [];
    }

    /**
     * Transforme un tableau de valeurs string en tableau de valeurs string
     * (l'entité s'occupera de la conversion en JobEnum)
     *
     * @param array|null $value
     * @return array
     */
    public function reverseTransform($value): array
    {
        if (null === $value) {
            return [];
        }

        if (!is_array($value)) {
            throw new TransformationFailedException('Expected an array.');
        }

        return $value;
    }
}
