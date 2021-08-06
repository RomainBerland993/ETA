<?php

namespace App\Tests;

use App\Entity\Type;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

class TypeEntityTest extends TestCase
{
    public function testIsTrue()
    {
        $type = new Type();
        $datetime = new DateTimeImmutable();

        $type
            ->setLabel('test')
            ->setCreatedAt($datetime)
            ->setUpdatedAt($datetime)
        ;

        $this->assertTrue($type->getLabel() === 'test');
        $this->assertTrue($type->getCreatedAt() === $datetime);
        $this->assertTrue($type->getUpdatedAt() === $datetime);
    }

    public function testIsFalse()
    {
        $type = new Type();
        $datetime = new DateTimeImmutable();

        $type
            ->setLabel('test')
            ->setCreatedAt($datetime)
            ->setUpdatedAt($datetime)
        ;
        
        $this->assertFalse($type->getLabel() === 'false');
        $this->assertFalse($type->getCreatedAt() === new DateTimeImmutable());
        $this->assertFalse($type->getUpdatedAt() === new DateTimeImmutable());
    }

    public function testIsEmpty()
    {
        $type = new Type();

        $this->assertEmpty($type->getLabel());
        $this->assertEmpty($type->getCreatedAt());
        $this->assertEmpty($type->getUpdatedAt());
    }
}
