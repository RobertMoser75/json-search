# json-search
 
Data Filter and Search System

This PHP-based web application allows users to search and filter data from a JSON file using various criteria. It provides a dynamic form for searching and filtering based on multiple fields, displaying the filtered results interactively.
Features:

    Search Functionality: Allows users to search for terms across multiple fields, case-insensitively.
    Filter Options: Users can filter results by categories such as "Focus Areas," "Geography," "Target Population," and more.
    Dynamic Form: The form is generated dynamically based on the available filter categories, and checkboxes are populated with unique values from the JSON data.
    Responsive UI: The layout is structured using a grid system (Bootstrap classes) to ensure a responsive design.

File Structure:

    data.json: Contains the raw data to be filtered.
    results.php: Displays each filtered result.
    index.php: Main entry point of the web application, containing the form and search logic.
    search.php: Handles the search and filter logic, and includes the results in the UI.

How It Works:

    Load JSON Data: The JSON data is loaded from data.json and decoded into a PHP array.
    Search Input: Users can enter a search term that is applied to all fields in the dataset.
    Checkbox Filters: Users can select multiple filter options, and the results are dynamically filtered based on their selections.
    Display Results: The filtered data is displayed in an interactive list, with each item rendered by including results.php.

Requirements:

    PHP 7.0 or higher
    Web server (e.g., Apache or Nginx) configured to run PHP

How to Run:

    Clone this repository to your local machine.
    Place it on your PHP-enabled web server.
    Access index.php in your browser to use the search and filtering system.