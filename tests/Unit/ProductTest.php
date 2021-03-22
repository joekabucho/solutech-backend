<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
    public function testCreateProductWithMiddleware()
    {
        $data = [
            'name' => "New Product",
            'description' => "This is a product",
            'quantity' => 20,
        ];

        $response = $this->json('POST', '/api/products',$data);
        $response->assertStatus(401);
        $response->assertJson(['message' => "Unauthenticated."]);
    }
    public function testCreateProduct()
    {
        $data = [
            'name' => "New Product",
            'description' => "This is a product",
            'quantity' => 20,
        ];
        $user = factory(\App\Models\User::class)->create();
        $response = $this->actingAs($user, 'api')->json('POST', '/api/products',$data);
        $response->assertStatus(200);
        $response->assertJson(['status' => true]);
        $response->assertJson(['message' => "Product Created!"]);
        $response->assertJson(['data' => $data]);
    }
    public function testGettingAllProducts()
    {
        $response = $this->json('GET', '/api/products');
        $response->assertStatus(200);

        $response->assertJsonStructure(
            [
                [
                    'id',
                    'name',
                    'description',
                    'quantity',
                    'created_at',
                    'updated_at'
                ]
            ]
        );
    }
    public function testUpdateProduct()
    {
        $response = $this->json('GET', '/api/products');
        $response->assertStatus(200);

        $product = $response->getData()[0];

        $user = factory(\App\Models\Product::class)->create();
        $update = $this->actingAs($user, 'api')->json('PUT', '/api/products/'.$product->id,['name' => "Changed for test"]);
        $update->assertStatus(200);
        $update->assertJson(['message' => "Product Updated!"]);
    }
    public function testDeleteProduct()
    {
        $response = $this->json('GET', '/api/products');
        $response->assertStatus(200);

        $product = $response->getData()[0];

        $user = factory(\App\Models\User::class)->create();
        $delete = $this->actingAs($user, 'api')->json('DELETE', '/api/products/'.$product->id);
        $delete->assertStatus(200);
        $delete->assertJson(['message' => "Product Deleted!"]);
    }
}
