<?php

namespace App\Console\Commands;

use App\Enum\HotelBookingStatus;
use App\Models\Client;
use App\Models\HotelBooking;
use Carbon\Carbon;
use Illuminate\Console\Command;
use App\GDSIntegration\Tbo\GenerateInvoice\GenerateInvoice as Invoice;

class GenerateInvoice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:voucher';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This commands for convert confirmed Hotel booking to voucher booking from TBO';

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
        $hotelConfirmedBookings = HotelBooking::where('hotel_booking_status_id',HotelBookingStatus::Confirmed)
        ->where('last_cancellation_deadline',Carbon::tomorrow()->format('Y-m-d'))->get();

        foreach ($hotelConfirmedBookings as $confirmedBooking){
            $client = Client::find($confirmedBooking->client_id);
            $generate_invoice = new Invoice($client);
            $response = $generate_invoice->generateInvoiceRequest($confirmedBooking->booking_number);
            $statusCode = $response->Status->StatusCode;
            if($statusCode == 01){
                $confirmedBooking->hotel_booking_status_id = HotelBookingStatus::Vouchered;
                $confirmedBooking->update();
            }else{
                continue;
            }
        }
    }
}
