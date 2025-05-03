<?php


abstract class CaffeineBeverage{
    public final function prepareRecipe(): void{
        $this->boilWater();
        $this->brew();
        $this->pourInCup();
        $this->addCondiments();
    }

    private function boilWater(): void{
        echo "🔥 Boiling water<br>";
    }

    private function pourInCup(): void{
        echo "☕ Pouring into cup<br>";
    }

    abstract protected function brew(): void;
    abstract protected function addCondiments(): void;
}

class Tea extends CaffeineBeverage{

    protected function brew(): void
    {
        echo "🍃 Steeping the tea<br>";
    }

    protected function addCondiments(): void
    {
        echo "🍋 Adding lemon<br>";
    }
}

class Coffee extends CaffeineBeverage{

    protected function brew(): void
    {
        echo "☕ Dripping coffee through filter<br>";
    }

    protected function addCondiments(): void
    {
        echo "🧂 Adding sugar and milk<br>";
    }
}


$tea = new Tea();
$tea->prepareRecipe();

echo "<hr>";

$coffee = new Coffee();
$coffee->prepareRecipe();


