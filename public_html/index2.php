<?php

$student = array(
    'total_stud' => 500,
    array(
        'student' => array(
            'id' => 1,
            'name' => 'ABC',
            'address' => array(
                'city' => 'Pune',
                'zip' => '411006'
            )
        )
    ),
    array(
        'student' => array(
            'id' => 2,
            'name' => 'XYZ',
            'address' => array(
                'city' => 'Mumbai',
                'zip' => '400906'
            )
        )
    )
);

// function defination to convert array to xml
function array_to_xml( $data, &$xml_data ) {
    foreach( $data as $key => $value ) {
        if( is_array($value) ) {
            if( is_numeric($key) ){
                $firstItem = reset($value);
                $subnode = $xml_data->addChild(key($value));
                array_to_xml($firstItem, $subnode);
            } else {
                $subnode = $xml_data->addChild($key);
                array_to_xml($value, $subnode);
            }
        } else {
            $xml_data->addChild("$key",htmlspecialchars("$value"));
        }
    }
}

// creating object of SimpleXMLElement
$xml_data = new SimpleXMLElement('<?xml version="1.0"?><students></students>');

// function call to convert array to xml
array_to_xml($student,$xml_data);

header('Content-type: text/xml');
echo $xml_data->asXML();