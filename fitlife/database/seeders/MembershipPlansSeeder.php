<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MembershipPlansSeeder extends Seeder
{
    public function run()
    {
        $plans = [
            [
                'name' => 'Basic',
                'slug' => Str::slug('Basic'),
                'price' => 29.99,
                'duration' => 'monthly',
                'description' => 'Basic membership plan for beginners.',
                'features' => "Gym Access\nLocker Facility\n24/7 Access",
                'color_class' => 'bronze',
                'is_active' => true,
                'display_order' => 1,
            ],
            [
                'name' => 'Standard',
                'slug' => Str::slug('Standard'),
                'price' => 49.99,
                'duration' => 'monthly',
                'description' => 'Standard plan with additional facilities.',
                'features' => "Gym Access\nLocker Facility\nGroup Classes\nPersonal Training",
                'color_class' => 'silver',
                'is_active' => true,
                'display_order' => 2,
            ],
            [
                'name' => 'Premium',
                'slug' => Str::slug('Premium'),
                'price' => 79.99,
                'duration' => 'monthly',
                'description' => 'Premium plan with all amenities included.',
                'features' => "Gym Access\nLocker Facility\nGroup Classes\nPersonal Training\nSauna Access\nSwimming Pool",
                'color_class' => 'gold',
                'is_active' => true,
                'display_order' => 3,
            ],
            [
                'name' => 'VIP',
                'slug' => Str::slug('VIP'),
                'price' => 149.99,
                'duration' => 'monthly',
                'description' => 'VIP plan for elite members.',
                'features' => "Gym Access\nLocker Facility\nPersonal Trainer\nSpa Access\nSwimming Pool\nNutrition Plan",
                'color_class' => 'vip',
                'is_active' => true,
                'display_order' => 4,
            ],
            [
                'name' => 'Student Plan',
                'slug' => Str::slug('Student Plan'),
                'price' => 19.99,
                'duration' => 'monthly',
                'description' => 'Affordable plan for students.',
                'features' => "Gym Access\nLocker Facility\nStudy Lounge",
                'color_class' => 'bronze',
                'is_active' => true,
                'display_order' => 5,
            ],
            [
                'name' => 'Couple Plan',
                'slug' => Str::slug('Couple Plan'),
                'price' => 89.99,
                'duration' => 'monthly',
                'description' => 'Membership plan for couples.',
                'features' => "Gym Access\nLocker Facility\nCouple Yoga\nGroup Classes",
                'color_class' => 'silver',
                'is_active' => true,
                'display_order' => 6,
            ],
            [
                'name' => 'Family Plan',
                'slug' => Str::slug('Family Plan'),
                'price' => 129.99,
                'duration' => 'monthly',
                'description' => 'Family-friendly membership plan.',
                'features' => "Gym Access\nLocker Facility\nKids Zone\nSwimming Pool\nGroup Classes",
                'color_class' => 'gold',
                'is_active' => true,
                'display_order' => 7,
            ],
            [
                'name' => 'Quarterly Basic',
                'slug' => Str::slug('Quarterly Basic'),
                'price' => 79.99,
                'duration' => 'quarterly',
                'description' => 'Basic plan billed quarterly.',
                'features' => "Gym Access\nLocker Facility\n24/7 Access",
                'color_class' => 'bronze',
                'is_active' => true,
                'display_order' => 8,
            ],
            [
                'name' => 'Quarterly Standard',
                'slug' => Str::slug('Quarterly Standard'),
                'price' => 139.99,
                'duration' => 'quarterly',
                'description' => 'Standard plan billed quarterly.',
                'features' => "Gym Access\nLocker Facility\nGroup Classes\nPersonal Training",
                'color_class' => 'silver',
                'is_active' => true,
                'display_order' => 9,
            ],
            [
                'name' => 'Yearly Premium',
                'slug' => Str::slug('Yearly Premium'),
                'price' => 899.99,
                'duration' => 'yearly',
                'description' => 'Premium plan billed yearly.',
                'features' => "Gym Access\nLocker Facility\nGroup Classes\nPersonal Training\nSauna Access\nSwimming Pool",
                'color_class' => 'gold',
                'is_active' => true,
                'display_order' => 10,
            ],
            [
                'name' => 'Elite VIP',
                'slug' => Str::slug('Elite VIP'),
                'price' => 1799.99,
                'duration' => 'yearly',
                'description' => 'Ultimate VIP membership.',
                'features' => "Gym Access\nLocker Facility\nPersonal Trainer\nSpa Access\nSwimming Pool\nNutrition Plan\nPrivate Lounge",
                'color_class' => 'vip',
                'is_active' => true,
                'display_order' => 11,
            ],
            [
                'name' => 'Corporate Plan',
                'slug' => Str::slug('Corporate Plan'),
                'price' => 499.99,
                'duration' => 'monthly',
                'description' => 'For companies and employees.',
                'features' => "Gym Access\nLocker Facility\nGroup Classes\nTeam Training\nNutrition Plan",
                'color_class' => 'diamond',
                'is_active' => true,
                'display_order' => 12,
            ],
        ];

        // Add timestamps
        $now = Carbon::now();
        foreach ($plans as &$plan) {
            $plan['created_at'] = $now;
            $plan['updated_at'] = $now;
        }

        DB::table('membership_plans')->insert($plans);
    }
}
