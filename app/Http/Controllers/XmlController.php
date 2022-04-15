<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\XmlData;

class XmlController extends Controller
{
   

    
    public function store($file)
    {
        $xmlVar  = $file;
            if(!$file) {
                $xmlVar = 'data.xml';
            }
            $xmlDataString = file_get_contents(public_path($xmlVar));
            $phpDataArray = json_decode(json_encode((array) simplexml_load_string($xmlDataString)), true);
    
            if(count($phpDataArray['vehicle']) > 0){
                    $dataArray = array();
                foreach($phpDataArray['vehicle'] as $index => $data){
                       foreach($data as $key => $value) {
                           if($data[$key] === []) {
                            $data[$key] = '';
                           }
                       }
                        $dataArray[] = [
                            "id" => $data['id'],
                            "brand" => $data['brand'],
                            "model" => $data['model'],
                            "generation" => $data['generation']
                        ];    
                }
                foreach($dataArray as $key => $value)  {
                    $findId = XmlData::where('id', $value['id'])->first();
                    if($findId) {
                        unset($dataArray[$key]);    
                    }   
                }
                XmlData::insert($dataArray);
                return 'Ok';
                // return back()->with('success','Data saved!');
            }
            return back()->with('Data?');
        
        
    }
}