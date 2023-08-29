<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //'Athens', 'Piraeus', 'Thesalloniki', 'Patra'
        \App\Models\Location::factory()->create(['id' => 1, 'name' => 'Athens']);
        \App\Models\Location::factory()->create(['id' => 2, 'name' => 'Piraeus']);
        \App\Models\Location::factory()->create(['id' => 3, 'name' => 'Thesalloniki']);
        \App\Models\Location::factory()->create(['id' => 4, 'name' => 'Patra']);

        /// 'apartment', 'studio', 'loft', 'maisonette'
        \App\Models\Type::factory()->create(['name' => 'apartment']);
        \App\Models\Type::factory()->create(['name' => 'studio']);
        \App\Models\Type::factory()->create(['name' => 'loft']);
        \App\Models\Type::factory()->create(['name' => 'maisonette']);

        // \App\Models\Listing::factory(10)->create();
        \App\Models\Listing::factory()->create(['location_id' => 1]);
        \App\Models\Listing::factory()->create(['location_id' => 1]);
        \App\Models\Listing::factory()->create(['location_id' => 1]);
        \App\Models\Listing::factory()->create(['location_id' => 1]);
        \App\Models\Listing::factory()->create(['location_id' => 2]);
        \App\Models\Listing::factory()->create(['location_id' => 2]);
        \App\Models\Listing::factory()->create(['location_id' => 2]);
        \App\Models\Listing::factory()->create(['location_id' => 3]);
        \App\Models\Listing::factory()->create(['location_id' => 3]);
        \App\Models\Listing::factory()->create(['location_id' => 4]);

        // \App\Models\ListingType::factory(16)->create();
        \App\Models\ListingType::factory()->create(['listing_id' => 1, 'type_id' => 1]);
        \App\Models\ListingType::factory()->create(['listing_id' => 1, 'type_id' => 2]);
        \App\Models\ListingType::factory()->create(['listing_id' => 2, 'type_id' => 3]);
        \App\Models\ListingType::factory()->create(['listing_id' => 3, 'type_id' => 1]);
        \App\Models\ListingType::factory()->create(['listing_id' => 3, 'type_id' => 3]);
        \App\Models\ListingType::factory()->create(['listing_id' => 4, 'type_id' => 4]);
        \App\Models\ListingType::factory()->create(['listing_id' => 5, 'type_id' => 2]);
        \App\Models\ListingType::factory()->create(['listing_id' => 5, 'type_id' => 3]);
        \App\Models\ListingType::factory()->create(['listing_id' => 6, 'type_id' => 2]);
        \App\Models\ListingType::factory()->create(['listing_id' => 7, 'type_id' => 4]);
        \App\Models\ListingType::factory()->create(['listing_id' => 8, 'type_id' => 4]);
        \App\Models\ListingType::factory()->create(['listing_id' => 9, 'type_id' => 1]);
        \App\Models\ListingType::factory()->create(['listing_id' => 9, 'type_id' => 2]);
        \App\Models\ListingType::factory()->create(['listing_id' => 10, 'type_id' => 2]);



    }
}
