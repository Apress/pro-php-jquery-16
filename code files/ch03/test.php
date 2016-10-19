<?php

declare(strict_types=1);

class MyClass
{
    private $prop1 = "I'm a class property!";

    private static $count = 0;

    public function __construct()
    {
        echo 'The class "', __CLASS__, '" was initiated!<br />';
    }

    public function __destruct()
    {
        echo 'The class "', __CLASS__, '" was destroyed.<br />';
    }

    public function __toString()
    {
        echo "Using the toString method: ";
        return $this->getProperty();
    }

    public function setProperty(string $newval)
    {
        $this->prop1 = $newval;
    }

    protected function getProperty(): string
    {
        return $this->prop1 . "<br />";
    }

    public static function getCount(): int
    {
        return self::$count;
    }

    public static function plusOne()
    {
        echo "The count is " . ++self::$count . ".<br />";
    }
}

class MyOtherClass extends MyClass
{
    public function __construct()
    {
        parent::__construct();
        echo "A new constructor in " . __CLASS__ . ".<br />";
    }

    public function newMethod(): string
    {
        return "From a new method in " . __CLASS__ . ".<br />";
    }

    public function callProtected()
    {
        return $this->getProperty();
    }
}

do
{
    // Call plusOne without instantiating MyClass
    MyClass::plusOne();
} while ( MyClass::getCount() < 10 );

?>
