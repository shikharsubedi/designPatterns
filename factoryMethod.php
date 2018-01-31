<?php

interface KidsMealsInterface
{
    public function getPrice();

    public function getName();

}

interface KidsMainItemInterface extends KidsMealsInterface
{

    public function getCalorieCount();
}

class ChickenBurger implements KidsMainItemInterface
{
    public function getPrice()
    {
        return 1.00;
    }

    public function getName()
    {
        return 'Chicken Burger';
    }

    public function getCalorieCount()
    {
        return 20;
    }
}


class Nuggets implements KidsMainItemInterface
{
    public function getPrice()
    {
        return 2.00;
    }

    public function getName()
    {
        return 'Yummy Nuggets';
    }

    public function getCalorieCount()
    {

        return 30;
    }
}

interface KidsToyInterface extends KidsMealsInterface
{
    public function getPartNumber();
}

interface GirlToyInterface extends KidsToyInterface
{

}

interface BoyToyInterface extends KidsToyInterface
{

}

interface DrinkInterface extends KidsMainItemInterface
{

}

class BarbieDoll implements GirlToyInterface
{
    public function getName()
    {
        return 'Barbie Doll';
    }

    public function getPrice()
    {
        return 3.00;
    }

    public function getPartNumber()
    {
        return 1;
    }
}

class Soldier implements BoyToyInterface
{
    public function getName()
    {
        return 'Soldier';
    }

    public function getPrice()
    {
        return 3.00;
    }

    public function getPartNumber()
    {
        return 1;
    }
}

class AppleJuice implements DrinkInterface
{

    public function getPrice()
    {
        return 2.00;
    }

    public function getName()
    {
        return 'Apple Juice';
    }

    public function getCalorieCount()
    {
        return 20;
    }
}

class Soda implements DrinkInterface
{

    public function getPrice()
    {
        return 1.00;
    }

    public function getName()
    {
        return 'Soda';
    }

    public function getCalorieCount()
    {
        return 40;
    }
}

class KidsMeal
{
    /**
     * @var KidsMainItemInterface
     */
    protected $kidsMainItem;

    /**
     * @var DrinkInterface
     */
    protected $drink;

    /**
     * @var KidsToyInterface
     */
    protected $toy;

    public function __construct()
    {

    }

    /**
     * @return KidsMainItemInterface
     */
    protected function getKidsMainItem()
    {
        return $this->kidsMainItem;
    }

    /**
     * @param KidsMainItemInterface $kidsMainItem
     */
    public function setKidsMainItem(KidsMainItemInterface $kidsMainItem)
    {
        $this->kidsMainItem = $kidsMainItem;
    }

    /**
     * @return DrinkInterface
     */
    protected function getDrink()
    {
        return $this->drink;
    }

    /**
     * @param DrinkInterface $drink
     */
    public function setDrink(DrinkInterface $drink)
    {
        $this->drink = $drink;
    }

    /**
     * @return KidsToyInterface
     */
    protected function getToy()
    {
        return $this->toy;
    }

    /**
     * @param KidsToyInterface $toy
     */
    public function setToy(KidsToyInterface $toy)
    {
        $this->toy = $toy;
    }

    public function getCost()
    {
        return ($this->getKidsMainItem()->getPrice() + $this->getToy()->getPrice() + $this->getDrink()->getPrice());
    }

    public function getDescription()
    {
        return 'Kids Meal with ' . ($this->getKidsMainItem()->getName()) . ' with ' . $this->getDrink()->getName() .
        ' and ' . $this->getToy()->getName();
    }

    public function getTotalCalories()
    {
        return ($this->getKidsMainItem()->getCalorieCount() + $this->getDrink()->getCalorieCount());
    }
}

class KidsMealFactory
{
    protected $mainItemChoices = [
        'burger' => ChickenBurger::class,
        'nuggets' => Nuggets::class
    ];

    protected $drinkChoices = [
        'apple_juice' => AppleJuice::class,
        'soda' => Soda::class
    ];

    protected $toyChoices = [
        'male' => Soldier::class,
        'female' => BarbieDoll::class
    ];


    public function build($mainItem, $drink, $gender)
    {
        $kidsMeal = new KidsMeal();

        $kidsMeal->setKidsMainItem($this->buildMainItem($mainItem));

        $kidsMeal->setDrink($this->buildDrink($drink));

        $kidsMeal->setToy($this->buildToy($gender));

        return $kidsMeal;

    }

    protected function buildMainItem($mainItem)
    {
        $class = $this->mainItemChoices[$mainItem];

        return new $class;
    }

    protected function buildDrink($drink)
    {
        $class = $this->drinkChoices[$drink];

        return new $class;
    }

    protected function buildToy($gender)
    {
        $class = $this->toyChoices[$gender];

        return new $class;
    }
}

$factory = new KidsMealFactory();

$andrewsMeal = $factory->build('burger', 'soda', 'male');

$mariesMeal = $factory->build('nuggets', 'apple_juice', 'female');

echo "Andrew Got : {$andrewsMeal->getDescription()} \n";
echo "Andrew Price : {$andrewsMeal->getCost()} \n";
echo "Andrew Calorie:. {$andrewsMeal->getTotalCalories()}\n";

echo "Marie Got: {$mariesMeal->getDescription()} \n";
echo "Marie Price: {$mariesMeal->getCost()} \n";
echo "Marie Calorie: {$mariesMeal->getTotalCalories()}\n";



