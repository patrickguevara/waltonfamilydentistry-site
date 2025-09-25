<?php

return [
    'name' => env('PRACTICE_NAME', 'Walton Family Dentistry'),
    'description' => env('PRACTICE_DESCRIPTION', 'Modern, judgment-free dental care in Austin with comprehensive services for the entire family.'),
    'phone' => env('PHONE_NUMBER', '5129538362'),
    'fax' => env('FAX_NUMBER', '5129538365'),
    'scheduling_url' => env('SCHEDULING_URL', 'https://example.com/schedule'),
    'email' => env('CONTACT_EMAIL', 'hello@waltonfamilydentistry.com'),
    'address' => [
        'street' => env('STREET_ADDRESS', '4100 E. 51st St., Suite 100'),
        'city' => env('CITY', 'Austin'),
        'state' => env('STATE', 'TX'),
        'zip' => env('ZIP', '78723'),
    ],
    'maps_embed' => env('GOOGLE_MAPS_EMBED_URL', ''),
    'social' => [
        'facebook' => env('FACEBOOK_URL'),
        'instagram' => env('INSTAGRAM_URL'),
        'tiktok' => env('TIKTOK_URL'),
    ],
    'brand' => [
        'primary' => '#000000',
        'background' => '#ffffff',
        'accent' => env('ACCENT_COLOR', '#000000'),
    ],
];
