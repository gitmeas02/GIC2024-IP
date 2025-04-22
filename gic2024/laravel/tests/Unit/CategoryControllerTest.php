<?php

namespace Tests\Unit;

// use App\Models\Category;
// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{   
    // use RefreshDatabase;
    /**
     * Test ID: Category-001
     * Description: Check if we can access the get all categories api
     * Precondition: None
     * Test Steps:
     *  1. Hit the get all categories api
     *  2. Check if the response status is 200
     * Test Data: None
     * Expected Result: The response status should be 200
     * Actual Result: reponse returned 200
     * Status: PASSED
     * Remark: None
     *
     */
    // Test get all categories
    public function test_get_all_categories()
    {
        $response = $this->get('/api/categories');
        $response->assertStatus(200);
    }

       /**
     * Test ID: Category-003
     * Description: Check if we can retrieve a category by its ID using the API.
     * Precondition: The database must contain a category with a known ID.
     * Test Steps:
     *  1. Hit the GET category API with an existing category ID.
     *  2. Check if the response status is 200 and the JSON structure contains 'id' and 'name'.
     *  3. Hit the GET category API with a non-existent category ID.
     *  4. Check if the response status is 404 and the JSON contains the error message 'Category not found'.
     * Test Data:
     *          1. Existing Category ID: 72 (replace with an actual ID from your database).
     *          2. Non-existent Category ID: 9999.
     * Expected Result:
     *          1. For the existing category ID, the response status should be 200, and the JSON structure should include 'id' and 'name'.
     *          2. For the non-existent category ID, the response status should be 404, and the JSON should contain the error message 'Category not found'.
     * Actual Result: 
     *          1. Response returned 200 for the existing category ID.
     *          2. Response returned 404 for the non-existent category ID.
     * Status: PASSED
     * Remark: None
     */
    public function test_get_category_by_id()
    {
        // Scenario 1: Category exists
        $existingCategoryId = 72; // Replace with an ID that exists in your database
        $response = $this->get("/api/categories/{$existingCategoryId}");
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'id',
                     'name',
                 ]);
    
        // Scenario 2: Category does not exist
        $nonExistentId = 9999; // Use an ID that does not exist
        $response = $this->get("/api/categories/{$nonExistentId}");
        $response->assertStatus(404)
                 ->assertJson([
                     'message' => 'Category not found',
                 ]);
    }
       /**
     * Test ID: Category-002
     * Description: Check if we can create a category using the api
     * Precondition: None
     * Test Steps:
     *  1. Hit the POST category api
     *  2. Check if the resonse status is 201
     * Test Data:
     *          1. name: test_category_01
     *          2. name: test_categoryy_02
     *          3. name: test_category_03
     * Expected Result: The response status should be 201
     * Actual Result: response returned 201
     * Status: PASSED
     * Remark: None
     *
     */
    public function test_get_create_categories_by_id()
    {
        $data = [
            'name' => 'New Category',
        ];

        $response = $this->post('/api/categories', $data);

        $response->assertStatus(201);
        $response->assertJson([
            'name' => 'New Category']);
    }
    
public function test_if_we_can_access_update_a_category_by_id_api(): void
{
    $response = $this->patch('/api/categories/72', ["name" => "test_category_updated"]);
    $response->assertStatus(200)->assertJson([ 
        "name" => "test_category_updated"
    ]);
}

public function test_if_we_can_access_delte_a_category_by_id_api(): void
{
    $response = $this->delete('/api/categories/72');
    $response->assertStatus(200)->assertJson([
        'message' => 'Category deleted successfully',
    ]);
}
}
