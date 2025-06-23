<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Array Functions Demonstration</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color:rgb(219, 67, 40); 
            color:rgb(81, 81, 55); 
        }
        .container {
            max-width: 1000px;
            margin: 2rem auto;
            padding: 1.5rem;
            background-color:hsl(194, 86.40%, 91.40%);
            border-radius: 0.75rem; 
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .section-heading {
            color:rgb(44, 76, 121); 
            border-bottom: 2px solid #e5e7eb;
            padding-bottom: 0.5rem;
            margin-bottom: 1.5rem;
        }
        .function-group {
            margin-bottom: 2rem;
            padding: 1rem;
            background-color:rgb(210, 226, 198);
            border-radius: 0.5rem;
            border: 1px solid #e5e7eb;
        }
        .array-display {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-top: 0.75rem;
        }
        .array-box {
            flex: 1;
            padding: 0.75rem;
            border: 1px solidrgb(83, 73, 11);
            border-radius: 0.5rem;
            background-color:rgb(229, 231, 89);
            min-height: 100px; 
        }
        .array-box:first-child {
            margin-right: 1rem;
        }
        .array-box h4 {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #4b5563;
        }
        .array-box pre {
            white-space: pre-wrap; 
            word-break: break-all; 
            font-size: 0.875rem; 
            color: #1f2937;
        }
        .function-info {
            font-weight: 500;
            color: #3b82f6; 
            margin-bottom: 0.75rem;
            font-size: 1rem;
        }
        .description-text {
            font-size: 0.95rem;
            color: #4b5563;
            margin-bottom: 0.75rem;
        }
        .result-text {
            font-size: 0.95rem;
            color: #10b981; 
            font-weight: 500;
            margin-top: 0.5rem;
        }
        .result-text.fail {
            color: #ef4444; 
        }
    </style>
</head>
<body class="p-4">
    <div class="container">
        <h1 class="text-3xl font-bold text-center mb-6 text-gray-800">HANDS-ON LABORATORY: ARRAY FUNCTIONS</h1>
        <p class="text-center text-lg mb-8 text-gray-600">
            This program demonstrates various PHP array functions. Observe the initial array values and how they change after each function's execution.
        </p>

        <?php

        function displayArrayComparison($initialArray, $functionDescription, $modifiedArray, $functionName = '') {
            echo '<div class="function-group">';
            echo '<div class="function-info">';
            echo 'Function: ' . htmlspecialchars($functionName) . '';
            echo '</div>';
            echo '<div class="description-text">';
            echo 'Description: ' . htmlspecialchars($functionDescription);
            echo '</div>';
            echo '<div class="array-display">';
            echo '<div class="array-box">';
            echo '<h4>Initial Values of the Array</h4>';
            echo '<pre>'; print_r($initialArray); echo '</pre>';
            echo '</div>';
            echo '<div class="array-box">';
            echo '<h4>Values of the Array After</h4>';
            echo '<pre>'; print_r($modifiedArray); echo '</pre>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }

        // Helper function to display search results
        function displaySearchResult($initialArray, $functionName, $functionDescription, $result, $searchTerm, $type) {
            echo '<div class="function-group">';
            echo '<div class="function-info">';
            echo 'Function: ' . htmlspecialchars($functionName) . '';
            echo '</div>';
            echo '<div class="description-text">';
            echo 'Description: ' . htmlspecialchars($functionDescription);
            echo '</div>';
            echo '<div class="array-display">';
            echo '<div class="array-box w-full">';
            echo '<h4>Current Array</h4>';
            echo '<pre>'; print_r($initialArray); echo '</pre>';
            echo '<h4 class="mt-4">Search Result:</h4>';
            if ($type == 'in_array') {
                echo '<p class="result-text ' . ($result ? '' : 'fail') . '">Searching for "' . htmlspecialchars($searchTerm) . '": ' . ($result ? 'MATCH FOUND' : 'MATCH NOT FOUND') . '</p>';
            } elseif ($type == 'array_key_exists') {
                echo '<p class="result-text ' . ($result ? '' : 'fail') . '">Searching for key "' . htmlspecialchars($searchTerm) . '": ' . ($result ? 'MATCH FOUND' : 'MATCH NOT FOUND') . '</p>';
            }
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }

        // Declare THREE different arrays
        $fruits = ["apple", "banana", "cherry", "date", "elderberry", "fig", "grape", "honeydew", "kiwi", "lemon", "mango"];
        $numbers = [5, 2, 8, 1, 9, 3, 7, 4, 10, 6, 0];
        // Associative array with a duplicate value for array_unique demonstration
        $associativeArray = ["a" => 10, "c" => 30, "b" => 20, "d" => 40, "e" => 50, "f" => 60, "g" => 70, "h" => 80, "i" => 90, "j" => 100, "l" => 10, "m" => 10];


        echo '<h2 class="text-2xl font-semibold mb-4 section-heading">Array Functions Demonstration: Fruits Array</h2>';
        // --- Sorting Functions (Fruits Array) ---
        echo '<h3 class="text-xl font-semibold mb-3 text-gray-700">Sorting Arrays</h3>';
        $tempFruits = $fruits;
        sort($tempFruits);
        displayArrayComparison($fruits, "Sorts the elements of an indexed array in ascending order. Re-indexes the array.", $tempFruits, "sort(\$array)");

        $tempFruits = $fruits;
        rsort($tempFruits);
        displayArrayComparison($fruits, "Sorts the elements of an indexed array in descending order. Re-indexes the array.", $tempFruits, "rsort(\$array)");

        // --- Adding and Removing Elements (Fruits Array) ---
        echo '<h3 class="text-xl font-semibold mb-3 text-gray-700 mt-6">Adding and Removing an Array Element (End/Beginning)</h3>';

        $tempFruits = $fruits;
        array_push($tempFruits, "orange", "pineapple");
        displayArrayComparison($fruits, "Pushes one or more elements onto the end of array.", $tempFruits, "array_push(\$array, 'orange', 'pineapple')");

        $tempFruits = $fruits; // Reset for pop
        $poppedElement = array_pop($tempFruits);
        displayArrayComparison($fruits, "Pops the last element off of the end of array. (Removed: " . htmlspecialchars($poppedElement) . ")", $tempFruits, "array_pop(\$array)");


        echo '<h2 class="text-2xl font-semibold mb-4 section-heading mt-8">Array Functions Demonstration: Numbers Array</h2>';
        // --- Sorting Functions (Numbers Array) ---
        echo '<h3 class="text-xl font-semibold mb-3 text-gray-700">Sorting Arrays</h3>';
        $tempNumbers = $numbers;
        sort($tempNumbers);
        displayArrayComparison($numbers, "Sorts the elements of an indexed array in ascending order. Re-indexes the array.", $tempNumbers, "sort(\$array)");

        $tempNumbers = $numbers;
        rsort($tempNumbers);
        displayArrayComparison($numbers, "Sorts the elements of an indexed array in descending order. Re-indexes the array.", $tempNumbers, "rsort(\$array)");

        // --- Adding and Removing Elements (Numbers Array) ---
        echo '<h3 class="text-xl font-semibold mb-3 text-gray-700 mt-6">Adding and Removing an Array Element (End/Beginning)</h3>';

        $tempNumbers = $numbers;
        $shiftedElement = array_shift($tempNumbers);
        displayArrayComparison($numbers, "Shifts an element off the beginning of array. (Removed: " . htmlspecialchars($shiftedElement) . ")", $tempNumbers, "array_shift(\$array)");

        $tempNumbers = $numbers;
        array_unshift($tempNumbers, 99, 101);
        displayArrayComparison($numbers, "Adds one or more elements to the beginning of an array.", $tempNumbers, "array_unshift(\$array, 99, 101)");

        // --- Adding and Removing Elements within an Array (Numbers Array) ---
        echo '<h3 class="text-xl font-semibold mb-3 text-gray-700 mt-6">Adding and Removing Elements within an Array</h3>';

        $tempNumbers = $numbers;
        $slicedArray = array_slice($tempNumbers, 2, 5); // From index 2, take 5 elements
        displayArrayComparison($tempNumbers, "Extracts a slice of the array. (Slice from index 2, length 5)", $slicedArray, "array_slice(\$array, 2, 5)");

        $tempNumbers = $numbers;
        $removedElements = array_splice($tempNumbers, 3, 2, [1000, 2000]); // Remove 2 elements from index 3, insert 1000, 2000
        displayArrayComparison($numbers, "Removes elements from an array and replaces it with new elements. (Removed: " . implode(", ", $removedElements) . ", Added: 1000, 2000 at index 3)", $tempNumbers, "array_splice(\$array, 3, 2, [1000, 2000])");


        echo '<h2 class="text-2xl font-semibold mb-4 section-heading mt-8">Array Functions Demonstration: Associative Array</h2>';
        // --- Sorting Functions (Associative Array) ---
        echo '<h3 class="text-xl font-semibold mb-3 text-gray-700">Sorting Arrays</h3>';

        $tempAssociative = $associativeArray;
        asort($tempAssociative);
        displayArrayComparison($associativeArray, "Sorts an associative array in ascending order, according to the value.", $tempAssociative, "asort(\$array)");

        $tempAssociative = $associativeArray;
        arsort($tempAssociative);
        displayArrayComparison($associativeArray, "Sorts an associative array in descending order, according to the value.", $tempAssociative, "arsort(\$array)");

        $tempAssociative = $associativeArray;
        ksort($tempAssociative);
        displayArrayComparison($associativeArray, "Sorts an associative array in ascending order, according to the key.", $tempAssociative, "ksort(\$array)");

        $tempAssociative = $associativeArray;
        krsort($tempAssociative);
        displayArrayComparison($associativeArray, "Sorts an associative array in descending order, according to the key.", $tempAssociative, "krsort(\$array)");

        // --- Searching Arrays (Associative Array) ---
        echo '<h3 class="text-xl font-semibold mb-3 text-gray-700 mt-6">Searching Arrays (Match Found, Match not Found)</h3>';

        // in_array example (with fruits for clarity, though it can work on values of associative array)
        displaySearchResult($fruits, "in_array(\$value, \$array)", "Checks if a value exists in an array.", in_array("banana", $fruits), "banana", "in_array");
        displaySearchResult($fruits, "in_array(\$value, \$array)", "Checks if a value exists in an array.", in_array("grapefruit", $fruits), "grapefruit", "in_array");

        // array_key_exists example
        displaySearchResult($associativeArray, "array_key_exists(\$key, \$array)", "Checks if the specified key exists in the array.", array_key_exists("c", $associativeArray), "c", "array_key_exists");
        displaySearchResult($associativeArray, "array_key_exists(\$key, \$array)", "Checks if the specified key exists in the array.", array_key_exists("z", $associativeArray), "z", "array_key_exists");


        // --- Removing Duplicate Elements (Associative Array) ---
        echo '<h3 class="text-xl font-semibold mb-3 text-gray-700 mt-6">Removing Duplicate Elements of an Array</h3>';

        $tempAssociative = $associativeArray;
        $uniqueArray = array_unique($tempAssociative);
        displayArrayComparison($associativeArray, "Removes duplicate values from an array.", $uniqueArray, "array_unique(\$array)");

        // array_values is usually used after array_unique if you want re-indexed numeric keys
        $tempAssociative = $associativeArray;
        $uniqueValues = array_values(array_unique($tempAssociative));
        displayArrayComparison($associativeArray, "Returns all the values of an array and re-indexes the array numerically. Often used after array_unique to reset keys.", $uniqueValues, "array_values(array_unique(\$array))");

        ?>
    </div>
</body>
</html>
