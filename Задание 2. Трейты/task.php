<?php
  declare(strict_types=1);

  trait AppUserAuthentication 
  {
    private string $appLogin = 'app_user';
    private string $appPassword = 'app_password';

    public function authenticate(string $login, string $password): bool {
      if ($this->appLogin === $login && $this->appPassword === $password) {
        echo "Вы авторизовались как пользователь приложения." . PHP_EOL;
        return true;
      }
      return false;
    }
  }

  trait MobileUserAuthentication 
  {
    private string $mobileLogin = 'mobile_user';
    private string $mobilePassword = 'mobile_password';

    public function authenticate(string $login, string $password): bool {
      if  ($this->mobileLogin === $login && $this->mobilePassword === $password) {
        echo "Вы авторизовались как пользователь мобильного приложения." . PHP_EOL;
        return true;
      }
      return false;
    }
  }

  class User 
  {
    use AppUserAuthentication, MobileUserAuthentication {
      AppUserAuthentication::authenticate as authenticateApp;
      MobileUserAuthentication::authenticate as authenticateMobile;
    }

    public function authenticate(string $login, string $password): bool {
      if ($this->authenticateApp($login, $password)) {
        return true;
      }
      return $this->authenticateMobile($login, $password);
    }
  }

  $user = new User(); 
  $user->authenticate('app_user', 'app_password'); 
  $user->authenticate('mobile_user', 'mobile_password'); 