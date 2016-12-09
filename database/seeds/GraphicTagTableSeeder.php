<?php

use Illuminate\Database\Seeder;
use Kb0\Vectography\Graphic;
use Kb0\Vectography\Tag;

class GraphicTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $taggedGraphics =[
            'Blast' => ['geometric'],
            'Nyan Cat' => ['rainbow','cat'],
            'Insanity Wolf' => []
        ];

        foreach($taggedGraphics as $title => $tags) {

            # First get the graphic
            $graphic = Graphic::where('title','like',$title)->first();

            # Now loop through each tag for this graphic, adding the pivot
            foreach($tags as $tagName) {
                $tag = Tag::where('name','like', $tagName)->first();

                # Connect this tag to this book
                $graphic->tags()->save($tag);
            }
        }
    }
}
