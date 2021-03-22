<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SuppliersTest extends TestCase
{  public function test_example()
{
    $this->assertTrue(true);
}
    public function testCreateSupplier()
    {
        $data  = [
            'order_number' => 1,
        ];
        $user   = factory(\App\Models\User::class)->create();
        $response = $this->actingAs($user, 'api')->json('POST', '/api/suppliers',$data);
        $response->assertStatus(200);
        $response->assertJson(['status'        => true]);
        $response->assertJson(['message'       => "Supplier Created!"]);
        $response->assertJsonStructure(['data' => [
            'id',
            'name',
            'created_at',
            'updated_at'
        ]]);
    }
    public function testGetAllOrders()
    {
        $user             = factory(\App\Models\User::class)->create();
        $response         = $this->actingAs($user, 'api')->json('GET', '/api/suppliers');
        $response->assertStatus(200);
        $response->assertJsonStructure(
            [
                [
                    'id',
                    'name',
                    'created_at',
                    'updated_at'
                ]
            ]
        );
    }
    public function testUpdateOrder()
    {
        $user      = factory(\App\Models\User::class)->create();
        $response  = $this->actingAs($user, 'api')->json('GET', '/api/suppliers');
        $response->assertStatus(200);

        $order     = $response->getData()[0];

        $update    = $this->actingAs($user, 'api')->json('PUT', '/api/suppliers/'.$order->id);
        $update->assertStatus(200);
        $update->assertJson(['message' => "Supplier Updated!"]);
    }
    public function testDeleteOrder()
    {
        $user     = factory(\App\Models\User::class)->create();
        $response = $this->actingAs($user, 'api')->json('GET', '/api/suppliers');
        $response->assertStatus(200);

        $order    = $response->getData()[0];

        $update   = $this->actingAs($user, 'api')->json('DELETE', '/api/suppliers/'.$order->id);
        $update->assertStatus(200);
        $update->assertJson(['message' => "suppliers Deleted!"]);
    }
}
