<?php

use Illuminate\Database\Seeder;
use \App\Models\Menu;
use \App\Models\Category;

class MenusTableSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dummyCategory = collect([
            'Soups', 'Main Course', 'Rice', 'Noodles'
        ]);

        $dummyCategory->each(function($value) {
            factory(Category::class)->create(['name' => $value]);
        });

        $this->addSoups();
        $this->addMainCourse();
        $this->addRice();
        $this->addNodles();
    }

    private function addSoups()
    {
        factory(Menu::class)->create([
            'name' => 'Manchow Soup',
            'price' => 170,
            'category_id' => 1,
            'description' => 'Sweet and sour, medium spicy, popular brown soup with finely chopped vegetables served with crisp noodles'
        ]);

        factory(Menu::class)->create([
            'name' => 'Hot & Sour Soup',
            'price' => 160,
            'category_id' => 1,
            'description' => 'Spicy, tangy and loaded with vegetables – the name pretty much describes the soup perfectly'
        ]);

        factory(Menu::class)->create([
            'name' => 'Chinese Wanton Soup',
            'price' => 160,
            'category_id' => 1,
            'description' => 'Chicken Wonton Soup Wonton, which translates to swallowing a cloud, is a great way to describe how light these dumplings are.',
        ]);
    }

    private function addMainCourse()
    {
        factory(Menu::class)->create([
            'name' => 'Paneer Butter Masala',
            'price' => 290,
            'category_id' => 2,
            'description' => 'Paneer Butter Masala or Butter Paneer is a traditional Punjabi recipe in which soft pieces of Paneer are cooked in rich creamy butter & tomato gravy'
        ]);

        factory(Menu::class)->create([
            'name' => 'Veg. Kolapuri',
            'price' => 310,
            'category_id' => 2,
            'description' => 'A mixed vegetable curry with thick and spicy coconut based gravy, is a popular dish of Maharashtrian cuisine'
        ]);

        factory(Menu::class)->create([
            'name' => 'Paneer Tikka',
            'price' => 270,
            'category_id' => 2,
            'description' => 'Paneer tikka is an Indian dish made from chunks of paneer marinated in spices and grilled in a tandoor'
        ]);
    }

    private function addRice()
    {
        factory(Menu::class)->create([
            'name' => 'Fried Rice',
            'price' => 220,
            'category_id' => 3,
            'description' => 'Fried rice is a dish of cooked rice that has been stir-fried in a wok or a frying pan and is usually mixed with other ingredients'
        ]);

        factory(Menu::class)->create([
            'name' => 'Jeera Rice',
            'price' => 250,
            'category_id' => 3,
            'description' => 'Jeera rice or Zeera rice is an Indian and Pakistani dish consisting of rice and cumin seeds'
        ]);

        factory(Menu::class)->create([
            'name' => 'Veg. Biryani',
            'price' => 280,
            'category_id' => 3,
            'description' => 'Vegetable biryani is an aromatic rice dish made by cooking basmati rice with mix veggies, herbs & biryani spices'
        ]);
    }

    private function addNodles()
    {
        factory(Menu::class)->create([
            'name' => 'Cart noodle',
            'price' => 220,
            'category_id' => 4,
            'description' => 'Cart noodle is a kind of à la carte noodle which became popular in Hong Kong in the 1950s through independent street vendors operating on roadsides and in public housing estates in low-income districts, using carts.'
        ]);

        factory(Menu::class)->create([
            'name' => 'Chongqing noodles',
            'price' => 260,
            'category_id' => 4,
            'description' => 'Xiao mian is a traditional breakfast dish in Chongqing that is widely consumed by Chongqing residents. The dishes are typically low-priced, and are a common street food in Chongqing. It has been described as a staple food of Chongqing, and is an historic part of the cuisine there.'
        ]);

        factory(Menu::class)->create([
            'name' => 'Chow mein noodles',
            'price' => 280,
            'category_id' => 4,
            'description' => 'Chow mein or Chinese stir-fried noodles, the name being the romanization of the Taishanese chāu-mèing. The dish is popular throughout the Chinese diaspora and appears on the menus of most Chinese restaurants.'
        ]);
    }
}


