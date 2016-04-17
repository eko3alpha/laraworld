<?php

namespace ErnySans\Laraworld\Database\seeds;

use Illuminate\Database\Seeder;
use ErnySans\Laraworld\Models\TimeZones;

class TimeZonesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return  void
     */
    public function run()
    {
        // Empty the table
        TimeZones::truncate();

        //Get all of the countries
        $JSON_timezones = TimeZones::allJSON();

        foreach ($JSON_timezones as $timezone) {
            TimeZones::create([
                'name'      => ((isset($timezone['value'])) ? $timezone['value'] : null),
                'abbr'      => ((isset($timezone['abbr'])) ? $timezone['abbr'] : null),
                'offset'    => ((isset($timezone['offset'])) ? $timezone['offset'] : null),
                'isdst'     => ((isset($timezone['isdst'])) ? $timezone['isdst'] : null),
                'text'      => ((isset($timezone['text'])) ? $timezone['text'] : null),
                'utc'       => ((isset($timezone['utc'])) ? $timezone['utc'] : null),
            ]);
        }
    }
}
