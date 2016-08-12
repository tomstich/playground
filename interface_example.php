<?php

// The different parts of a function signature
// 1. name of the function: funcName
// 2. parameter list: $firstArg (string) & $secondArg (int)
// 3. return type: bool
function funcName(string $firstArg, int $secondArg): bool
{
    // code here...
}

class Person implements User
{
    private $forename;
    private $surname;
    private $id;

    public function __construct(string $forename, string $surname)
    {
        $this->forename = $forename;
        $this->surename = $surname;
        $this->id = uniqid();
    }

    // The different parts of a method signature
    // 0. visibility of the method: public
    // 1. name of the function: changeAdress
    // 2. parameter list: $street (string) & $number (string) & $postalCode (string)
    // 3. return type: null

    public function changeAdress(string $street, string $number, string $postalCode)
    {
        # code...
    }

    public function changePhone(int $countryCode, int $phoneNumber)
    {
        # code...
    }

    public function fullName(): string
    {
        return $this->forename . ' ' . $this->surename;
    }

    public function id(): string
    {
        return $this->id;
    }
}

class Robot implements User
{
    public function fullName(): string
    {
        return 'Terminator';
    }

    public function id(): string
    {
        return 4711;
    }
}

interface User
{
    public function fullName(): string;
    public function id(): string;
}

// Interface
// Describes the methods and their corresponding signuatures of a class.
// Person:
// public function changeAdress(string $street, string $number, string $postalCode)
// public function changePhone(int $countryCode, int $phoneNumber)

class LoginService
{
    public function login(User $user, string $password)
    {
        // This only works with object of type Person!
        // $user->changePhone(1, 2);

        printf("User %s with ID %s logged in!\n"
            , $user->fullName()
            , $user->id()
        );
    }
}

$myPerson = new Person('Max', 'Mustermann');
$myRobot = new Robot();

$loginService = new LoginService();

$loginService->login($myPerson, 'geheim');
$loginService->login($myRobot, 'geheim');
