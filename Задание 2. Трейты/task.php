<?php
  declare(strict_types=1);

  trait AppUserAuthentication 
  {
    public string $login;
    public string $password;

    public function authenticate(string $login, string $password) {
      $this->login = $login;
      $this->password = $password;

      echo "Вы авторизовались как пользователь приложения." . PHP_EOL;
    }
  }

  trait MobileUserAuthentication 
  {
    public string $login;
    public string $password;

    public function authenticate(string $login, string $password) {
      $this->login = $login;
      $this->password = $password;
      
      echo "Вы авторизовались как пользователь мобильного приложения." . PHP_EOL;
    }
  }

  class User 
  {
    use AppUserAuthentication, MobileUserAuthentication {
      AppUserAuthentication::authenticate as authenticateApp;
      MobileUserAuthentication::authenticate as authenticateMobile;
    }

    private $traitChoice;

    public function __construct($traitChoice) {
      $this->traitChoice = $traitChoice;
    }

    public function authenticate(string $login, $password) {
      if ($this->traitChoice === 'app') {
        $this->authenticateApp($login, $password); 
      } elseif ($this->traitChoice === 'mobile') {
        $this->authenticateMobile($login, $password);
      } else {
        echo "Выбран неверный трейт." . PHP_EOL;
      }
    } 
  }

  $user = new User('app'); 
  $user->authenticate('app_user', 'app_password'); 

  $user = new User('mobile');
  $user->authenticate('mobile_user', 'mobile_password'); 

  $user = new User('site');
  $user->authenticate('site_user', 'site_password'); 