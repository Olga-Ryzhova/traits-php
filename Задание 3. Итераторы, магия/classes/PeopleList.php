<?php
  declare(strict_types=1);

  class PeopleList implements Iterator 
  {
    private array $people = [];
    private int $position = 0;

    // Метод для добавления людей в список:
    public function addPerson(Person $person): void {
      $this->people[] = $person;
    }

    // Реализация методов интерфейса Iterator:
    public function current(): Person {
      return $this->people[$this->position];
    }

    public function key(): int {
      return $this->position;
    }

    public function next(): void {
      $this->position++;
    }

    public function rewind(): void {
      $this->position = 0;
    }

    public function valid(): bool {
      return isset($this->people[$this->position]);
    }
  }   