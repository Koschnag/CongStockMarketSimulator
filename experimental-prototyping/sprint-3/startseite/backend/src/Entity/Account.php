<?php
namespace Entity;

/**
 * @Entity @Table(name="accounts")
 **/
class Account
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /** @Column(type="string") **/
    protected $accountNumber;

    /** @Column(type="decimal") **/
    protected $balance;

    public function getBalance()
    {
        return $this->balance;
    }
}