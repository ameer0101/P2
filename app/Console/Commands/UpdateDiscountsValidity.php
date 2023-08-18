<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Discount_item;
use Carbon\Carbon;

class UpdateDiscountsValidity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'discounts:update-validity';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the validity of discounts based on their duration';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $discounts = Discount_item::where('duration', '<', Carbon::today())->get();
        foreach ($discounts as $discount) {
            $discount->valid = false;
            $discount->save();
        }
    }
}
