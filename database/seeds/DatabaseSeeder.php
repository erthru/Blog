<?php

use Illuminate\Database\Seeder;
use App\Writer;
use App\Credential;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $writerToCreateBody = [
            "full_name" => "Suprianto D",
            "bio" => "Nani ??",
            "avatar" => "default_avatar.PNG"
        ];

        $writer = Writer::create($writerToCreateBody);

        $credentialToCreateBody = [
            "id" => $writer->id,
            "email" => "ersaka96@gmail.com",
            "password" => Hash::make("asdasd")
        ];

        Credential::create($credentialToCreateBody);
    }
}
