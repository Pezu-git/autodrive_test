<?php

namespace App\Library;

class Parser
{

  public function parseXml($xml)
  {
    if ($xml['file'] === '' || $xml['file'] === null) {
      $xmlVar = 'data.xml';
    } else {
      $xmlVar  = $xml['file'] . '.xml';
    }
    $xmlDataString = file_get_contents(public_path($xmlVar));
    $phpDataArray = json_decode(json_encode((array) simplexml_load_string($xmlDataString)), true);
    return $phpDataArray;
  }

  public function insertToDb($request, $tableCol)
  {
    $phpDataArray = $this->parseXml($request);

    if (count($phpDataArray['vehicle']) > 0) {
      $dataArray = array();
      $dataArray1 = array();
      foreach ($phpDataArray['vehicle'] as $index => $data) {

        $newData = $this->vehicleToStr($data);

        foreach ($tableCol as $key => $value) {
          $dataArray1[$value] = $newData[$value];
        }

        $dataArray[] = $dataArray1;
      }
      return $dataArray;
    }
    return back()->with('Data?');
  }
  public function vehicleToStr($data)
  {
    foreach ($data as $key => $value) {
      if ($data[$key] === []) {
        $data[$key] = false;
      }
    }
    return $data;
  }
}
