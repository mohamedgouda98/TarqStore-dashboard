<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\AdminTest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminsCount = Admin::count();

        $listOfAdmins = $this->generateAdminsList($adminsCount);

        foreach ($listOfAdmins as $admin)
        {
            AdminTest::create([
                'title' => Str::random(10),
                'admin_id' => Admin::factory()->create()->id
            ]);
        }

    }


    public function checkAdmin($id)
    {
       return  Admin::where('id', $id)->exists();
    }

    public function generateAdminsList($adminsCount)
    {
        $list= [];
        for ($i=0; $i<$adminsCount; $i++)
        {
            $list[] = $this->generateRandom($adminsCount);
        }
        return $list;
    }


    public function generateRandom($adminsCount)
    {
        $adminId = rand(1,$adminsCount);
        if(!$this->checkAdmin($adminId))
        {
            return  $this->generateRandom($adminsCount);
        }

        return $adminId;
    }

}
