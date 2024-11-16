<?php

declare(strict_types=1);

class SuperHero {
    //promoted properties
    public function __construct(
        private string $name,
        private array $powers,
        private string $planet
    ) {}

    public function attack()
    {
        return "$this->name attack with his powers.";
    }

    public function show_all()
    {
        return get_object_vars($this);
    }

    public function description()
    {
        $powers = implode(", ", $this->powers);

        return "$this->name its a superhero that he comes from $this->planet and has the following powers: $powers.";
    }

    public static function random ()
    {
        $names = ["Thor", "Spiderman", "Wolverine", "Ironman", "Hulk"];

        $powers = [
            ["Strenght", "Fly", "Rays"],
            ["Strenght", "Agility", "Spiderwebs"],
            ["Regen", "Strenght", "Adamantium claw"]
        ];

        $planets = ["Asgard", "Tierra", "HulkWorld"];

        $name = $names[array_rand($names)];
        $power = $powers[array_rand($powers)];
        $planet = $planets[array_rand($planets)];

        return new self($name, $power, $planet);
    }
}

// Static
$hero = SuperHero::random(); // Static method
echo $hero->description();