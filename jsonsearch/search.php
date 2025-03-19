<?php
$jsonDataPath = __DIR__ . '/data.json';

if (file_exists($jsonDataPath)) {
    $jsonData = json_decode(file_get_contents($jsonDataPath), true);
} else {
    die('The data.json file does not exist.');
}

$checkboxValues = [];
foreach ($jsonData as $entry) {
    foreach ($entry as $key => $value) {
        if (!in_array($value, $checkboxValues) && $value !== "") {
            $checkboxValues[] = $value;
        }
    }
}

foreach ($checkboxValues as $value) {
    echo '<label><input type="checkbox" name="checkbox[]" value="' . $value . '"> ' . $value . '</label><br>';
}

// Hidden input to store checked checkboxes
echo '<input type="hidden" name="selectedCheckboxes" id="selectedCheckboxes" value="">';
?>