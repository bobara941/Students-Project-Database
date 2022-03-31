<html>
    <head>
        <title>Add Student</title>
    </head>
    <body>
        
        <?php
        
            if(isset($_POST['submit'])) {
                
                $data_missing = array();
                
                if(empty($_POST['first_name'])) {
                    
                    $data_missing[] = 'First Name';
                    
                } else {
                    
                    $f_name = trim($_POST['first_name']);
                    
                }
                
                if(empty($_POST['last_name'])) {
                    
                    $data_missing[] = 'Last Name';
                    
                } else {
                    
                    $l_name = trim($_POST['last_name']);
                    
                }
                
                if(empty($_POST['email'])) {
                    
                    $data_missing[] = 'Eamil';
                    
                } else {
                    
                    $email = trim($_POST['email']);
                    
                }
                
                if(empty($_POST['street'])) {
                    
                    $data_missing[] = 'Street';
                    
                } else {
                    
                    $street = trim($_POST['street']);
                    
                }
                
                if(empty($_POST['city'])) {
                    
                    $data_missing[] = 'City';
                    
                } else {
                    
                    $city = trim($_POST['city']);
                    
                }
                
                if(empty($_POST['state'])) {
                    
                    $data_missing[] = 'State';
                    
                } else {
                    
                    $state = trim($_POST['state']);
                    
                }
                
                if(empty($_POST['zip'])) {
                    
                    $data_missing[] = 'Zip';
                    
                } else {
                    
                    $zip = trim($_POST['zip']);
                    
                }
                
                if(empty($_POST['phone'])) {
                    
                    $data_missing[] = 'Phone';
                    
                } else {
                    
                    $phone = trim($_POST['phone']);
                    
                }
                
                if(empty($_POST['birth_date'])) {
                    
                    $data_missing[] = 'Birth Date';
                    
                } else {
                    
                    $b_date = trim($_POST['birth_date']);
                    
                }
                
                if (empty($data_missing)) {
                    
                    require_once 'mysqli_connect.php';
                    
                    $query = "INSERT INTO students (first_name, last_name, email, street, city, 
                        state, zip, phone, birth_date, sex, date_entered, 
                        lunch_cost, student_id) VALUES (?, ?, ?, ?, ?, ?, 
                        ?, ?, ?, ?, NOW(), ?, NULL)";
                    
                    $stmt = mysqli_prepare($dbc, $query);
                    
                    mysqli_stmt_bind_param($stmt, "ssssssisssd", $f_name, 
                            $l_name, $email, $street, $city, $state, 
                            $zip, $phone, $b_date, $sex, $lunch);
                    
                    mysqli_stmt_execute($stmt);
                    
                    $affected_rows = mysqli_stmt_affected_rows($stmt);
                    
                    if ($affected_rows == 1) {
                        
                        echo 'Student Entered';
                        
                        mysqli_stmt_close($stmt);
                        
                        mysqli_close($dbc);
                        
                    } else {
                        echo "Error Occurred <br>";
                        echo mysqli_error($dbc);
                        
                        mysqli_stmt_close($stmt);                        
                        mysqli_close($dbc);
                    }
                    
                } else {
                    echo 'You need to enter the following data<br>';
                    
                    foreach ($data_missing as $missing) {
                        
                        echo "$missing<br>";
                        
                    }
                }
                
            }
        
        ?>
        
        <form action="http://http://localhost:8080/HelloWorld/HTML/studentadded.php" 
              method="post">
            
            <b>Add a New Student</b>
            
            <p>First Name: 
                <input type="text" name="first_name" size="30" value="">
            </p>
            
            <p>Last Name: 
                <input type="text" name="last_name" size="30" value="">
            </p>
            
            <p>Email: 
                <input type="text" name="email" size="30" value="">
            </p>
            
            <p>Street: 
                <input type="text" name="street" size="30" value="">
            </p>
            
            <p>City: 
                <input type="text" name="city" size="30" value="">
            </p>
            
            <p>State (2 Characters): 
                <input type="text" name="state" maxlength="2" size="30" value="">
            </p>
            
            <p>Zip Code: 
                <input type="text" name="zip" maxlength="5" size="30" value="">
            </p>
            
            <p>Phone Number: 
                <input type="text" name="phone" size="30" value="">
            </p>
            
            <p>Birth Date (YYYY-MM-DD): 
                <input type="text" name="birth_date" size="30" value="">
            </p>
            
            <p>Sex (M or F): 
                <input type="text" name="sex" size="30" maxlength="1" value="">
            </p>
            
            <p>Lunch Cost: 
                <input type="text" name="lunch" size="30" value="">
            </p>
            
            <p>
                <input type="submit" name="submit" value="Send">
            </p>
            
        </form>
        
    </body>
</html>