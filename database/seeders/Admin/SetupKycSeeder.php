<?php

namespace Database\Seeders\Admin;

use App\Constants\GlobalConst;
use App\Models\Admin\SetupKyc;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SetupKycSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
               'slug'          => "user",
               'user_type'     => GlobalConst::USER,
               'fields'        =>  
               json_encode(
                  [
                        [
                              "type" => "file", 
                              "label" => "Back", 
                              "name" => "back", 
                              "required" => false, 
                              "validation" => [
                                 "max" => "2", 
                                 "mimes" => [
                                    "jpg", 
                                    " png" 
                                 ], 
                                 "min" => 0, 
                                 "options" => [
                                    ], 
                                 "required" => false 
                              ] 
                           ], 
                        [
                                          "type" => "file", 
                                          "label" => "Front", 
                                          "name" => "front", 
                                          "required" => true, 
                                          "validation" => [
                                             "max" => "2", 
                                             "mimes" => [
                                                "jpg", 
                                                " png" 
                                             ], 
                                             "min" => 0, 
                                             "options" => [
                                                ], 
                                             "required" => true 
                                          ] 
                                       ], 
                        [
                                                      "type" => "select", 
                                                      "label" => "ID Type", 
                                                      "name" => "id_type", 
                                                      "required" => true, 
                                                      "validation" => [
                                                         "max" => 0, 
                                                         "min" => 0, 
                                                         "mimes" => [
                                                         ], 
                                                         "options" => [
                                                               "NID", 
                                                               " Driving License", 
                                                               " Passport" 
                                                            ], 
                                                         "required" => true 
                                                      ] 
                                                   ] 
                  ]
               ),
               'status'        => true,
               'last_edit_by'  => 1,  
            ],
        ];
        
        SetupKyc::upsert($data,['user_type','slug'],['fields','status']);
    }
}
