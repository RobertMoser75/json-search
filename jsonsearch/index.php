<?php
//Loads all CSS and JS for current component.  No need to modify this code. 
require_once get_template_directory()."/mainincludes/findcomponentincludes.php";
recursiveGlob(__DIR__, 'css');
recursiveGlob(__DIR__, 'js');
?>
<?php

$json = json_decode(file_get_contents(__DIR__ . '/data.json'), true);

if ($json && is_array($json) && count($json) > 0) {
    $filterTitles = [
        "Focus Areas",
        "Geography",
        "Sub-Domain",
        "Domain",
        "Target Population",
        "Delivering Entity",
        "Outcome Type",
        "PHEPR Capability 1",
        "Response Phase",
        "Source Study Type",
        "Directionality of Response"
    ];
?>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <form id='searchForm' class='box-search' method='post' action=''>
                <div class='SRCH-wrapper'>
                    <input placeholder='Enter Search Term' type='text' name='search' id='search'
                        value='<?= isset($_POST['search']) ? $_POST['search'] : '' ?>'>
                </div>
                <input type='submit' value='search'>

                <?php foreach ($filterTitles as $filterTitle) : ?>
                <h3><?= $filterTitle ?></h3>
                <?php
                    $uniqueValues = array_unique(array_column($json, $filterTitle));
                    foreach ($uniqueValues as $value) {
                        if (!empty($value)) {
                            $checked = isset($_POST[$filterTitle]) && in_array($value, $_POST[$filterTitle]) ? 'checked' : '';
                            echo '<label><input type="checkbox" name="' . $filterTitle . '[]" value="' . $value . '" ' . $checked . '> ' . $value . '</label><br>';
                        }
                    }
                    ?>
                <?php endforeach; ?>
            </form>
        </div>
        <div class="col-md-9">
            <div class="results-wrapper">
                <h2>Results</h2>
                <?php
$filteredData = $json;

// Process search term
$searchTerm = isset($_POST['search']) ? strtolower($_POST['search']) : '';

// Filter data based on search term
if (!empty($searchTerm)) {
    $filteredData = array_filter($filteredData, function ($entry) use ($searchTerm) {
        foreach ($entry as $field) {
            // Check if the search term is found in any field (case-insensitive)
            if (stripos(strtolower($field), $searchTerm) !== false) {
                return true;
            }
        }
        return false;
    });
}

// Process checkbox filters
foreach ($filterTitles as $filterTitle) {
    if (!empty($_POST[$filterTitle])) {
        $selectedValues = $_POST[$filterTitle];
        $filteredData = array_filter($filteredData, function ($entry) use ($filterTitle, $selectedValues) {
            return in_array($entry[$filterTitle], $selectedValues);
        });
    }
}

// Display results
echo '<ul>';
foreach ($filteredData as $index => $item) {

    include '/results.php';

}
echo '</ul>';
?>
            </div>
        </div>
    </div>
</div>
<?php } ?>