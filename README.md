# designPatterns
An attempt at understanding Design Patterns and Object Oriented Design Principles

the file factory.php shows the object oriented design of Mac Donalds Happy Meal for Kids

an example is shown below:

```php
$factory = new KidsMealFactory();
$andrewsMeal = $factory->build('burger', 'soda', 'male');

$mariesMeal = $factory->build('nuggets', 'apple_juice', 'female');

echo "Andrew Got : {$andrewsMeal->getDescription()} \n";
echo "Andrew Price : {$andrewsMeal->getCost()} \n";
echo "Andrew Calorie:. {$andrewsMeal->getTotalCalories()}\n";

echo "Marie Got: {$mariesMeal->getDescription()} \n";
echo "Marie Price: {$mariesMeal->getCost()} \n";
echo "Marie Calorie: {$mariesMeal->getTotalCalories()}\n";
```

