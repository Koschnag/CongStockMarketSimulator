<?php
namespace Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Doctrine\ORM\EntityManager;

class AccountController
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getBalance(Request $request, Response $response, $args)
    {
        $accountNumber = $request->getQueryParams()['accountNumber'];
        $account = $this->entityManager->getRepository('Entity\\Account')->findOneBy(['accountNumber' => $accountNumber]);
        $balance = $account ? $account->getBalance() : 0;
        $response->getBody()->write(json_encode(['balance' => $balance]));
        return $response->withHeader('Content-Type', 'application/json');
    }
}