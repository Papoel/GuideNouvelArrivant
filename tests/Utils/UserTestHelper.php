<?php

declare(strict_types=1);

namespace App\Tests\Utils;

use App\Entity\User;

class UserTestHelper
{
    public static function createUser(array $attributes = []): User
    {
        $uniqueId = uniqid(prefix: '', more_entropy: true);
        $user = new User();
        $user->setFirstname(firstname: $attributes['firstname'] ?? 'Bruce');
        $user->setLastname(lastname: $attributes['lastname'] ?? 'Wayne');
        $user->setEmail(email: $attributes['email'] ?? self::generateUniqueEmail());
        $user->setNni(nni: $attributes['nni'] ?? self::generateUniqueNni());
        $user->setPassword(password: $attributes['password'] ?? 'password');

        return $user;
    }

    private static function generateUniqueEmail(string $prefix = 'user'): string
    {
        return $prefix . uniqid() . '@gotham.city';
    }

    private static function generateUniqueNni(): string
    {
        $letter = chr(random_int(65, 90)); // Génère une lettre majuscule aléatoire (A-Z)
        $numbers = str_pad((string)random_int(0, 99999), length: 5, pad_string: '0', pad_type: STR_PAD_LEFT); // Génère 5 chiffres avec des zéros à gauche si nécessaire
        return $letter . $numbers;
    }

    public static function createAdminUser(): User
    {
        $user = self::createUser(['email' => 'admin' . uniqid() . '@example.com']);
        $user->setRoles(['ROLE_ADMIN']);
        return $user;
    }
}
