<?php
namespace Service;

use Doctrine\ORM\EntityManager;

class AccountService
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getBalance($accountNumber)
    {
        $account = $this->entityManager->getRepository('Entity\\Account')->findOneBy(['accountNumber' => $accountNumber]);
        return $account ? $account->getBalance() : 0;
    }
}