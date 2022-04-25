<?php

namespace App\Library;

class Parser
{

  public function parseXml($request, $model, $tag)
  {
    if ($request['file'] === '' || $request['file'] === null) {
      $xmlVar = 'data.xml';
    } else {
      $xmlVar  = $request['file'] . '.xml';
    }
    $xmlDataString = file_get_contents(public_path($xmlVar));
    $xmll = simplexml_load_string($xmlDataString);
    $arr = [];
    for ($i = 0; $i < count($xmll->vehicle); $i++) {;
      foreach ($xmll->vehicle[$i]->$tag as $a => $b) {
        $arr[$a] = $b;;
      }
      $ts = json_decode(json_encode($arr), true);

      foreach ($ts as $key => $value) {

        if (!array_key_exists('@attributes', $ts[$key])) {
          try {
            $fin = $model::where('name', $value[0])->first();
            if (!$fin) {
              $model::insert([
                "name" => $value[0],
              ]);
            }
          } catch (\Exception $e) {
            // echo $e->getMessage();
          }
        } else {

          $id = $value['@attributes']['id'];
          $fid = $model::where('id', $id)->first();
          if (!$fid) {
            $model::insert([
              "id" => $id,
              "name" => $value[0],
            ]);
          }
        }
      }
    }
    return 'ok';
  }
  // public function insertToDb($request, $tableCol)
  // {
  //   $phpDataArray = $this->parseXml($request);

  //   if (count($phpDataArray['vehicle']) > 0) {
  //     $dataArray = array();
  //     $dataArray1 = array();
  //     foreach ($phpDataArray['vehicle'] as $index => $data) {

  //       $newData = $this->vehicleToStr($data);
  //       foreach ($newData as $key => $value) {
  //         $dataArray1[$key] = $newData[$key];
  //       }
  //       $dataArray[] = $dataArray1;
  //     }
  //     return $dataArray;
  //   }
  //   return back()->with('Data?');
  // }
  // public function vehicleToStr($data)
  // {
  //   foreach ($data as $key => $value) {
  //     if ($data[$key] === []) {
  //       $data[$key] = '';
  //     }
  //   }
  //   return $data;
  // }
}
