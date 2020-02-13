<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns = "http://www.w3.org/1999/xhtml">

    <head>
       
        <title> Phrase Parse </title>

        <!-- External CSS applied to html document -->
        <link href="Phrase.css" rel="stylesheet" type="text/css">
    
    </head>

    <body>

    <?php

        // Retrieves the input text and the action of the button from the previous "PhraseInput.html" document.
        $phrase = $_POST ['phrase'];
        $SubmitPhrase = $_POST ['SubmitPhrase'];

        // Creates an array making each word in the phrase an element.
        $wordArray = preg_split('/\s+/', $phrase);

        echo "<div>";

        // Checks if Submit Phrase button was selected.
        if (isset($SubmitPhrase)) {

            echo "<p id='submit'> The Submit Phrase button was selected. </p>";

        }

        // Error produced if it was not selected.
        else {

            echo "<p id='error'> Error. The Submit Phrase was not selected. </p>";

        }

        // Checks if the input text field is empty or only contains spaces and if true, produces error message with link to go back.
        if (empty(trim($phrase))) {   

            echo "<p id='error'> Error. Input field is empty. Please go back to the <a href='phrase.html'> Phrase Input</a> page and follow the instructions. </p>";
        }

            // Checks if the input text field contains less than 3 words and if true, produces error message with link to go back.
            elseif (count($wordArray) < 3) {

              echo "<p id='error'> Error. Less than 3 words were inputted. Please go back to the <a href='phrase.html'> Phrase Input</a> page and follow the instructions. </p>";   

            }
                // If above are false it will proceed to make them table.
                else {

                    echo "<p> Your phrase parsed into words : </p>";
                    echo "<table>";
                    echo "<th> Word </th>";
                    echo "<th> Length </th>"; 
                    echo "<th> Type </th>";
                    echo "</table>";

                        // For loop created to loop through each element in the array.
                        for ($char = 0; $char < count($wordArray); $char ++) {  

                            echo "<table>";
                            echo "<tr>";
                            // Places a word in table cell
                            echo "<td>", $wordArray[$char], "</td>";
                            // Places the length of word in another table cell
                            echo "<td>", strlen($wordArray[$char]), "</td>";

                                // Checks if the word is a WT1 if it begins with 3 letters.
                                if (ctype_alpha(substr($wordArray[$char], 0, 3)) == TRUE & strlen($wordArray[$char]) >=3) {

                                    // Places below message in table cell if above is true.
                                    echo "<td> WT1 Word: Starts with 3 alphabetic characters </td>";

                                }

                                // Checks if the word is a WT2 if it begins with 3 digits.
                                elseif (ctype_digit(substr($wordArray[$char], 0, 3)) == TRUE & strlen($wordArray[$char]) >=3) {

                                    // Places below message in table cell if above is true.
                                    echo "<td> WT2 Word: Starts with 3 digits </td>";

                                }

                                else {

                                    // Places below message in table cell if both above are false leaving this as a WT3 undefined.
                                    echo "<td> WT3 Word: Undefined </td>";

                                }

                            echo "</tr>";
                            echo "</table>";

                        }
                    
                    echo "<div>";
                    // Form created that is sent to the PHP document "PhraseFilter.php".
                    echo "<br /> <form action='PhraseFilter.php' method='post'>";
                    // Button B1 and Link L1 have the same function.
                    echo "<button style='margin:10px' type='submit' name='B1'> Show not WT1 </button>";
                    // Button B2 and Link L2 have the same function.
                    echo "<button style='margin:10px' type='submit' name='B2'> Show not WT2 </button> <br />";
                    echo "<br /> <a style='margin:38px' href='PhraseFilter.php?L1' name='L1'> Show not WT1 </a>";
                    echo "<a style='margin:38px' href='PhraseFilter.php?L2' name='L2'> Show not WT2 </a>";
                    echo "</form>";
                    echo "</div>";

                    // PHP Session Start function used to keep the values that were stored in the array wordArray and use it in the "PhraseFilter.php" file.
                    session_start();
                    $_SESSION['wordArray'] = $wordArray;

                }
        
        echo "</div>";
        
    ?>

    </body>

</html>