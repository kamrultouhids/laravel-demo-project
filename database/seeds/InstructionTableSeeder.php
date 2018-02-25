<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class InstructionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time = Carbon::now();

        DB::table('instruction')->truncate();
        DB::table('instruction')->insert(
            [
                ['title' => 'Theory','description'=>'Hydrodynamic theory (dentistry) The hydrodynamic theory is a theory in dentistry of the mechanism by which a tooth perceives sensation. It states that the flow of fluid in dentinal tubules trigger receptors within the tooth. It is the most widely acceptedtheory explaining tooth sensitivity. ','created_at' => $time, 'updated_at' => $time],
                ['title' => 'Theory','description'=>'As we anticipate the coming 50th anniversary, many theories and speculations about certain characters and events are on the rise. One of the biggest mysteries that remains is, what did John Hurt’s character do that was so bad he lost the title of “The Doctor”. Well, for an answer we can turn to common sense and guess that he performed an action that is so far in the grey that it might as well be black.','created_at' => $time, 'updated_at' => $time],
                ['title' => 'Theory','description'=>'The mystery of the Doctor’s name is one of the most enduring puzzles in Doctor Who, with suggestions for the Time Lord’s secret moniker including Theta Sigma, δ³Σx² and, er, Basil.
But despite these clues, the Doctor’s name has remained a secret for over 50 years – and one new fan theory might reveal exactly why it’s been so tricky to find out.','created_at' => $time, 'updated_at' => $time],
            ]
        );
    }
}
