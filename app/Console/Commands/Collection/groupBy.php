<?php

namespace App\Console\Commands\Collection;

use Illuminate\Console\Command;

class groupBy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'collection:groupby';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users_collection = collect([
            ['name' => 'taro', 'age' => '20'],
            ['name' => 'jiro', 'age' => '20'],
            ['name' => 'saburo', 'age' => '21'],
            ['name' => 'hanako', 'age' => '21'],
            ['name' => 'mika', 'age' => '20'],
        ]);

        $users_age_group = $users_collection->groupBy('age');

        dump('元々のcollectionクラス');
        dump($users_collection->toArray());
        dump('年齢でgroupByを実行したデータ');
        dump($users_age_group->toArray());

        $users = [
            ['name' => 'taro', 'age' => '20'],
            ['name' => 'jiro', 'age' => '20'],
            ['name' => 'saburo', 'age' => '21'],
            ['name' => 'hanako', 'age' => '21'],
            ['name' => 'mika', 'age' => '20'],
        ];

        $groupby_users = [];
        foreach ($users as $user) {
            $groupby_users[$user['age']][] = $user;
        }
        dump('従来の方法で年齢別にしたデータ');
        dump($groupby_users);
    }
}
