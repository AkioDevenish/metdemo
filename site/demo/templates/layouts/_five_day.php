<?php
foreach ($messages as $message) {
    if ($message['type'] == 'communications' && $message['data']['website_banner'] == 0 && $message['data']['is_official_statement'] == 0 && $message['data']['publish'] == 1) {
        if (strpos($message['data']['title'], 'Five-Day Weather Forecast') !== false) {
            echo "<h2>Title: " . $message['data']['title'] . "</h2>";
            echo "<p>Date: " . $message['data']['date'] . "</p>";
            echo "<p>Issuance Time: " . $message['data']['issuance_time'] . "</p>";
            echo "<p>Content: " . $message['data']['content'] . "</p>";
            echo "<p>Author: " . $message['data']['author'] . "</p>";
            echo "<p>Role: " . $message['data']['role'] . "</p>";
            echo "<hr>";
        }
    }
}
?>
