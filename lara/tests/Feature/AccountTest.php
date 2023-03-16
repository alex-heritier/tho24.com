<?php

namespace Tests\Feature;

use App\Models\Biz;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AccountTest extends TestCase
{
    use DatabaseTransactions;

    private $userTestData = [
        'name' => 'Yolo Chief',
        'email' => 'yolo@asdf.com',
        'phone_code' => '1',
        'phone' => '6953674334',
        'password' => 'asdf',
    ];

    private $bizTestData = [
        'biz_name' => 'val=biz_name',
        'descr' => 'val=descr',
        'trade' => 'val=trade',
        'website' => 'val=website',
    ];

    /**
     * Test User registration
     */
    public function test_that_register_is_successful(): void
    {
        Storage::fake('images');

        $file = UploadedFile::fake()->image('avatar.jpg');

        $data = [
            // User
            ...$this->userTestData,

            // Biz
            ...$this->bizTestData,

            // Uploaded image
            'image' => $file,
        ];

        $response = $this->post(route('register'), $data);

        // Success response
        $response->assertStatus(302);

        // User found in db
        $this->assertDatabaseHas('users', ['email' => $this->userTestData['email']]);

        // Biz found in db
        $this->assertDatabaseHas('biz', ['name' => $this->bizTestData['biz_name']]);

        // Biz main_img field not null
        $this->assertTrue(Biz::all()->first()->main_img !== null);
        $this->assertTrue(Biz::all()->first()->user_id !== null);
    }

    /**
     * Test User login
     */
    public function test_that_login_works(): void
    {
        $this->test_that_register_is_successful();

        $data = Arr::only($this->userTestData, ['email', 'password']);

        // User found in db
        // $this->assertDatabaseHas('users', $data);

        $response = $this->post(route('login'), $data);

        // Success response
        $response->assertStatus(302);
    }
}
