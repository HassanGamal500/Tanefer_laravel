<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsertPayfortToThirdPartyAccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('third_party_accounts')->insert(
            [
                'username' => 'CwCfehEU',
                'password' => encrypt('Xnx4srzFskSSrNGkxlr8'),
                'additional_attr' => 'Payfort',
                'rest_url' => 'https://sbpaymentservices.payfort.com',
                'soap_url' => 'https://sbcheckout.payfort.com',
                'third_party_type' => 'paymentGateway'
            ]
        );
    }
}
