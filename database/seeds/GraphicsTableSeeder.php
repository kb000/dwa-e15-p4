<?php

use Illuminate\Database\Seeder;
use Kb0\Vectography\Graphic;

class GraphicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $graphic = new Graphic();
        $graphic->title = 'Insanity Wolf';
        $graphic->description = "It's a wolf. He is insane.";
        $graphic->authKey = $this->makeSeedAuthKey($graphic);
        $graphic->save();

        $graphic = new Graphic();
        $graphic->title = 'Nyan Cat';
        $graphic->description = "Pop tart. Rainbow. Cat. 'Nuff said.";
        $graphic->authKey = $this->makeSeedAuthKey($graphic);
        $graphic->save();

        $graphic = new Graphic();
        $graphic->title = 'Blast';
        $graphic->description = "Vector graphics are a blast.";
        $graphic->authKey = $this->makeSeedAuthKey($graphic);
        $graphic->save();
    }

    /**
     * Makes a deterministic auth key for seeding table.
     */
    private function makeSeedAuthKey($graphic)
    {
        $key_raw = hash('sha256', $graphic->description, true);
        $key_txt = base64url_encode($key_raw);
        return $key_txt;
    }
}
