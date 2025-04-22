<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Product;
// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

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
    public function test_validation_fails_if_required_fields_are_missing()
    {
        $response = $this->postJson('/api/products', []);

        $response->assertStatus(422); // Validation error
    }

    public function test_product_creation_with_valid_category_id()
    {
         // Retrieve the category using find()
         $category = Category::find(83);

         $this->assertNotNull($category); // Ensure it exists
 
         $payload = [
             'name' => 'Nike Air Max',
             'category_id' => $category->id,
             'pricing' => 120.00,
             'description' => 'Comfortable running shoes',
             'images' => ['nike1.jpg', 'nike2.jpg']
         ];
 
         $response = $this->postJson('/api/products', $payload);
 
         $response->assertStatus(201); // Created
    }

    public function test_product_get_with_product_by_id()
    {
        $product = Product::findOrFail(3);

        $response = $this->getJson("/api/products/{$product->id}");

        $response->assertStatus(200)
                 ->assertJson([
                     'id' => $product->id,
                     'name' => $product->name,
                     'category_id' => $product->category_id,
                     'pricing' => $product->pricing,
                     'description' => $product->description,
                 ]);
    }
    public function test_product_update_with_product_by_id()
    {
        $category = Category::find(83);

        $this->assertNotNull($category);

        $product = Product::findOrFail(3);

        $payload = [
            'name' => 'Updated Product Name',
            'category_id' => $category->id,
            'pricing' => 150.00,
            'description' => 'Updated description',
            'images' => ['updated1.jpg', 'updated2.jpg']
        ];

        $response = $this->patchJson("/api/products/{$product->id}", $payload);

        $response->assertStatus(200)
                 ->assertJson([
                     'id' => $product->id,
                     'name' => $payload['name'],
                     'category_id' => $payload['category_id'],
                     'pricing' => $payload['pricing'],
                     'description' => $payload['description'],
                 ]);
    }

    public function test_product_delete_with_product_by_id()
    {
        // Create a product using the factory (if you have set up a factory for Product)
        $product = Product::find(10);
    
        // Send a DELETE request to the API to delete the product
        $response = $this->deleteJson("/api/products/{$product->id}");
    
        // Assert that the response status is 200 and the success message is returned
        $response->assertStatus(200)
                 ->assertJson([
                     'message' => 'Product deleted successfully'
                 ]);
        }
    
    
    
    
}
