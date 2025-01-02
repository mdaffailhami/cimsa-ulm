<?php

if (! function_exists('generatePassword')) {
    function generatePassword()
    {
        $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $lowercase = 'abcdefghijklmnopqrstuvwxyz';
        $number = '0123456789';

        $uppercase_chosen = [];
        $lowercase_chosen = [];
        $number_chosen = [];

        // Select 3 random uppercase letters
        for ($i = 0; $i < 3; $i++) {
            $uppercase_chosen[] = $uppercase[random_int(0, strlen($uppercase) - 1)];
        }

        // Select 6 random lowercase letters
        for ($i = 0; $i < 6; $i++) {
            $lowercase_chosen[] = $lowercase[random_int(0, strlen($lowercase) - 1)];
        }

        // Select 3 random numbers
        for ($i = 0; $i < 3; $i++) {
            $number_chosen[] = $number[random_int(0, strlen($number) - 1)];
        }

        // Merge the selected characters into one array
        $password = array_merge($uppercase_chosen, $lowercase_chosen, $number_chosen);

        // Shuffle the array to randomize the order
        shuffle($password);

        // Convert the array into a string
        return implode('', $password);
    }
}
