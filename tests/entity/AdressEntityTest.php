<?php

namespace App\Tests;

use App\Entity\Users;
use App\Entity\Adress;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

class AdressEntityTest extends TestCase
{
    public function testIsTrue()
    {
        $adresse = new Adress();
        $datetime = new DateTimeImmutable();
        $user = new Users();

        $adresse
            ->setAdress('2 rue de la raterie')
            ->setPostalCode('86100')
            ->setCity('avanton')
            ->setCreatedAt($datetime)
            ->setUpdatedAt($datetime)
            ->addUser($user)
        ;

        $this->assertTrue($adresse->getAdress() === '2 rue de la raterie');
        $this->assertTrue($adresse->getPostalCode() === '86100');
        $this->assertTrue($adresse->getCity() === 'avanton');
        $this->assertTrue($adresse->getCreatedAt() === $datetime);
        $this->assertTrue($adresse->getUpdatedAt() === $datetime);
        $this->assertContains($user, $adresse->getUser());
    }

    public function testIsFalse()
    {
        $adresse = new Adress();
        $datetime = new DateTimeImmutable();
        $user = new Users();

        $adresse
            ->setAdress('2 rue de la raterie')
            ->setPostalCode('86100')
            ->setCity('avanton')
            ->setCreatedAt($datetime)
            ->setUpdatedAt($datetime)
            ->addUser($user)
        ;
        
        $this->assertFalse($adresse->getAdress() === 'false');
        $this->assertFalse($adresse->getPostalCode() === 'false');
        $this->assertFalse($adresse->getCity() === 'false');
        $this->assertFalse($adresse->getCreatedAt() === new DateTimeImmutable());
        $this->assertFalse($adresse->getUpdatedAt() === new DateTimeImmutable());
        $this->assertNotContains(new Users(), $adresse->getUser());
    }

    public function testIsEmpty()
    {
        $adresse = new Adress();
        
        $this->assertEmpty($adresse->getAdress());
        $this->assertEmpty($adresse->getPostalCode());
        $this->assertEmpty($adresse->getCity());
        $this->assertEmpty($adresse->getCreatedAt());
        $this->assertEmpty($adresse->getUpdatedAt());
        $this->assertEmpty($adresse->getUser());
    }
}
