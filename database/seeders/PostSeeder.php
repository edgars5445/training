<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::truncate();
        $post = new Post();
        $post->title = 'Apple Iphone 13';
        $post->description = 'Pārdodu mazlietotu Iphone 13 telefonu, vairāk informācijas zvanot pa norādīto telefonu.';
        $post->price = 700;
        $post->image = 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone-13-pro-family-hero?wid=940&hei=1112&fmt=png-alpha&.v=1631220221000';
        $post->section_id = '1';
        $post->user_id = '2';
        $post->save();

        $post = new Post();
        $post->title = 'Apple Iphone 12';
        $post->description = 'Pārdodu mazlietotu Iphone 12 telefonu, vairāk informācijas zvanot pa norādīto telefonu. Ja vēlāties papildus garantiju, tad nezvaniet, jo nav tādas.';
        $post->price = 700;
        $post->image = 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone-13-pro-family-hero?wid=940&hei=1112&fmt=png-alpha&.v=1631220221000';
        $post->section_id = '1';
        $post->user_id = '2';
        $post->save();

        $post = new Post();
        $post->title = 'Apple Iphone 14';
        $post->description = 'Pārdodu mazlietotu Iphone 14 telefonu, vairāk informācijas zvanot pa norādīto telefonu. Es zinu, ka tāds vēl nav izgājis, bet šis ir insider telefons.';
        $post->price = 800;
        $post->image = 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone-13-pro-family-hero?wid=940&hei=1112&fmt=png-alpha&.v=1631220221000';
        $post->section_id = '1';
        $post->user_id = '2';
        $post->save();


        $post = new Post();
        $post->title = 'Apple Iphone 15';
        $post->description = 'Pārdodu mazlietotu Iphone 13 telefonu, vairāk informācijas zvanot pa norādīto telefonu.';
        $post->price = 900;
        $post->image = 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone-13-pro-family-hero?wid=940&hei=1112&fmt=png-alpha&.v=1631220221000';
        $post->section_id = '1';
        $post->user_id = '2';
        $post->save();

        $post = new Post();
        $post->title = 'Apple Iphone 16';
        $post->description = 'Pārdodu mazlietotu Iphone 12 telefonu, vairāk informācijas zvanot pa norādīto telefonu. Ja vēlāties papildus garantiju, tad nezvaniet, jo nav tādas.';
        $post->price = 1000;
        $post->image = 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone-13-pro-family-hero?wid=940&hei=1112&fmt=png-alpha&.v=1631220221000';
        $post->section_id = '1';
        $post->user_id = '2';
        $post->save();

        $post = new Post();
        $post->title = 'Apple Iphone 17';
        $post->description = 'Pārdodu mazlietotu Iphone 14 telefonu, vairāk informācijas zvanot pa norādīto telefonu. Es zinu, ka tāds vēl nav izgājis, bet šis ir insider telefons.';
        $post->price = 1100;
        $post->image = 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone-13-pro-family-hero?wid=940&hei=1112&fmt=png-alpha&.v=1631220221000';
        $post->section_id = '1';
        $post->user_id = '1';
        $post->save();

        $post = new Post();
        $post->title = 'Apple Iphone 18';
        $post->description = 'Pārdodu mazlietotu Iphone 13 telefonu, vairāk informācijas zvanot pa norādīto telefonu.';
        $post->price = 700;
        $post->image = 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone-13-pro-family-hero?wid=940&hei=1112&fmt=png-alpha&.v=1631220221000';
        $post->section_id = '1';
        $post->user_id = '2';
        $post->save();

        $post = new Post();
        $post->title = 'Apple Iphone 19';
        $post->description = 'Pārdodu mazlietotu Iphone 12 telefonu, vairāk informācijas zvanot pa norādīto telefonu. Ja vēlāties papildus garantiju, tad nezvaniet, jo nav tādas.';
        $post->price = 1200;
        $post->image = 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone-13-pro-family-hero?wid=940&hei=1112&fmt=png-alpha&.v=1631220221000';
        $post->section_id = '1';
        $post->user_id = '1';
        $post->save();

        $post = new Post();
        $post->title = 'Apple Iphone 19';
        $post->description = 'Pārdodu mazlietotu Iphone 14 telefonu, vairāk informācijas zvanot pa norādīto telefonu. Es zinu, ka tāds vēl nav izgājis, bet šis ir insider telefons.';
        $post->price = 1300;
        $post->image = 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone-13-pro-family-hero?wid=940&hei=1112&fmt=png-alpha&.v=1631220221000';
        $post->section_id = '1';
        $post->user_id = '1';
        $post->save();

        $post = new Post();
        $post->title = 'Apple Iphone 19';
        $post->description = 'Pārdodu mazlietotu Iphone 12 telefonu, vairāk informācijas zvanot pa norādīto telefonu. Ja vēlāties papildus garantiju, tad nezvaniet, jo nav tādas.';
        $post->price = 1600;
        $post->image = 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone-13-pro-family-hero?wid=940&hei=1112&fmt=png-alpha&.v=1631220221000';
        $post->section_id = '1';
        $post->user_id = '2';
        $post->save();

        $post = new Post();
        $post->title = 'Apple Iphone 19';
        $post->description = 'Pārdodu mazlietotu Iphone 14 telefonu, vairāk informācijas zvanot pa norādīto telefonu. Es zinu, ka tāds vēl nav izgājis, bet šis ir insider telefons.';
        $post->price = 1700;
        $post->image = 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone-13-pro-family-hero?wid=940&hei=1112&fmt=png-alpha&.v=1631220221000';
        $post->section_id = '1';
        $post->user_id = '2';
        $post->save();

        $post = new Post();
        $post->title = 'Apple Iphone 19';
        $post->description = 'Pārdodu mazlietotu Iphone 12 telefonu, vairāk informācijas zvanot pa norādīto telefonu. Ja vēlāties papildus garantiju, tad nezvaniet, jo nav tādas.';
        $post->price = 1900;
        $post->image = 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone-13-pro-family-hero?wid=940&hei=1112&fmt=png-alpha&.v=1631220221000';
        $post->section_id = '1';
        $post->user_id = '2';
        $post->save();
        
        $post = new Post();
        $post->title = 'Apple Iphone 19';
        $post->description = 'Pārdodu mazlietotu Iphone 12 telefonu, vairāk informācijas zvanot pa norādīto telefonu. Ja vēlāties papildus garantiju, tad nezvaniet, jo nav tādas.';
        $post->price = 2100;
        $post->image = 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone-13-pro-family-hero?wid=940&hei=1112&fmt=png-alpha&.v=1631220221000';
        $post->section_id = '1';
        $post->user_id = '1';
        $post->save();
        
        $post = new Post();
        $post->title = 'Apple Iphone 19';
        $post->description = 'Pārdodu mazlietotu Iphone 14 telefonu, vairāk informācijas zvanot pa norādīto telefonu. Es zinu, ka tāds vēl nav izgājis, bet šis ir insider telefons.';
        $post->price = 2000;
        $post->image = 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone-13-pro-family-hero?wid=940&hei=1112&fmt=png-alpha&.v=1631220221000';
        $post->section_id = '1';
        $post->user_id = '1';
        $post->save();

        $post = new Post();
        $post->title = 'Apple Iphone 19';
        $post->description = 'Pārdodu mazlietotu Iphone 12 telefonu, vairāk informācijas zvanot pa norādīto telefonu. Ja vēlāties papildus garantiju, tad nezvaniet, jo nav tādas.';
        $post->price = 200;
        $post->image = 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone-13-pro-family-hero?wid=940&hei=1112&fmt=png-alpha&.v=1631220221000';
        $post->section_id = '1';
        $post->user_id = '2';
        $post->save();

        $post = new Post();
        $post->title = 'Apple Iphone 22';
        $post->description = 'Pārdodu mazlietotu Iphone 14 telefonu, vairāk informācijas zvanot pa norādīto telefonu. Es zinu, ka tāds vēl nav izgājis, bet šis ir insider telefons.';
        $post->price = 1500;
        $post->section_id = '2';
        $post->user_id = '1';
        $post->save();
    }
}
