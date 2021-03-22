<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }
    public function testCreateOrder()
    {
        $data  = [
            'order_number' => 1,
        ];
        $user   = factory(\App\Models\User::class)->create();
        $response = $this->actingAs($user, 'api')->json('POST', '/api/orders',$data);
        $response->assertStatus(200);
        $response->assertJson(['status'        => true]);
        $response->assertJson(['message'       => "Order Created!"]);
        $response->assertJsonStructure(['data' => [
            'id',
            'order_number',
            'created_at',
            'updated_at'
        ]]);
    }
    public function testGetAllOrders()
    {
        $user             = factory(\App\Models\User::class)->create();
        $response         = $this->actingAs($user, 'api')->json('GET', '/api/orders');
        $response->assertStatus(200);
        $response->assertJsonStructure(
            [
                [
                    'id',
                    'order_number',
                    'created_at',
                    'updated_at'
                ]
            ]
        );
    }
    public function testUpdateOrder()
    {
        $user      = factory(\App\Models\User::class)->create();
        $response  = $this->actingAs($user, 'api')->json('GET', '/api/orders');
        $response->assertStatus(200);

        $order     = $response->getData()[0];

        $update    = $this->actingAs($user, 'api')->json('PUT', '/api/orders/'.$order->id,['order_number' => ($order->id+5)]);
        $update->assertStatus(200);
        $update->assertJson(['message' => "Order Updated!"]);
    }
    public function testDeleteOrder()
    {
        $user     = factory(\App\Models\User::class)->create();
        $response = $this->actingAs($user, 'api')->json('GET', '/api/orders');
        $response->assertStatus(200);

        $order    = $response->getData()[0];

        $update   = $this->actingAs($user, 'api')->json('DELETE', '/api/orders/'.$order->id);
        $update->assertStatus(200);
        $update->assertJson(['message' => "Order Deleted!"]);
    }
}
