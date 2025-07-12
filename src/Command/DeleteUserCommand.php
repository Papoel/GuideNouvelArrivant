<?php

declare(strict_types=1);

namespace App\Command;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class DeleteUserCommand extends Command
{
    public const CMD_NAME = 'app:delete:user';

    private SymfonyStyle $io;

    public function __construct(
        private readonly EntityManagerInterface $em,
        private readonly UserPasswordHasherInterface $passwordHasher,
    ) {
        parent::__construct(name: self::CMD_NAME);
    }

    protected function initialize(InputInterface $input, OutputInterface $output): void
    {
        $this->io = new SymfonyStyle(input: $input, output: $output);
    }

    /** @throws \Exception */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $lastname = $this->io->ask(question: 'Quel est le nom de l\'utilisateur ?');
        $nni = $this->io->ask(question: 'Quel est le NNI de l\'utilisateur ?');

        // Rechercher l'utilisateur par son nom et son NNI
        $user = $this->em->getRepository(User::class)->findOneBy(['lastname' => $lastname, 'nni' => $nni]);

        if (!$user) {
            $this->io->error('L\'utilisateur n\'a pas été trouvé.');

            return Command::FAILURE;
        }

        // Supprimer l'utilisateur
        $this->em->remove($user);
        $this->em->flush();

        $this->io->success('L\'utilisateur a bien été éffacé.');

        return Command::SUCCESS;
    }
}
