<html>
<head></head>
<body>
<?php
function __import__csv("example.csv", $defaultValues=array()){
    // build an array of Dataface_Record objects that are to be inserted based
    // on the CSV file data.
    $records = array();
    
    // first split the CSV file into an array of rows.
    $rows = explode("\n", $data);
    foreach ( $rows as $row ){
        // We iterate through the rows and parse the name, phone number, and email 
        // addresses to that they can be stored in a Dataface_Record object.
        list($name, $phone, $email) = explode(',', $row);
        $record = new Dataface_Record('People', array());
        
        // We insert the default values for the record.
        $record->setValues($defaultValues);
        
        // Now we add the values from the CSV file.
        $record->setValues(
            array(
                'Name'=>$name,
                'PhoneNumber'=>$phone,
                'Email'=>$email
                 )
            );
        
        // Now add the record to the output array.
        $records[] = $record;
    }
    
    // Now we return the array of records to be imported.
    return $records;
}
?>
</body>
</html>