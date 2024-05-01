<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/User.php';

class UserRegTest extends TestCase
{
    public function testSuccessfulRegistration()
    {
        session_start();

        $_SERVER["REQUEST_METHOD"] = "POST";
        $_POST["email"] = "test@example.com";

        require_once __DIR__ . '/../public/register.php';

        $this->assertEquals("Registration successful!", $_SESSION['message']);

        $this->assertContains("test@example.com", $_SESSION["registered_emails"]);

        $this->assertInstanceOf(User::class, $_SESSION["users"]["test@example.com"]);
    }


    
}
