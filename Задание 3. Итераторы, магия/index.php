<?php
  declare(strict_types=1);
  require_once('autoload.php');

  // Создаем объекты Person
  $student1 = new Person('Иван', 'Петров', 18);
  $student2 = new Person('Петр', 'Иванов', 30);
  $student3 = new Person('Мария', 'Зайцева', 52);

  // Создаем объект PeopleList и добавляем людей в список
  $peopleList = new PeopleList();
  $peopleList->addPerson($student1);
  $peopleList->addPerson($student2);
  $peopleList->addPerson($student3);

  foreach ($peopleList as $person) {
    echo $person . PHP_EOL;  
  }

  // использование магических методов
  $student1->stipends = 'Ежемесячная стипендия - 10000 рублей'; //добавляем свойство (__set())
  echo $student1->stipends;                                     //получаем значение (__get())

  // сериализация объекта
  $serializedStudent1 = serialize($student1);
  echo $serializedStudent1 . PHP_EOL;

  // замена значения в строке
  $replaceString = str_replace('Иван', 'Алексей', $serializedStudent1);
  echo $replaceString . PHP_EOL;

  // десериализация объекта
  $unserializedStudent1 = unserialize($serializedStudent1);
  echo $unserializedStudent1->name . PHP_EOL;
  echo $unserializedStudent1->surname . PHP_EOL;
  echo $unserializedStudent1->age . PHP_EOL;

