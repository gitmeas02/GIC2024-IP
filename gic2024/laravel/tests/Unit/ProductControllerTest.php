<?php

namespace Tests\Unit;
use Tests\TestCase;

use App\Models\Product;
use App\Models\Category;
class ProductControllerTest extends TestCase
{   
   
    /**
     * A basic unit test example.
     */
    public function test_returns_no_data_when_no_products_exist()
    {   
        $response = $this->getJson('/api/products');
        $response->assertStatus(200);
    }
   public function test_product_creation_with_valid_category_id()
    {
        $product = Product::factory()->make(); //
        $payload = $product->toArray();
        $payload['images'] = ['shoe1.jpg', 'shoe2.jpg'];
        $response = $this->postJson('/api/products', $payload);
        $response->assertStatus(201)
        ->assertJsonFragment([
            'name' => $payload['name'],
            'category_id' => $payload['category_id'],
            'pricing' => $payload['pricing'],
            'description' => $payload['description'],
        ]);
        $this->assertDatabaseHas('products', [
            'name' => $payload['name']
        ]);
    }
    public function test_product_get_with_product_by_id()
    {
        $product = Product::factory()->create();
        $response = $this->get("/api/products/{$product->id}");
        $response->assertStatus(200)
                 ->assertJson([
                     'id' => $product->id,
                     'name' => $product->name,
                     'category_id' => $product->category_id,
                     'pricing' => $product->pricing,
                     'description' => $product->description,
                     'images' => $product->images,
                 ]);
        $nonExistentId = $product->id + 1;
        $response = $this->get("/api/products/{$nonExistentId}");
        $response->assertStatus(404)
        ->assertJson([
        'message' => 'Product not found',
          ]);
    }
    public function test_update_product_successfully()
    {
        // Step 1: Create a category to associate with the product
        $category = Category::factory()->create([
            'name' => 'Electronics',
        ]);
        $product = Product::factory()->create([
            'category_id'=> $category->id
            ]);
        
        $updateData = [
            'name' => 'Updated Name Only',
        ];

        $response = $this->patchJson("/api/products/{$product->id}", $updateData);

        $response->assertStatus(200)->assertJson([
                'message' => 'Product updated successfully',
                'product' => [
                'name' => 'Updated Name Only',
            ],
        ]);
        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'Updated Name Only',
        ]);
    }

    

    public function test_product_delete_with_product_by_id()
    {
        $product = Product::factory()->create();
    
        $response = $this->deleteJson("/api/products/{$product->id}");
    
        $response->assertStatus(200)
                 ->assertJson([
                     'message' => 'Product deleted successfully'
                 ]);
        }
}
