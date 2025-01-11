<?php

namespace Database\Factories;

use Alirezasedghi\LaravelImageFaker\Facades\ImageFaker;
use Alirezasedghi\LaravelImageFaker\Services\Picsum;
use App\Models\NewProperty;
use App\Models\Situation;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use File;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class NewPropertyFactory extends Factory
{
    /**
     * Define the model's default state. 02/2024
     *
     * @return array<string, mixed>
     */
    protected $model = NewProperty::class;
    public function definition(): array
    {

        $faker = \Faker\Factory::create('es_ES');
        $year = '';
        $month = '';
        $monthYear = $this->generateYearOrMonthYear();
        if ((strlen($monthYear) != 4)) {
            $month = explode('/', $monthYear)[0];
            $year = explode('/', $monthYear)[1];
        } else {
            $year = explode('/', $monthYear)[0];
        }

        $type = Type::all()->random();
        if ($type->name == 'Commercial') {
            $subtype_id = $type->subtypes()->inRandomOrder()->first();
            $subtype_id2 = $type->subtypes()->inRandomOrder()->first();
        } else {
            $subtype_id = $type->subtypes()->inRandomOrder()->first();
            $subtype_id2 = null;
        }


        $price = mt_rand(500000, 50000000);
        $percentage = mt_rand(1, 100);
        $commission = $price * $percentage / 100;

        $listAgentPer = mt_rand(1, $percentage);
        $listAgentComm = $commission * $listAgentPer / 100;

        $sellingAgentPer = $percentage - $listAgentPer;
        $sellingAgentComm = $commission * $sellingAgentPer / 100;

        $faker->addProvider(new \Smknstd\FakerPicsumImages\FakerPicsumImagesProvider($faker));
        $fakeImg = $faker->imageUrl(width: 800, height: 600);

        $imageContent = "";
        $ch = curl_init($fakeImg);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10); // Timeout in seconds
        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo "CURL Error: " . curl_error($ch);
        } else {
            $imageContent = $response;
        }

        curl_close($ch);

        // $imageContent = file_get_contents($fakeImg);

        $fileName = 'cover-image'.uniqid() . '.jpg';
        $localPath = Config('constant.PROPERTY_IMAGE_ROOT_PATH'). $fileName;
        if (!File::exists($localPath)) {
            file_put_contents(public_path($localPath), $imageContent);
        }
        $videos = array();

        $videos[0] = "https://www.youtube.com/watch?v=mririZ3VTh4";
        $videos[1] = "https://www.youtube.com/watch?v=1TRgc0N5OVU";
        $videos[2] = "https://www.youtube.com/watch?v=SHYmj0OKiik";
        $videos[3] = "https://www.youtube.com/watch?v=xRdNMV_8Dis";

        $str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $reference = substr(str_shuffle($str), 0, 5);
        
        return [
            'name' => ucfirst(fake()->word()) . ' Property',
            'description' => fake()->text(),
            'type_id' => $type->id,
            'subtype_id' => $subtype_id,
            'subtype_id2' => $subtype_id2,
            'situation_id' => Situation::all()->random()->id,
            'reference' => $reference. time(). $reference,
            'bedrooms' => ($type->name != 'Plot') ? rand(1, 4) : '',
            'bathrooms' => ($type->name != 'Plot') ? rand(1, 4) : '',
            // 'status_completion' => $this->getRandomValueCompletionStatus(['Completed', 'Under Construction', 'Off Plan']),
            'status_completion' => 'Completed',
            'year' => $year ? $year : '',
            'month' => $month ? $month : null,
            'feeds' => rand(0, 1),
            'property_tenure' => $type->name == 'Commercial' ? rand(0, 1) : 0,
            'listed_as' => 'For Sale',
            'price' => $price,
            'percentage' => $percentage,
            'commission' => $commission,
            'net_price' => $price - $commission,
            'list_agent_per' => $listAgentPer,
            'list_agent_com' => $listAgentComm,
            'sell_agent_per' => $sellingAgentPer,
            'sell_agent_com' => $sellingAgentComm,
            'valuation' => mt_rand(1, 1000),
            'valuation_year' => $year,
            'deed_value' => mt_rand(1, 1000),
            'mini_price' => mt_rand(1, 1000000),
            'comm_fees' => mt_rand(1000, 5000),
            'garbage_tax' => mt_rand(5000, 10000),
            'ibi_fees' => mt_rand(1000, 7000),
            'commission_note' => fake()->text(),
            'street_number' => $faker->buildingNumber(),
            'street_name' => $faker->streetName(),
            'city' => $faker->city(),
            'zipcode' => $faker->postcode(),
            'address' => $faker->address(),
            'latitude' => $faker->latitude(),
            'longitude' => $faker->longitude(),
            'address' => $faker->address(),
            'state' => $faker->state(),
            'country' => 'Spain',
            'size' => $type->name != 'Plot' ? rand(100, 10000) : 0,
            'floors' => $type->name != 'Plot' ? rand(1, 50) : 0,
            'built' => rand(100, 3000),
            'storeys' => $type->name != 'Plot' ? rand(1, 4) : 0,
            'no_of_properties_builtin' => $type->name != 'Plot' ? rand(1, 4) : 0,
            'terrace' => $type->name != 'Plot' ? rand(1, 3000) : 0,
            'levels' => $type->name != 'Plot' ? rand(1, 4) : 0,
            'agency_ref' => $type->name != 'Plot' ? 'REF-' . time() . '-' . ucwords(fake()->text(10)) : '',
            'garden_plot' => $type->name != 'Plot' ? rand(100, 3000) : 0,
            'properties_int_floor_space' => $type->name != 'Plot' ? rand(100, 3000) : 0,
            // 'dimension_type' => $this->getRandomValueFromArray(['Meter', 'Feet']),
            'dimension_type' => 'Meter',
            'plot_size' => $type->name == 'Plot' ? rand(100, 10000) : 0,
            'co2_emission' => rand(2, 150),
            'letter_co2' => chr(rand(ord('A'), ord('G'))),
            'energy_consumption' => mt_rand(10, 500),
            'letter_energy' => chr(rand(ord('A'), ord('G'))),
            'nota_simple' => rand(0, 1),
            'IBI_receipt' => rand(0, 1),
            'first_occupancy_license_aFO' => rand(0, 1),
            'owner_id' => 96,
            'owner_one' => ucfirst(fake()->name()),
            'owner_two' => ucfirst(fake()->name()),
            'key_holder' => ucfirst(fake()->name()),
            'developer' => ucfirst(fake()->name()),
            'key_status' => $this->getRandomValueFromArray(['Vendor', 'In Office', 'Booked Out']),
            'key_id' => 'key_id' . time(),
            'key_details' => 'key_details' . fake()->text(10),
            'private_note' => 'private_note' . fake()->text(15),
            'Lawyer' => 'Lawyer ' . fake()->text(),
            'cover_image' => $fileName,
            'virtual_tour' => $this->getRandomValueFromArray($videos),
            'video_tour' => $this->getRandomValueFromArray($videos),

        ];
    }
    function getRandomValueFromArray($array)
    {
        $randomKey = array_rand($array);
        return $array[$randomKey];
    }

    // /**
    //  * Indicate that the model's email address should be unverified.
    //  */
    // public function unverified(): static
    // {
    //     return $this->state(fn (array $attributes) => [
    //         'email_verified_at' => null,
    //     ]);
    // }

    function getRandomValueCompletionStatus($array)
    {
        // Get a random key from the array
        $randomKey = array_rand($array);

        // Return the corresponding value
        return $array[$randomKey];
    }

    function generateYearOrMonthYear()
    {
        $status_completion = $this->getRandomValueCompletionStatus(['Completed', 'Under Construction', 'Off Plan']);
        if ($status_completion === 'Completed') {
            return rand(2000, date('Y'));
        } else {
            $year = rand(2000, date('Y'));
            $month = rand(1, 12);
            return "{$month}/{$year}";
        }
    }
}