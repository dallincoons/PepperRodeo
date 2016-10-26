<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Repositories\RecipeRepository;
use App\User;
use App\Recipe;
use App\RecipeCategory;

class RecipeRepositoryTest extends TestCase
{
    use DatabaseTransactions;

    protected $repository;
    protected $user;

    public function setUp()
    {
        parent::setUp();

        $this->user = factory(User::class)->create();

        $this->be($this->user);

    }

    /**
     * @group repository-tests
     * @group recipe-repository-tests
     */
    public function testRecipesWithCategories()
    {
        $category1 = factory(RecipeCategory::class)->create(['name' => 'mobi', 'user_id' => $this->user->getKey()]);
        $category2 = factory(RecipeCategory::class)->create(['name' => 'dick', 'user_id' => $this->user->getKey()]);

        $recipe = factory(Recipe::class)->create(['recipe_category_id' => $category1->getKey(), 'user_id' => $this->user->getKey()]);
        $recipe2 = factory(Recipe::class)->create(['recipe_category_id' => $category2->getKey(), 'user_id' => $this->user->getKey()]);
        $recipe3 = factory(Recipe::class)->create(['recipe_category_id' => $category2->getKey(), 'user_id' => $this->user->getKey()]);

        $actual = RecipeRepository::recipesWithCategories();

       $this->assertArrayHasKey($category1->name, $actual);
       $this->assertArrayHasKey($category2->name, $actual);
       $this->assertEquals($recipe->title, $actual[$category1->name][0]->title);
       $this->assertEquals($recipe2->title, $actual[$category2->name][0]->title);
       $this->assertEquals($recipe3->title, $actual[$category2->name][1]->title);
    }
}
