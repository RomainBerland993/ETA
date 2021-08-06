<?php

namespace App\Tests;

use DateTimeImmutable;
use App\Entity\Category;
use App\Entity\Discipline;
use App\Entity\Event;
use PHPUnit\Framework\TestCase;

class DisciplineEntityTest extends TestCase
{
    public function testIsTrue()
    {
        $discipline = new Discipline();
        $datetime = new DateTimeImmutable();
        $category = new Category();
        $event = new Event();

        $discipline
            ->setName('test')
            ->setCreatedAt($datetime)
            ->setUpdatedAt($datetime)
            ->addCategory($category)
            ->setEvent($event)
        ;

        $this->assertTrue($discipline->getName() === 'test');
        $this->assertTrue($discipline->getCreatedAt() === $datetime);
        $this->assertTrue($discipline->getUpdatedAt() === $datetime);
        $this->assertContains($category, $discipline->getCategory());
        $this->assertTrue($discipline->getEvent() === $event);
    }

    public function testIsFalse()
    {
        $discipline = new Discipline();
        $datetime = new DateTimeImmutable();
        $category = new Category();
        $event = new Event();        
        
        $discipline
            ->setName('test')
            ->setCreatedAt($datetime)
            ->setUpdatedAt($datetime)
            ->addCategory($category)
            ->setEvent($event)
        ;

        $this->assertFalse($discipline->getName() === 'false');
        $this->assertFalse($discipline->getCreatedAt() === new DateTimeImmutable());
        $this->assertFalse($discipline->getUpdatedAt() === new DateTimeImmutable());
        $this->assertNotContains(new Category(), $discipline->getCategory());
        $this->assertFalse($discipline->getEvent() === new Event());
    }

    public function testIsEmpty()
    {        
        $discipline = new Discipline();
        
        $this->assertEmpty($discipline->getName());
        $this->assertEmpty($discipline->getCreatedAt());
        $this->assertEmpty($discipline->getUpdatedAt());
        $this->assertEmpty($discipline->getCategory());
        $this->assertEmpty($discipline->getEvent());
    }
}
