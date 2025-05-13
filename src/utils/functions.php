<?php 

function p(mixed $value): void
{
    echo "<pre>";
    print_r($value);
    echo "</pre>";
}

function requireFile(string $pathToFile): void
{
    require_once BASE_PATH . "src/$pathToFile.php";
}

