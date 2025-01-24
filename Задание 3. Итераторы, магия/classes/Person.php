<?php
  declare(strict_types=1);

  class Person 
  {
    public string $name;
    public string $surname;
    public int $age;
    public string $college = "Строительный";

    private $originalAge;
    private $stipend = [];

    public function __construct(string $name, string $surname, int $age) {
      $this->name = $name;
      $this->surname = $surname;
      $this->age = $age;
      $this->originalAge = $age;
    }

    public function getStudentData(): void {
      echo "Имя студента: $this->name, его возраст: $this->age" . PHP_EOL;
    }

    public function getSchoolName(): string {
      return 'Название колледжа: ' . $this->college  . PHP_EOL;  
    }

    // магический метод __set():
    public function __set($name, $value) {
      $this->stipend[$name] = $value . PHP_EOL;
    }

    // магический метод __get():
    public function __get($name) {
      return $this->stipend[$name] ?? null;
    }

    // магический метод __sleep():
    public function __sleep() {
      return ['name', 'surname', 'originalAge'];
    }

    // магический метод wakeup():
    public function __wakeup() {
      // Восстанавливаем оригинальное значение age
      $this->age = $this->originalAge;
    }

    // магический метод __toString():
    public function __toString() {
      return 'Студент: ' . $this->name . ' ' . $this->surname . ', возраст: ' . $this->age;
    }
  }