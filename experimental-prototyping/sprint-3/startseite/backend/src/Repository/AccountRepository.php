<?php
namespace Repository;

use Doctrine\ORM\EntityRepository;

class AccountRepository extends EntityRepository
{
    public function findByAccountNumber($accountNumber)
    {
        return $this->findOneBy(['accountNumber' => $accountNumber]);
    }
}