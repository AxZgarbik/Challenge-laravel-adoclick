<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Entity;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EntityTest extends TestCase
{
    use DatabaseTransactions;
    /** @test */
    public function it_can_create_an_entity()
    {
        $category_id =  Category::where('category','Security')->first()->id;
        $entity = Entity::create([
            'api' => 'Test API',
            'description' => 'This is a test description',
            'link' => 'http://example.com',
            'category_id' => $category_id,
        ]);

        $this->assertDatabaseHas('entities', [
            'api' => 'Test API',
            'description' => 'This is a test description',
            'link' => 'http://example.com',
            'category_id' => $category_id,
        ]);
    }
}
