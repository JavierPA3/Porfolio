<?php
use App\Models\User;

// Create a User instance
$user = User::getInstance();

// Set user properties for a specific user ID (assume ID 1)
$userId = 1;
$user->setName("UpdatedName");
$user->setSurname("UpdatedSurname");
$user->setPhoto("new_photo.jpg"); // Replace "new_photo.jpg" with the desired photo
$user->setCategoriaProfesional("NewCategory");
$user->setProfileSummary("NewProfileSummary");
$user->setPasswd("NewPassword");

// Save the updated user to the database
$user->update();

// Retrieve the user details after updating

// Perform assertions based on your expectations
// For example, check if the user details were updated successfully

