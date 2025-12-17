<?php

// 1. Абстрактний клас User
abstract class User
{
    private string $name;
    private string $email;

    public function __construct(string $name, string $email)
    {
        $this->name  = $name;
        $this->email = $email;
    }

    // Абстрактний метод ролі
    abstract public function getRole(): string;

    // Гетери/сетери
    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
}

// 2. Клас Student
class Student extends User
{
    private string $group;

    public function __construct(string $name, string $email, string $group)
    {
        parent::__construct($name, $email);
        $this->group = $group;
    }

    public function getRole(): string
    {
        return "Студент";
    }

    public function getGroup(): string
    {
        return $this->group;
    }

    public function setGroup(string $group): void
    {
        $this->group = $group;
    }
}

// 3. Клас Teacher
class Teacher extends User
{
    private string $subject;

    public function __construct(string $name, string $email, string $subject)
    {
        parent::__construct($name, $email);
        $this->subject = $subject;
    }

    public function getRole(): string
    {
        return "Викладач";
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }
}

// 4. Створення об’єктів
$student = new Student("Іван Петренко", "ivan.petrenko@example.com", "Група КН-21");
$teacher = new Teacher("Олена Іванова", "olena.ivanova@example.com", "Програмування");

// Вивід інформації
function printUserInfo(User $user): void
{
    echo "Ім'я: " . $user->getName() . PHP_EOL;
    echo "Email: " . $user->getEmail() . PHP_EOL;
    echo "Роль: " . $user->getRole() . PHP_EOL;

    if ($user instanceof Student) {
        echo "Група: " . $user->getGroup() . PHP_EOL;
    } elseif ($user instanceof Teacher) {
        echo "Предмет: " . $user->getSubject() . PHP_EOL;
    }

    echo PHP_EOL;
}

printUserInfo($student);
printUserInfo($teacher);