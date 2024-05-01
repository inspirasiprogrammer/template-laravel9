<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Option;

class OptiontableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $options = array(
      array('id' => '1', 'key' => 'primary_data', 'value' => '{"logo":"\\/uploads\/logo.png","favicon":"uploads\\/favicon.png","contact_email":"contact@email.com","contact_phone":"8801234567890","address":"Bowery St, New York","socials":{"facebook":"https:\\/\\/www.facebook.com\\/","youtube":"https:\\/\\/youtube.com\\/","twitter":"https:\\/\\/twitter.com\\/","instagram":"https:\\/\\/www.instagram.com\\/","linkedin":"https:\\/\\/linkedin.com\\/"},"footer_logo":"\\/uploads\\/23\\/04\\/16809882645YTjTdvCTduL5D1hCfX7.png"}', 'lang' => 'en'),
      array('id' => '2', 'key' => 'languages', 'value' => '{"en":"English"}', 'lang' => 'en'),
    );

    Option::insert($options);
  }
}
