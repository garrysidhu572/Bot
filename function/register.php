<?php
if (preg_match('/\/register/', $message)) {
    // Load the existing users.
    $users = file_get_contents('Database/free.txt');
    $freeusers = explode("\n", $users);

    // Check if the user has already registered.
    if (in_array($userId, $freeusers)) {
        $response = '<b>User Already Registered ❌</b>';
    } else {
        // If not, add the user to the file.
        $file = fopen('Database/free.txt', 'a');
        fwrite($file, $userId . "\n");
        fclose($file);

        $response = '<b>User Registered Successfully ✅!Now Click </b>/start';
    }

    // Send the response.
    reply_tox($chatId, $message_id, $keyboard, $response);
}
?>
