<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->unique()->title();
        $author = $this->faker->name();
        $publishing_house = $this->faker->company();
        $isbn = $this->faker->isbn10('-');
        $public_price = $this->faker->numberBetween(4.99,20.99);
        $proposed_price = $this->faker->numberBetween(4.99,20.99);
        return [
            'title' => $title,
            'author' => $author,
            'publishing_house' => $publishing_house,
            'isbn' => $isbn,
            'public_price' => $public_price,
            'proposed_price' => $proposed_price,
        ];
    }
}
