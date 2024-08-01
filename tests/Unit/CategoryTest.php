<?php

namespace Tests\Unit;

use App\Models\Category;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use DatabaseTransactions;
    /** @test */
    public function it_can_create_a_category()
    {
        $category = Category::create([
            'category' => 'Test',
        ]);

        $this->assertDatabaseHas('categories', [
            'category' => 'Test',
        ]);
    }
}