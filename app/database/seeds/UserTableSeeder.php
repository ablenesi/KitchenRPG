<?php
require_once '/vendor/fzaninotto/Faker/src/autoload.php';
class UserTableSeeder extends Seeder {  
  private $faker;
  public function run()
  {
    // Delete current database data    
    $this->deleteDataFromDatabase();

    // Create faker factory
    $this->faker = Faker\Factory::create();  

    $this->createFakeData(mt_rand(10,60));
  }  

  private function deleteDataFromDatabase(){
    DB::table('users')->truncate();
    DB::table('recipes')->truncate();
    DB::table('comments')->truncate();
    DB::table('ingredients')->truncate();
    DB::table('steps')->truncate();
  }

  private function createFakeData( $n = 100)
  {
    $users = $this->createFakeUsers($n);
    $this->createFakeRecipes($users);
  }

  private function createFakeUser(){
    echo "Generateing Fake User\n";
    $user = new User();
    $user->first_name = $this->faker->firstName;
    $user->last_name = $this->faker->lastName;
    $user->password = Hash::make('123456');
    $user->email = $this->faker->email;    
    $user->description = implode(' ',$this->faker->sentences($nb = 5));
    $user->full_name = $user->first_name." ".$user->last_name;
    $user->image_url = "http://flathash.com/YOUR-TEXT".$user->full_name.$user->id;
    $user->save();
    return $user;
  }

  private function createFakeUsers($n){
    echo "Generateing Fake Users ".$n."\n";
    $users = array($n);
    for ($i=0; $i < $n; $i++) { 
      echo "  ".$i."/".$n.") ";
      $users[$i] = $this->createFakeUser();
    }
    return $users;
  }

  private function createFakeRecipe(){
    echo "Generateing Fake Recipe\n";
    $recipe = new Recipe();
    $recipe->title = $this->faker->sentence();
    $recipe->description = $this->faker->paragraph($nbSentences = 3);
    $recipe->serves = mt_rand(1,6);
    $recipe->prep_time = mt_rand(10,60);
    $recipe->cook_time = mt_rand(10,160);
    $recipe->image_url = $this->faker->imageUrl($width = 640, $height = 480, 'food');
    $recipe->comment_count = 0;
    $recipe->follow_count = 0;
    $recipe->save();
    return $recipe;
  }

  private function createFakeRecipes($users, $min = 0,$max = 10){
    echo "Generateing Fake Recipes ".$min." ".$max."\n";
    $recipes= array();
    $ni = 0;
    $nr = count($users);
    foreach ($users as $user) {
      $ni = $ni + 1;
      // number of generated recipes for $user
      $n = mt_rand($min,$max);
      echo "[".$ni."/".$nr."] Generate ".$n." Recipes for: ".$user->full_name."\n";
      for ($i=0; $i < $n; $i++) {
        echo "    ".$i.") ";   
        $recipe = $this->createFakeRecipe();
        $user->recipes()->save($recipe);
        $this->createFakeIngredients($recipe);
        $this->createFakeSteps($recipe);
        $this->createFakeComments($recipe, $users);
        $recipes[$i]=$recipe;
      }
      $user->recipe_count = $n;
      $user->save();
    }
    return $recipes;
  }

  private function createFakeIngredient($recipe){
    $ingredient = new Ingredient();
    $ingredient->name = $this->faker->word;
    $ingredient->quantity =  $this->f_rand(0.2,2,2);
    $ingredient->unit = $this->faker->word;
    $recipe->ingredients()->save($ingredient);
  }

  private function createFakeIngredients($recipe, $min = 1 , $max =10){
    for( $i = 0 ; $i <= mt_rand($min,$max); $i++)
      {
        $this->createFakeIngredient($recipe);
      }
  }

  private function createFakeStep($recipe,$nr){
    $step = new Step();
    $step->number = $nr;
    $step->description = implode(' ',$this->faker->sentences($nb = 2));
    $step->image_url = $this->faker->imageUrl($width = 640, $height = 480, 'food');
    $recipe->steps()->save($step);
  }
 
  private function createFakeSteps($recipe, $min = 1 , $max =10){
    for( $i = 0 ; $i <= mt_rand($min,$max); $i++)
      {
        $this->createFakeStep($recipe,$i);
      }
  }

  private function createFakeComment($recipe, $user){
    $comment = new Comment();
        $comment->comment  = $this->faker->text();
        $comment->approved = True;

        $recipe->comments()->save($comment);
        $recipe->increment('comment_count');
        $user->comments()->save($comment);        
  }

  private function createFakeComments($recipe, $users, $min = 0, $max = 20){
    for( $i = 0 ; $i <= mt_rand($min,$max); $i++)
      {
        $this->createFakeComment($recipe,$users[mt_rand(0,count($users)-1)]);
      }
  }

  private function f_rand($min=0,$max=1,$mul=1000000){
    if ($min>$max) return false;
    return mt_rand($min*$mul,$max*$mul)/$mul;
  }
}