<?php

namespace App\Tests\Entity;

use App\Entity\Customers;
use Doctrine\Persistence\ObjectManager;
use PHPUnit\Framework\TestCase;

class CustomersTest extends TestCase
{
    public function testCustomerExist(ObjectManager $objectManager): void
    {
        $id = 0;
        //$objectManager = $objectManager;

        $customers = $objectManager->getRepository(Customers::class);
        $employee = $customers->find($id);
        $this->assertIsObject($employee);

        $this->assertTrue(true);
    }
    /*
    public function testSomething(): void
    {
        $this->assertTrue(true);
    }
    */



}
