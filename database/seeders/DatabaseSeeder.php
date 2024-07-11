<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\User;
use Database\Factories\ContactFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // $contact = new Contact();
        // $contact->name = "José Francisco";
        // $contact->email = "jose@email.com";
        // $contact->phone = "1111-1111";
        // $contact->save();

        ContactFactory::times(50)->create();

        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
