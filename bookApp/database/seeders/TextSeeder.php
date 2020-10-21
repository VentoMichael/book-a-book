<?php

namespace Database\Seeders;

use App\Models\Text;
use Illuminate\Database\Seeder;

class TextSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Text::create([
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis velit ligula, faucibus eu commodo in, lacinia eu nunc. Etiam ante turpis, laoreet vitae mi et, ullamcorper euismod ipsum. In fringilla augue eget arcu euismod, sit amet imperdiet metus efficitur. Donec cursus dui eu orci sagittis, sit amet interdum nisl rutrum. Vestibulum imperdiet neque ex, in tincidunt diam dapibus vel. In lectus eros, viverra consequat odio id, lacinia dictum lectus. Morbi ac arcu efficitur nibh tincidunt convallis aliquet non urna. Etiam fringilla velit quis nibh convallis condimentum mattis nec est. ',
            'book_id' => '1',
        ]);
    }
}
