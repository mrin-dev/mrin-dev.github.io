<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns = "http://www.w3.org/1999/xhtml">

    <head>
       
        <title> Phrase Filter </title>

        <!-- External CSS applied to html document -->
        <link href="Phrase.css" rel="stylesheet" type="text/css">
    
    </head>

    <body>

    <?php

        // PHP Session Start function applied to retrieve wordArray and its elements in the previous session "PhraseParse.php". 
        @session_start();
        $wordArray = $_SESSION['wordArray'];
        
        // Retrieves the actions of the buttons from the previous "PhraseParse.php" which is done by POST.
        $B1 = $_POST ['B1'];
        $B2 = $_POST ['B2'];
        // Retrieves the actions of the links from the previous "PhraseParse.php" which is done by GET.
        $L1 = $_GET ['L1'];
        $L2 = $_GET ['L2'];

        echo "<div>";

        // If B1 or L1 are clicked, they will produce the exact same results described below.
        if (isset($B1) || isset($L1)) {

            // Begins creating the table. 
            echo "<p> Your phrase removing WT1 Words : </p>";
            echo "<table>";
            echo "<th> Word </th>";
            echo "<th> Length </th>"; 
            echo "<th> Type </th>";
            echo "</table>";

                // For loop created to loop through each element in the array.
                for ($char = 0; $char < count($wordArray); $char ++) {  

                    echo "<table>";
                    echo "<tr>";
                    
                    // Checks if there are any WT1 words and produces null if there is.
                    if (ctype_alpha(substr($wordArray[$char], 0, 3)) == TRUE & strlen($wordArray[$char]) >=3) {

                        echo "";
                    }

                    // If above is true, the rest of the table will be produced starting with WT2 words checking if they begin with 3 digits.
                    elseif (ctype_digit(substr($wordArray[$char], 0, 3)) == TRUE & strlen($wordArray[$char]) >=3) {

                        echo "<td>", $wordArray[$char], "</td>";
                        echo "<td>", strlen($wordArray[$char]), "</td>";
                        echo "<td> WT2 Word: Starts with 3 digits </td>";

                    }

                        // Followed by the remaining WT3 words.
                        else {

                            echo "<td>", $wordArray[$char], "</td>";
                            echo "<td>", strlen($wordArray[$char]), "</td>";
                            echo "<td> WT3 Word: Undefined </td>";

                        }

                    echo "</tr>";
                    echo "</table>";

                }
                    
        }

        // If B2 or L2 are clicked, they will produce the exact same results described below.
        if (isset($B2) || isset($L2)) {

            // Begins creating table.
            echo "<p> Your phrase removing WT2 Words : </p>";
            echo "<table>";
            echo "<th> Word </th>";
            echo "<th> Length </th>"; 
            echo "<th> Type </th>";
            echo "</table>";

                // For loop created to loop through each element in the array.
                for ($char = 0; $char < count($wordArray); $char ++) {  

                    echo "<table>";
                    echo "<tr>";
                    
                    // Checks if there are any WT2 words and produces null if there is.
                    if (ctype_digit(substr($wordArray[$char], 0, 3)) == TRUE & strlen($wordArray[$char]) >=3) {

                        echo "";
                    }

                    // If above is true, the rest of the table will be produced starting with WT1 words checking if they begin with 3 letters.
                    elseif (ctype_alpha(substr($wordArray[$char], 0, 3)) == TRUE & strlen($wordArray[$char]) >=3) {

                        echo "<td>", $wordArray[$char], "</td>";
                        echo "<td>", strlen($wordArray[$char]), "</td>";
                        echo "<td> WT2 Word: Starts with 3 alphabetic characters </td>";

                    }

                        // Followed by the remaining WT3 words.
                        else {

                            echo "<td>", $wordArray[$char], "</td>";
                            echo "<td>", strlen($wordArray[$char]), "</td>";
                            echo "<td> WT3 Word: Undefined </td>";

                        }

                    echo "</tr>";
                    echo "</table>";

                }
                    
        }

        // A link to go back to the original "PhraseInput.html" page.
        echo "<p> Click <a href='phrase.html'> here </a> to go back to the Phrase Input page. </p>";
        echo "</div>";

    ?>

    </body>

</html>
