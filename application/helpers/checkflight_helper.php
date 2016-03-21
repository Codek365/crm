
<?php

function test($data) {
    if (isset($_GET['username']))
        return $_GET['username'];
    return $data['TO'];
}
### Hàm bổ trợ
function getPrice($price){
        $price=trim($price);
        $price=str_replace(",","",$price);
        if( ($price%1000) != 0 )
            $price=floor($price/1000)*1000;
        return $price;
    }
function cut_str($str, $left, $right) {
                            $str = substr(stristr($str, $left), strlen($left));// cắt_tr.
                            $leftLen = strlen(stristr($str, $right));// tách len
                            $leftLen = $leftLen ? -($leftLen) : strlen($str);
                            $str = substr($str, 0, $leftLen);// cắt vt 0->$leftlen
                            return $str;
                            }

function curl($url, $cookies, $post = false,$header = 1) {
                                $head[] = "Connection: keep-alive";
                                $head[] = "Keep-Alive: 300";
                                $head[] = "Accept-Charset: utf-8;q=0.7,*;q=0.7";
                                $head[] = "Accept-Language: vi-vn,vi;q=0.8,en-us;q=0.5,en;q=0.3";
                                $ch = curl_init();
                                curl_setopt($ch, CURLOPT_URL, $url);
                                curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:29.0) Gecko/20100101 Firefox/29.0');
                                curl_setopt($ch, CURLOPT_REFERER, $url);
                                curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
                                curl_setopt($ch,CURLOPT_COOKIEFILE,$cookies);
                                curl_setopt($ch,CURLOPT_COOKIEJAR,$cookies);// xét cookie để duy trì phiên làm việc
                        
                                if ($post) {
                                    curl_setopt($ch, CURLOPT_POST, 1);
                                    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
                                }
                                curl_setopt($ch, CURLOPT_HEADER, $header);
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
                                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                                curl_setopt($ch, CURLOPT_TIMEOUT, 55);
                                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 50);
                                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, FALSE);
                                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
                                $page = curl_exec($ch);
                                curl_close($ch);
                                return $page;
                            }
function curl_vna_jet($url,$cookies,$post){

                            $agent = "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:25.0) Gecko/20100101 Firefox/25.0"; 
                            $ch1 = curl_init();
                            curl_setopt($ch1, CURLOPT_URL,$url);  
                            curl_setopt ($ch1, CURLOPT_REFERER, $url);
                            curl_setopt($ch1, CURLOPT_USERAGENT,$agent); 
                            curl_setopt($ch1, CURLOPT_RETURNTRANSFER,true);

                            curl_setopt($ch1,CURLOPT_COOKIEJAR,$cookies);
                            curl_setopt($ch1,CURLOPT_COOKIEFILE,$cookies);
                            curl_setopt($ch1, CURLOPT_HEADER,0); // tiêu đề
                            curl_setopt ($ch1, CURLOPT_SSL_VERIFYPEER, false);
                            curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, true);
                            $page = curl_exec($ch1);
                            // 2
                            curl_setopt($ch1, CURLOPT_POST, 1);
                            curl_setopt($ch1, CURLOPT_POSTFIELDS,$post);// thông số cần post    
                            curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, true); // tự động submit
                            curl_setopt($ch1, CURLOPT_TIMEOUT, 55);
                            curl_setopt($ch1,CURLOPT_CONNECTTIMEOUT,50); 
                            $page= curl_exec($ch1); 
                            curl_close ($ch1); 
                            unlink($cookies);
                            return $page; 
        }
### LẤY OK JETSTAR
/////////////////////////////////////////////// Hàm postJetstar
function postJetstar($data) 
                { 
                        $url='http://booknow.jetstar.com/Search.aspx?culture=vi-VN';
                        $filename = microtime().".txt";// tên file cookie
                        $cookies = dirname (__FILE__).'/'.$filename;
                        $postdata=array(
                        '__EVENTTARGET'=>'',
                        '__EVENTARGUMENT'=>'',
                        '__VIEWSTATE'=>'/wEPDwUBMGQYAQUeX19Db250cm9sc1JlcXVpcmVQb3N0QmFja0tleV9fFgEFJ01lbWJlckxvZ2luU2VhcmNoVmlldyRtZW1iZXJfUmVtZW1iZXJtZSDCMtVG/1lYc7dy4fVekQjBMvD5',
                        'pageToken'=>'',
                        'total_price'=>'',
                        'ControlGroupSearchView$AvailabilitySearchInputSearchView$RadioButtonMarketStructure'=> $data['STRUCTURE'],
                        'ControlGroupSearchView$AvailabilitySearchInputSearchView$TextBoxMarketOrigin1'=>$data['FROM'],
                        'ControlGroupSearchView$AvailabilitySearchInputSearchView$TextBoxMarketDestination1'=> $data['TO'],
                        'ControlGroupSearchView$AvailabilitySearchInputSearchView$TextboxDepartureDate1'=>$data['DAY_DEP'],
                        'ControlGroupSearchView$AvailabilitySearchInputSearchView$TextboxDestinationDate1'=>$data['DAY_RET'],
                        'ControlGroupSearchView$AvailabilitySearchInputSearchView$DropDownListCurrency'=>'VND',/// tới đây

                        'ControlGroupSearchView$AvailabilitySearchInputSearchView$TextBoxMarketOrigin2'=>"",

                        'ControlGroupSearchView$AvailabilitySearchInputSearchView$TextBoxMarketDestination2'=>"",

                        'ControlGroupSearchView$AvailabilitySearchInputSearchView$TextboxDepartureDate2'=>$data['DAY_RET'],
                        'ControlGroupSearchView$AvailabilitySearchInputSearchView$TextboxDestinationDate2'=>'',

                        'ControlGroupSearchView$AvailabilitySearchInputSearchView$TextBoxMarketOrigin3'=>'',
                        'ControlGroupSearchView$AvailabilitySearchInputSearchView$TextBoxMarketDestination3'=>'',
                        'ControlGroupSearchView$AvailabilitySearchInputSearchView$TextboxDepartureDate3'=>"",
                        'ControlGroupSearchView$AvailabilitySearchInputSearchView$TextboxDestinationDate3'=>'',

                        'ControlGroupSearchView$AvailabilitySearchInputSearchView$TextBoxMarketOrigin4'=>'',
                        'ControlGroupSearchView$AvailabilitySearchInputSearchView$TextBoxMarketDestination4'=>'',
                        'ControlGroupSearchView$AvailabilitySearchInputSearchView$TextboxDepartureDate4'=>"",
                        'ControlGroupSearchView$AvailabilitySearchInputSearchView$TextboxDestinationDate4'=>'',
                        
                        
                        'ControlGroupSearchView$AvailabilitySearchInputSearchView$TextBoxMarketOrigin5'=>'',
                        'ControlGroupSearchView$AvailabilitySearchInputSearchView$TextBoxMarketDestination5'=>'',
                        'ControlGroupSearchView$AvailabilitySearchInputSearchView$TextboxDepartureDate5'=>"",
                        'ControlGroupSearchView$AvailabilitySearchInputSearchView$TextboxDestinationDate5'=>'',

                        'ControlGroupSearchView$AvailabilitySearchInputSearchView$TextBoxMarketOrigin6'=>'',
                        'ControlGroupSearchView$AvailabilitySearchInputSearchView$TextBoxMarketDestination6'=>'',
                        'ControlGroupSearchView$AvailabilitySearchInputSearchView$TextboxDepartureDate6'=>"",
                        'ControlGroupSearchView$AvailabilitySearchInputSearchView$TextboxDestinationDate6'=>'',

                        'ControlGroupSearchView$AvailabilitySearchInputSearchView$DropDownListPassengerType_ADT'=>"1",
                        'ControlGroupSearchView$AvailabilitySearchInputSearchView$DropDownListPassengerType_CHD'=>"1",
                        'ControlGroupSearchView$AvailabilitySearchInputSearchView$DropDownListPassengerType_INFANT'=>"1",
                        'ControlGroupSearchView$AvailabilitySearchInputSearchView$RadioButtonSearchBy'=>'SearchStandard',
                        'ControlGroupSearchView$AvailabilitySearchInputSearchView$TextBoxMultiCityOrigin1'=>"Origin",
                        'ControlGroupSearchView$AvailabilitySearchInputSearchView$TextBoxMultiCityDestination1'=>"Destination",
                        'ControlGroupSearchView$AvailabilitySearchInputSearchView$TextboxDepartureMultiDate1'=>'',
                        'ControlGroupSearchView$AvailabilitySearchInputSearchView$TextBoxMultiCityOrigin2'=>"Origin",
                        'ControlGroupSearchView$AvailabilitySearchInputSearchView$TextBoxMultiCityDestination2'=>"Destination",
                        'ControlGroupSearchView$AvailabilitySearchInputSearchView$TextboxDepartureMultiDate2'=>'',

                        'ControlGroupSearchView$AvailabilitySearchInputSearchView$DropDownListMultiPassengerType_ADT'=>"1",
                        'ControlGroupSearchView$AvailabilitySearchInputSearchView$DropDownListMultiPassengerType_CHD'=>"1",
                        'ControlGroupSearchView$AvailabilitySearchInputSearchView$DropDownListMultiPassengerType_INFANT'=>"1",
                        'ControlGroupSearchView$AvailabilitySearchInputSearchView$numberTrips'=>'2',
                        'ControlGroupSearchView$AvailabilitySearchInputSearchView$ButtonSubmit'=>'',
                        );
                        $post= http_build_query($postdata);
                        $page=curl_vna_jet($url,$cookies,$post);
                        return $page;
        }
// Lấy từ JetStar
function getJetstar($html,$depcode,$descode,$direction){
            $flight=array();

        if($direction==1){
            $strsearch=$html;
                $strsearch=str_replace("&nbsp;","",$strsearch);


                    $dom=new DOMDocument();
                    @$dom->loadHTML($strsearch);
                    $finder=new DOMXPath($dom);
                    $classout="domestic";
                    $node_tbl=$finder->query("//table[contains(concat(' ', normalize-space(@class), ' '), ' $classout ')]"); // lấy các table có class='domestic'
                    if($node_tbl->length>0){
                        ##################LAY CHI TIET CAC CHUYEN DI###############################
                        $class_alt="alt";
                        $node_tr=$finder->query(".//tbody/tr", $node_tbl->item(0)); // tr trong table đi
                        $j=0;
                        /*Analytics tr to get detail data*/
                       foreach($node_tr as $key => $tr){
                            $note="";

                            if ($tr->getElementsByTagName("td")->length > 1) // lọc 2 tr dư cuối cùng
                            {
                                $domtr=new DOMDocument();
                                @$domtr->loadHTML($dom->saveXML($tr));
                                $finder_tr=new DOMXPath($domtr);

                                $flight_no = $finder_tr->query("//div[@class='flights']/dl/dt/span"); // lấy mã chuyến bay
                                if (isset($tr->getElementsByTagName("td")->item(3)->getElementsByTagName("label")->item(0)->nodeValue)) {
                                    $price_old = $tr->getElementsByTagName("td")->item(3)->getElementsByTagName("label")->item(0)->nodeValue;
                                    $price = substr($price_old, strrpos($price_old, " "));
                                }else{
                                    $price = false;
                                }
                                $flight_no = $flight_no->item(0)->nodeValue;
                                $time_dep = $tr->getElementsByTagName("td")->item(0)->getElementsByTagName("strong")->item(0)->nodeValue;
                                $time_arv = $tr->getElementsByTagName("td")->item(1)->getElementsByTagName("strong")->item(0)->nodeValue;
                                $duration = $tr->getElementsByTagName("td")->item(2)->getElementsByTagName("a")->item(0)->nodeValue;


                                $flight[$j]["dep"]=$depcode;
                                $flight[$j]["arv"]=$descode;
                                $flight[$j]["deptime"]=trim($time_dep);
                                $flight[$j]["arvtime"]=trim($time_arv);
                                $flight[$j]["flightno"]=trim($flight_no);
                                $flight[$j]["price"]=trim(getPrice($price));
                                $flight[$j]["duration"]=trim($duration);
                                $flight[$j]["note"]=$note;

                                $j++;
                            }
                        }
            }

            return $flight;
    }/*Ket thuc one way - xu ly neu ko phai one way*/
    else
    {

            $strsearch=$html;
            $strsearch=str_replace("&nbsp;","",$strsearch);


            $dom=new DOMDocument();
            @$dom->loadHTML($strsearch);
            $finder=new DOMXPath($dom);
            $classout="domestic";
            $node_tbl=$finder->query("//table[contains(concat(' ', normalize-space(@class), ' '), ' $classout ')]"); // lấy các table có class='domestic'
            if($node_tbl->length>1){
                    ##################LAY CHI TIET CAC CHUYEN DI###############################
                    $class_alt="alt";
                    $node_tr=$finder->query(".//tbody/tr", $node_tbl->item(0));
                    $j=0;
                    /*Analytics tr to get detail data*/
                   foreach($node_tr as $key => $tr){
                        $note="";

                        if ($tr->getElementsByTagName("td")->length > 1) // lọc 2 tr dư cuối cùng
                        {
                $domtr=new DOMDocument();
                @$domtr->loadHTML($dom->saveXML($tr));
                $finder_tr=new DOMXPath($domtr);

                $flight_no = $finder_tr->query("//div[@class='flights']/dl/dt/span");
                if (isset($tr->getElementsByTagName("td")->item(3)->getElementsByTagName("label")->item(0)->nodeValue)) {
                    $price_old = $tr->getElementsByTagName("td")->item(3)->getElementsByTagName("label")->item(0)->nodeValue;
                    $price = substr($price_old, strrpos($price_old, " "));
                }else{
                    $price = false;
                }
                // $price = $tr->getElementsByTagName("td")->item(3)->getElementsByTagName("label")->item(0)->nodeValue;
                // $price = substr($price, strrpos($price, " "));

                $flight_no = $flight_no->item(0)->nodeValue;
                $time_dep = $tr->getElementsByTagName("td")->item(0)->getElementsByTagName("strong")->item(0)->nodeValue;
                $time_arv = $tr->getElementsByTagName("td")->item(1)->getElementsByTagName("strong")->item(0)->nodeValue;
                $duration = $tr->getElementsByTagName("td")->item(2)->getElementsByTagName("a")->item(0)->nodeValue;

                $flight["dep"][$j]["dep"]=$depcode;
                $flight["dep"][$j]["arv"]=$descode;
                $flight["dep"][$j]["deptime"]=trim($time_dep);
                $flight["dep"][$j]["arvtime"]=trim($time_arv);
                $flight["dep"][$j]["flightno"]=trim($flight_no);
                $flight["dep"][$j]["price"]=trim(getPrice($price));
                $flight["dep"][$j]["duration"]=trim($duration);
                $flight["dep"][$j]["note"]=$note;

                $j++;
                        }
                    }


                    ##################LAY CHI TIET CAC CHUYEN VE###############################
                    $class_alt="alt";
                    $node_tr=$finder->query(".//tbody/tr", $node_tbl->item(1));
                    $j=0;
                   foreach($node_tr as $key => $tr){
                        $note="";

                        if ($tr->getElementsByTagName("td")->length > 1) // lọc 2 tr dư cuối cùng
                        {
                $domtr=new DOMDocument();
                @$domtr->loadHTML($dom->saveXML($tr));
                $finder_tr=new DOMXPath($domtr);

                $flight_no = $finder_tr->query("//div[@class='flights']/dl/dt/span");
                 if (isset($tr->getElementsByTagName("td")->item(3)->getElementsByTagName("label")->item(0)->nodeValue)) {
                    $price_old = $tr->getElementsByTagName("td")->item(3)->getElementsByTagName("label")->item(0)->nodeValue;
                    $price = substr($price_old, strrpos($price_old, " "));
                }else{
                    $price = false;
                }
                // $price = $tr->getElementsByTagName("td")->item(3)->getElementsByTagName("label")->item(0)->nodeValue;
                // $price = substr($price, strrpos($price, " "));

                $flight_no = $flight_no->item(0)->nodeValue;
                $time_dep = $tr->getElementsByTagName("td")->item(0)->getElementsByTagName("strong")->item(0)->nodeValue;
                $time_arv = $tr->getElementsByTagName("td")->item(1)->getElementsByTagName("strong")->item(0)->nodeValue;
                $duration = $tr->getElementsByTagName("td")->item(2)->getElementsByTagName("a")->item(0)->nodeValue;


                $flight["ret"][$j]["dep"]=$descode;
                $flight["ret"][$j]["arv"]=$depcode;
                $flight["ret"][$j]["deptime"]=trim($time_dep);
                $flight["ret"][$j]["arvtime"]=trim($time_arv);
                $flight["ret"][$j]["flightno"]=trim($flight_no);
                $flight["ret"][$j]["price"]=trim(getPrice($price));
                $flight["ret"][$j]["duration"]=trim($duration);
                $flight["ret"][$j]["note"]=$note;

                $j++;
                        }
                    }

        }
    }

    return $flight;
}

function getFlightJetStar($data) {
    $html = postJetstar($data);

    // Đổi loại chuyến bay cho phù hợp
    if ($data['STRUCTURE']=='RoundTrip') {
        $data['STRUCTURE'] = 0;
        $flights = getJetstar($html, $data['FROM'], $data['TO'], $data['STRUCTURE']);
    } else {
        $data['STRUCTURE'] = 1;
        $flights = array("dep" => getJetstar($html, $data['FROM'], $data['TO'], $data['STRUCTURE']));
    }
    return json_encode($flights);
}

#### LẤY VIETNAMAIRLINE
/////////////////////////////////////////////// Hàm postVietNamAirlines
function postVietNamAirlines($data){ 
                    if ($data['DAY_DEP']) {
                        
                    $depart=$data['DAY_DEP'];
                    $depart=explode('/',$depart);
                    $day=$depart[0];
                    $month=$depart[1];  
                    $year=$depart[2];
                    $data['DAY_DEP']=$year."/".$month."/".$day;
                    }
            //return $data['DAY_DEP'];
                    if ($data['DAY_RET']) {
                    $retur=$data['DAY_RET'];
                    $retur=explode('/',$retur);
                    $day1=$retur[0];
                    $month1=$retur[1];  
                    $year1=$retur[2];
                    $data['DAY_RET']=$year1."/".$month1."/".$day1;
                    }
            
        
        $url='https://wl-prod.sabresonicweb.com/SSW2010/B3QE/webqtrip.html?execution=e1s1';
        $filename = microtime().".txt";// tên file cookie
        $cookies = dirname (__FILE__).'/'.$filename;
            // xét 1 chiều hoặc khứ hồi
                if ($data['STRUCTURE']=='RoundTrip') {
                    
                        $postdata=array('componentTypes'=>'prbar',
                'componentTypes'=>'flomes',
                'componentTypes'=>'password',
                'componentTypes'=>'sbmt',
                'componentTypes'=>'lay',
                'componentTypes'=>'fsc',
                
                'itineraryParts[0].disabled'=>'false',
                'cabin'=>'ECONOMY',
                'passengers.hidden'=>'',
                'promo'=>'',
                'travelOptionsHotelReservation'=>'false',
                'travelOptionsNumberOfRooms'=>'1',
                'travelOptionsCarRental'=>'false',
                'submited'=>'submited',
                '_eventId_next'=>'',
                
                'itineraryParts[0].departureAirport'=>$data['FROM'],
                'origin[0]'=>'Ho Chi Minh City (SGN)',
                'itineraryParts[0].arrivalAirport'=>$data['TO'],
                'destination[0]'=>'Hanoi (HAN)',
                'itineraryParts[0].date'=>$data['DAY_DEP'],
                'dateDepartureText[0]'=>'25/06/2014',
                'passengers[ADT]'=>$data['ADT'],
                'passengers[CHD]'=>$data['CHD'],
                'passengers[INF]'=>$data['INFANT'],
                
                'journey'=>'ROUND_TRIP',
                'itineraryParts[1].date'=>$data['DAY_RET'],
                'dateReturnText[0]'=>'30/06/2014',
                        );

                }elseif ($data['STRUCTURE']=='RbOneWay') {
                    $postdata=array('componentTypes'=>'prbar',
                'componentTypes'=>'flomes',
                'componentTypes'=>'password',
                'componentTypes'=>'sbmt',
                'componentTypes'=>'lay',
                'componentTypes'=>'fsc',
                
                'itineraryParts[0].disabled'=>'false',
                'cabin'=>'ECONOMY',
                'passengers.hidden'=>'',
                'promo'=>'',
                'travelOptionsHotelReservation'=>'false',
                'travelOptionsNumberOfRooms'=>'1',
                'travelOptionsCarRental'=>'false',
                'submited'=>'submited',
                '_eventId_next'=>'',
                
                'itineraryParts[0].departureAirport'=>$data['FROM'],
                'origin[0]'=>'Ho Chi Minh City (SGN)',
                'itineraryParts[0].arrivalAirport'=>$data['TO'],
                'destination[0]'=>'Hanoi (HAN)',
                'itineraryParts[0].date'=>$data['DAY_DEP'],
                'dateDepartureText[0]'=>'25/06/2014',
                'passengers[ADT]'=>$data['ADT'],
                'passengers[CHD]'=>$data['CHD'],
                'passengers[INF]'=>$data['INFANT'],
                
                
                'journey'=>'ONE_WAY',
                        );
                }                   
                        $post=http_build_query($postdata);
                        $result = curl_vna_jet($url,$cookies,$post);
                        return $result;

        }
function getVietNamAirlines($html,$depcode,$descode,$direction){
    $flight=array();

    if($direction==1){

        $strsearch=$html;
        $strsearch=str_replace("&nbsp;","",$strsearch);

        //Lay ra table chua du lieu
        $dom=new DOMDocument();
        @$dom->loadHTML($strsearch);
        $finder=new DOMXPath($dom);
        $classout="flight-list";
        $node_tbl=$finder->query("//div[contains(concat(' ', normalize-space(@class), ' '), ' $classout ')]");

        /*Check if table data exists*/
        if($node_tbl->length>0){

            /*Get each tr on table*/
            $class_even="yui-dt-even";
            $class_odd="yui-dt-odd";
            $node_tr=$finder->query("//tr[contains(concat(' ', normalize-space(@class), ' '), ' $class_even ')] | //tr[contains(concat(' ', normalize-space(@class), ' '), ' $class_odd ')]",$node_tbl->item(0));

            $j=0;
            /*Analytics tr to get detail data*/
            foreach($node_tr as $tr){
                $note="";

                $domtr=new DOMDocument();
                @$domtr->loadHTML($dom->saveXML($tr));
                $finder_tr=new DOMXPath($domtr);

                $class_price="prices-amount";
                $pricenode=$finder_tr->query("(//span[contains(concat(' ', normalize-space(@class), ' '), ' $class_price ')])");

                $ttit=$pricenode->length-1;
                $price=$pricenode->item($ttit)?$pricenode->item($ttit)->nodeValue:0;

                $flight_type=$pricenode->item($ttit)->parentNode->parentNode->parentNode->parentNode->parentNode->parentNode->parentNode->getAttribute("id");

                #LOAI BO HANG VE SUPPER SAVER
                /*if($flight_type=="SS" || $flight_type=="EPR"){
                    $ttit--;
                    $price=$pricenode->item($ttit)?$pricenode->item($ttit)->nodeValue:0;
                    $flight_type=$pricenode->item($ttit)->parentNode->parentNode->parentNode->parentNode->getAttribute("id");
                    $flight_type=getClass($flight_type);
                }*/


                $flight_no=$tr->getElementsByTagName("td")->item(0)->getElementsByTagName("a")->item(0)->nodeValue;
                $time_dep=$tr->getElementsByTagName("td")->item(2)->nodeValue;
                $time_arv=$tr->getElementsByTagName("td")->item(3)->nodeValue;
                $stop=$tr->getElementsByTagName("td")->item(4)->nodeValue;
                $duration=$tr->getElementsByTagName("td")->item(5)->nodeValue;




                $flight[$j]["dep"]=$depcode;
                $flight[$j]["arv"]=$descode;
                $flight[$j]["deptime"]=trim($time_dep);
                $flight[$j]["arvtime"]=trim($time_arv);
                $flight[$j]["flightno"]=trim($flight_no);
                $flight[$j]["stop"]=trim($stop);
                $flight[$j]["note"]=$note;
                $flight[$j]["price"]=trim(getPrice($price));

                #Ket Thuc Ghi Du Lieu Vao Mang
                $j++;
            }

        }
    }/*Ket thuc one way - xu ly neu ko phai one way*/
    else{

        $strsearch=$html;

        $strsearch=str_replace("&nbsp;","",$strsearch);

        //echo $strsearch;
        $dom=new DOMDocument();
        @$dom->loadHTML($strsearch);
        $finder=new DOMXPath($dom);
        $classout="flight-list";
        $node_tbl=$finder->query("//div[contains(concat(' ', normalize-space(@class), ' '), ' $classout ')]");

        if($node_tbl->length>1){
            ##################LAY CHI TIET CAC CHUYEN DI###############################
            $class_even="yui-dt-even";
            $class_odd="yui-dt-odd";
            $node_tr=$finder->query(".//tr[contains(concat(' ', normalize-space(@class), ' '), ' $class_even ')] | .//tr[contains(concat(' ', normalize-space(@class), ' '), ' $class_odd ')]",$node_tbl->item(0));

            $j=0;
            /*Analytics tr to get detail data*/
            foreach($node_tr as $tr){
                $note="";
                $domtr=new DOMDocument();
                @$domtr->loadHTML($dom->saveXML($tr));
                $finder_tr=new DOMXPath($domtr);

                $class_price="prices-amount";
                $pricenode=$finder_tr->query("(//span[contains(concat(' ', normalize-space(@class), ' '), ' $class_price ')])");

                $ttit=$pricenode->length-1;
                $price=$pricenode->item($ttit)?$pricenode->item($ttit)->nodeValue:0;

                $flight_type=$pricenode->item($ttit)->parentNode->parentNode->parentNode->parentNode->parentNode->parentNode->parentNode->getAttribute("id");

                #LOAI BO HANG VE SUPPER SAVER
                /*if($flight_type=="SS" || $flight_type=="EPR"){
                    $ttit--;
                    $price=$pricenode->item($ttit)?$pricenode->item($ttit)->nodeValue:0;
                    $flight_type=$pricenode->item($ttit)->parentNode->parentNode->parentNode->parentNode->getAttribute("id");
                    $flight_type=getClass($flight_type);
                }*/

                $flight_no=$tr->getElementsByTagName("td")->item(0)->getElementsByTagName("a")->item(0)->nodeValue;
                $time_dep=$tr->getElementsByTagName("td")->item(2)->nodeValue;
                $time_arv=$tr->getElementsByTagName("td")->item(3)->nodeValue;
                $stop=$tr->getElementsByTagName("td")->item(4)->nodeValue;
                $duration=$tr->getElementsByTagName("td")->item(5)->nodeValue;



                $flight["dep"][$j]["dep"]=$depcode;
                $flight["dep"][$j]["arv"]=$descode;
                $flight["dep"][$j]["deptime"]=trim($time_dep);
                $flight["dep"][$j]["arvtime"]=trim($time_arv);
                $flight["dep"][$j]["flightno"]=trim($flight_no);
                $flight["dep"][$j]["price"]=trim(getPrice($price));
                $flight["dep"][$j]["stop"]=trim($stop);
                $flight["dep"][$j]["note"]=$note;

                $j++;
            }

            ##################LAY CHI TIET CAC CHUYEN VE###############################
            $class_even="yui-dt-even";
            $class_odd="yui-dt-odd";
            $node_tr=$finder->query(".//tr[contains(concat(' ', normalize-space(@class), ' '), ' $class_even ')] | .//tr[contains(concat(' ', normalize-space(@class), ' '), ' $class_odd ')]",$node_tbl->item(1));

            $j=0;
            /*Analytics tr to get detail data*/
            foreach($node_tr as $tr){
                $note="";
                $domtr=new DOMDocument();
                @$domtr->loadHTML($dom->saveXML($tr));
                $finder_tr=new DOMXPath($domtr);

                $class_price="prices-amount";
                $pricenode=$finder_tr->query("(//span[contains(concat(' ', normalize-space(@class), ' '), ' $class_price ')])");

                $ttit=$pricenode->length-1;
                $price=$pricenode->item($ttit)?$pricenode->item($ttit)->nodeValue:0;

                $flight_type=$pricenode->item($ttit)->parentNode->parentNode->parentNode->parentNode->parentNode->parentNode->parentNode->getAttribute("id");

                #LOAI BO HANG VE SUPPER SAVER
                /*if($flight_type=="SS" || $flight_type=="EPR"){
                    $ttit--;
                    $price=$pricenode->item($ttit)?$pricenode->item($ttit)->nodeValue:0;
                    $flight_type=$pricenode->item($ttit)->parentNode->parentNode->parentNode->parentNode->getAttribute("id");
                    $flight_type=getClass($flight_type);
                }*/

                $flight_no=$tr->getElementsByTagName("td")->item(0)->getElementsByTagName("a")->item(0)->nodeValue;
                $time_dep=$tr->getElementsByTagName("td")->item(2)->nodeValue;
                $time_arv=$tr->getElementsByTagName("td")->item(3)->nodeValue;
                $stop=$tr->getElementsByTagName("td")->item(4)->nodeValue;
                $duration=$tr->getElementsByTagName("td")->item(5)->nodeValue;



                $flight["ret"][$j]["dep"]=$descode;
                $flight["ret"][$j]["arv"]=$depcode;
                $flight["ret"][$j]["deptime"]=trim($time_dep);
                $flight["ret"][$j]["arvtime"]=trim($time_arv);
                $flight["ret"][$j]["flightno"]=trim($flight_no);
                $flight["ret"][$j]["price"]=trim(getPrice($price));
                $flight["ret"][$j]["stop"]=trim($stop);
                $flight["ret"][$j]["note"]=$note;

                $j++;
            }
        }


    }

    return $flight;
}
function getFlightVietNamAirlines($data) {
    $html = postVietNamAirlines($data); /*Lấy file html*/

    /*Đổi loại chuyến bay cho phù hợp*/
    if ($data['STRUCTURE']=='RoundTrip') {
        $data['STRUCTURE'] = 0;
        $flights = getVietNamAirlines($html, $data['FROM'], $data['TO'], $data['STRUCTURE']); /*Lọc*/
    } else {
        $data['STRUCTURE'] = 1;
        $flights = array("dep" => getVietNamAirlines($html, $data['FROM'], $data['TO'], $data['STRUCTURE'])); /*Lọc*/
    }
    
    return json_encode($flights);
}








#### LẤY VIETJET
////////// Hàm postVietJet
function  postVietJet($data){
                        /// xử lý structure
                                if ($data['STRUCTURE']=='RoundTrip') {
                                    $data['STRUCTURE']='on';
                                }else{
                                    $data['STRUCTURE']='RbOneWay';
                                }
            $filename = microtime().".txt";// tên file cookie
            $cookies = dirname (__FILE__).'/'.$filename;
                date_default_timezone_set('Asia/Ho_Chi_Minh');// xet muối giờ ngày cho date
                $depdate = date("d/m/Y");//17/06/2014
                $returndate_ = date("d/m/Y",strtotime("+3 days"));//20/06/2014
                $link_home = 'http://www.vietjetair.com/Sites/Web/vi-VN/Home';
                $link_form = 'https://ameliaweb5.intelisys.ca/VietJet/ameliapost.aspx?lang=vi';
                $link_result = 'https://ameliaweb5.intelisys.ca/VIETJET/TravelOptions.aspx?lang=vi&st=pb&sesid=';
                        /* Step 1 */
                        $get_data = curl($link_home,$cookies);  
                        //$cookie = GetAllCookies($get_data);   
                        preg_match_all("/name=\"([^\"]+)\" id=\"\w+\" value=\"([^\"]*)\"/is", $get_data, $match);// get 102 viewstate and select nơi đi lần đầu

                        $post['ctl00$ScriptManager1'] = 'ctl00$UcRightV31$up1|ctl00_UcRightV31_CbbOrigin';
                        $post['ctl00_ScriptManager1_HiddenField'] = ';;AjaxControlToolkit, Version=3.5.50927.0, Culture=neutral, PublicKeyToken=28f01b0e84b6d53e:en:cd907d64-8aff-4631-bbee-343711c75157:effe2a26:5546a2b:475a4ef5:d2e10b12:37e2e5c9:5a682656:ecdfc31d:7e63a579:1d3ed089:751cdd15:dfad98a5:497ef277:a43b07eb:3cf12cf1';
                        $post['__EVENTTARGET'] = 'ctl00_UcRightV31_CbbOrigin';
                        $i = 0;
                        foreach ($match[1] as $key => $val):
                            $post[$val] = $match[2][$i]; 
                        $i++;
                        endforeach;
                        //var_dump($post);exit();
                        $post['ctl00$UcHeaderV31$DrLang'] = 'vi-VN';
                        $post['ctl00$UcHeaderV31$TxtKeyWord'] = '';
                        $post['ctl00$UcHeaderV31$tbwKeyword_ClientState'] = '';
                        $post['ctl00$UcRightV31$RoundTrip'] = 'RbRoundTrip';
                        $post['ctl00$UcRightV31$CbbOrigin$TextBox'] = 'Tp. Hồ Chí Minh';
                        $post['ctl00$UcRightV31$CbbOrigin$HiddenField'] = '1';
                        $post['ctl00$UcRightV31$CbbDepart$TextBox'] = '';
                        $post['ctl00$UcRightV31$CbbDepart$HiddenField'] = '-1';
                        $post['ctl00$UcRightV31$TxtDepartDate'] =$data['DAY_DEP'];
                        $post['ctl00$UcRightV31$TxtReturnDate'] =$data['DAY_RET'];
                        $post['ctl00$UcRightV31$CbbCurrency$TextBox'] = 'VND';
                        $post['ctl00$UcRightV31$CbbCurrency$HiddenField'] = '0';
                        $post['ctl00$UcRightV31$TxtPromoCode'] = '';
                        $post['ctl00$UcRightV31$tbwpPromoCode_ClientState'] = '';
                        $post['ctl00$UcRightV31$CbbAdults$TextBox'] = '1';
                        $post['ctl00$UcRightV31$CbbAdults$HiddenField'] = '0';
                        $post['ctl00$UcRightV31$CbbChildren$TextBox'] = '0';
                        $post['ctl00$UcRightV31$CbbChildren$HiddenField'] = '0';
                        $post['ctl00$UcRightV31$CbbInfants$TextBox'] = '0';
                        $post['ctl00$UcRightV31$CbbInfants$HiddenField'] = '0';
                        $post['ctl00$UcRightV31$GnRegister'] = 'RbENewsRegister';
                        $post['ctl00$UcRightV31$TxtEmail'] = '';
                        $post['ctl00$UcRightV31$TxtWeEmail_ClientState'] = '';
                        $post['ctl00$UcRightV31$TxtRegEmail'] = '';
                        $post['ctl00$UcRightV31$TxtCaptCha'] = '';
                        $post['__ASYNCPOST'] = 'true';
                        /* Step 2 */
                        $post_curl = http_build_query($post);
                        $data_result = curl($link_home, $cookies, $post_curl);
                        //$cookie = GetAllCookies($data_result);// get tất cả cookie mới
                        $post_form['ctl00_ScriptManager1_HiddenField'] = ';;AjaxControlToolkit, Version=3.5.50927.0, Culture=neutral, PublicKeyToken=28f01b0e84b6d53e:en:cd907d64-8aff-4631-bbee-343711c75157:effe2a26:5546a2b:475a4ef5:d2e10b12:37e2e5c9:5a682656:ecdfc31d:7e63a579:1d3ed089:751cdd15:dfad98a5:497ef277:a43b07eb:3cf12cf1;';
                        $post_form['__EVENTTARGET'] = '';
                        $post_form['__EVENTARGUMENT'] = '';
                        $post_form['__LASTFOCUS'] = '';
                        $i = 0;
                        preg_match_all("/\|(_*VIEWSTAT[^|]+)\|([^\|]+)\|/U", $data_result, $match);// 104 viewstate trong postdata
                        foreach ($match[1] as $val):
                            $post_form[$val] = $match[2][$i];
                            $i++;
                        endforeach;
                        $post_form['ctl00$UcHeaderV31$DrLang'] = 'vi-VN';
                        $post_form['ctl00$UcHeaderV31$TxtKeyWord'] = '';
                        $post_form['ctl00$UcHeaderV31$tbwKeyword_ClientState'] = '';
                        $post_form['ctl00$UcRightV31$RoundTrip'] = 'RbRoundTrip';
                        $post_form['ctl00$UcRightV31$CbbOrigin$TextBox'] = 'Tp. Hồ Chí Minh';
                        $post_form['ctl00$UcRightV31$CbbOrigin$HiddenField'] = 1;
                        $post_form['ctl00$UcRightV31$CbbDepart$TextBox'] = 'Hà Nội';
                        $post_form['ctl00$UcRightV31$CbbDepart$HiddenField'] =1;
                        $post_form['ctl00$UcRightV31$TxtDepartDate'] = $depdate;
                        $post_form['ctl00$UcRightV31$TxtReturnDate'] = $returndate_;
                        $post_form['ctl00$UcRightV31$CbbCurrency$HiddenField'] = '0';
                        $post_form['ctl00$UcRightV31$TxtPromoCode'] = '';
                        $post_form['ctl00$UcRightV31$tbwpPromoCode_ClientState'] = '';
                        $post_form['ctl00$UcRightV31$BtSearch'] = 'Tìm chuyến bay';
                        $post_form['ctl00$UcRightV31$CbbAdults$TextBox'] = '1';
                        $post_form['ctl00$UcRightV31$CbbAdults$HiddenField'] = '0';
                        $post_form['ctl00$UcRightV31$CbbChildren$TextBox'] = '0';
                        $post_form['ctl00$UcRightV31$CbbChildren$HiddenField'] = '0';
                        $post_form['ctl00$UcRightV31$CbbInfants$TextBox'] = '0';
                        $post_form['ctl00$UcRightV31$CbbInfants$HiddenField'] = '0';
                        $post_form['ctl00$UcRightV31$GnRegister'] = 'RbENewsRegister';
                        $post_form['ctl00$UcRightV31$TxtEmail'] = '';
                        $post_form['ctl00$UcRightV31$TxtWeEmail_ClientState'] = '';
                        $post_form['ctl00$UcRightV31$TxtRegEmail'] = '';
                        $post_form['ctl00$UcRightV31$TxtCaptCha'] = '';
                        /* Step 3 */
                        $post_form = http_build_query($post_form);
                        $form_html = curl($link_home, $cookies, $post_form);    
                        
                        
// cover ngày tháng năm
                        if ($data['DAY_DEP']) {
                                            
                                        $depart=$data['DAY_DEP'];
                                        $depart=explode('/',$depart);
                                        $day=$depart[0];
                                        $month=$depart[1];  
                                        $year=$depart[2];
                                        $data['DAY_DEP']=$day;
                                        $data['MONTH_DEP']=$year."/".$month;
                                        }
                                //return $data['DAY_DEP'];
                                        if ($data['DAY_RET']) {
                                        $retur=$data['DAY_RET'];
                                        $retur=explode('/',$retur);
                                        $day1=$retur[0];
                                        $month1=$retur[1];  
                                        $year1=$retur[2];
                                        $data['DAY_RET']=$day1;
                                        $data['MONTH_RET']=$year1."/".$month1;
                                        }
                                
                        $post_auto = array (
                            "blnFares"=>'False',
                            "chkRoundTrip" =>$data['STRUCTURE'],
                            "dlstDepDate_Day"=>$data['DAY_DEP'],
                            "dlstDepDate_Month" =>$data['MONTH_DEP'],
                            "dlstRetDate_Day"=>$data['DAY_RET'],
                            "dlstRetDate_Month" =>$data['MONTH_RET'],
                            "lstCurrency"=>'VND',
                            "lstDepDateRange"=>0,
                            "lstDestAP" =>$data['TO'],
                            "lstLvlService"=>1,
                            "lstOrigAP" =>$data['FROM'],
                            "lstResCurrency" => 'VND',
                            "lstRetDateRange"=>0,    
                            "txtNumAdults" => $data['ADT'],     
                            "txtNumChildren" =>$data['CHD'],     
                            "txtNumInfants" =>$data['INFANT'],    
                            'txtPromoCode'=>'',     
                        );
                        $post_auto = http_build_query($post_auto);
                        /* Step 4 */
                        $form_html = curl($link_form, $cookies, $post_auto);
                        
                        $day_split = cut_str($form_html, "name='dlstRetDate_Day'", '</select>');
                        $month_split = cut_str($form_html, "<select name='dlstRetDate_Month'", '</select>');
                        preg_match("/<option value='\d{2}' selected>([^<]+)<\/option>/U", $form_html, $day_begin);
                        preg_match("/<option value='\d{2}' selected>([^<]+)<\/option>/U", $day_split, $day_end);
                        preg_match("/<option value='([^']+)' selected >.*<\/option>/is", $form_html, $my_begin);
                        preg_match("/<option value='([^']+)' selected >.*<\/option>/is", $month_split, $my_end);
                        $post_end['SesID'] = cut_str($form_html, "name='SesID' value='","'");
                        $post_end['DebugID'] = cut_str($form_html, "name='DebugID' value='","'");
                        $post_end['__VIEWSTATE'] = cut_str($form_html, 'id="__VIEWSTATE" value="','"');
                        $post_end['dlstDepDate_Day'] = $day_begin[1];
                        $post_end['dlstDepDate_Month'] = $my_begin[1];
                        $post_end['dlstRetDate_Day'] = $day_end[1];
                        $post_end['dlstRetDate_Month'] = $my_end[1];
                        $post_end['lstCurrency'] = 'VND';
                        $post_end['lstDepDateRange'] = 0;
                        $post_end['lstDestAP'] = -1;
                        $post_end['lstLvlService'] = 1;
                        $post_end['lstOrigAP'] = -1;
                        $post_end['lstResCurrency'] = 'VND';
                        $post_end['lstRetDateRange'] = 0;
                        $post_end['lstNumAdults'] = 0;
                        $post_end['lstNumChildren'] = 0;
                        $post_end['lstNumInfants'] = 0;
                        $post_end['lstPromoCode'] = '';
                        $post_end = http_build_query($post_end);
                        $page = curl($link_form, $cookies, $post_end);
                        $result_vietjet = curl($link_result, $cookies, "", false);
                        header("Content-Type: text/html; charset=utf-8");
                        unlink($cookies);
                            return $result_vietjet;
                    // cut_tr   
        }
function getVietJet($html,$depcode,$descode,$direction){
        $flight=array();

                if($direction==1){
                            $strsearch=$html;
                            $strsearch=str_replace("&nbsp;","",$strsearch);


                            $dom=new DOMDocument();
                            @$dom->loadHTML($strsearch);
                            $finder=new DOMXPath($dom);
                            $class_flights = "FlightsGrid";
                            $node_tbl=$finder->query("//table[contains(concat(' ', normalize-space(@class), ' '), ' $class_flights ')]"); // lấy các table có class='FlightsGrid'
                            //var_dump($node_tbl);
                            if ($node_tbl->length > 0) {
                                    $note="";

                                    #### LẤY THÔNG TIN CHUYẾN BAY ĐI
                                    $class_gridFlightEvenchecked = "gridFlightEvenchecked";
                                    $class_gridFlightEven = "gridFlightEven";
                                    $class_gridFlightOdd = "gridFlightOdd";
                                    $id_gridTravelOptDep = "gridTravelOptDep";
                                    $node_tr=$finder->query(".//tr[contains(concat(' ', normalize-space(@class), ' '), ' $class_gridFlightEven ') and contains(@id,'$id_gridTravelOptDep')] | .//tr[contains(concat(' ', normalize-space(@class), ' '), ' $class_gridFlightOdd ') and contains(@id,'$id_gridTravelOptDep')] | .//tr[contains(concat(' ', normalize-space(@class), ' '), ' $class_gridFlightEvenchecked ') and contains(@id,'$id_gridTravelOptDep')]", $node_tbl->item(0));


                                    foreach ($node_tr as $key => $tr) {

                                                // Lấy giờ đi
                                                $startTime = $tr->getElementsByTagName("td")->item(0)->getElementsByTagName("td")->item(1)->nodeValue;
                                                $startTime = substr($startTime, 0, 5);

                                                // Lấy giờ đến
                                                $stopTime = $tr->getElementsByTagName("td")->item(0)->getElementsByTagName("td")->item(2)->nodeValue;
                                                $stopTime = substr($stopTime, 0, 5);

                                                // Lấy mã chuyến bay - thời gian bay
                                                $flight_no_duration =$tr->getElementsByTagName("td")->item(0)->getElementsByTagName("td")->item(3)->nodeValue;
                                                $flight_no = substr($flight_no_duration, 0, 6);
                                                $duration =  substr($flight_no_duration, 6);

                                                // Lấy giá chuyến bay
                                                if ($tr->getElementsByTagName("td")->item(6)->nodeValue == trim("Hết vé")) {
                                                    if ($tr->getElementsByTagName("td")->item(7)->nodeValue == trim("Hết vé")) {
                                                        $price = $tr->getElementsByTagName("td")->item(8)->nodeValue;
                                                    }else{
                                                        $price = $tr->getElementsByTagName("td")->item(7)->nodeValue;
                                                    }
                                                }else{
                                                    $price = $tr->getElementsByTagName("td")->item(6)->nodeValue;
                                                }
                                                $flight[$key]["dep"]=$depcode;
                                                $flight[$key]["arv"]=$descode;
                                                $flight[$key]["deptime"]=trim($startTime);
                                                $flight[$key]["arvtime"]=trim($stopTime);
                                                $flight[$key]["flightno"]=trim($flight_no);
                                                $flight[$key]["price"]=trim(getPrice($price));
                                                $flight[$key]["duration"]=trim($duration);
                                                $flight[$key]["note"]=$note;

                                    }
                        }

            return $flight;
    }/*Ket thuc one way - xu ly neu ko phai one way*/
    else
    {

            $strsearch=$html;
            $strsearch=str_replace("&nbsp;","",$strsearch);


            $dom=new DOMDocument();
            @$dom->loadHTML($strsearch);
            $finder=new DOMXPath($dom);
            $class_flights = "FlightsGrid";
            $node_tbl=$finder->query("//table[contains(concat(' ', normalize-space(@class), ' '), ' $class_flights ')]"); // lấy các table có class='FlightsGrid'
            //var_dump($node_tbl);
            if ($node_tbl->length > 1) {
                $note="";
                    
                    #### LẤY THÔNG TIN CHUYẾN BAY ĐI
                    $class_gridFlightEvenchecked = "gridFlightEvenchecked";
                    $class_gridFlightEven = "gridFlightEven";
                    $class_gridFlightOdd = "gridFlightOdd";
                    $id_gridTravelOptDep = "gridTravelOptDep";
                    $node_tr=$finder->query(".//tr[contains(concat(' ', normalize-space(@class), ' '), ' $class_gridFlightEven ') and contains(@id,'$id_gridTravelOptDep')] | .//tr[contains(concat(' ', normalize-space(@class), ' '), ' $class_gridFlightOdd ') and contains(@id,'$id_gridTravelOptDep')] | .//tr[contains(concat(' ', normalize-space(@class), ' '), ' $class_gridFlightEvenchecked ') and contains(@id,'$id_gridTravelOptDep')]", $node_tbl->item(0));


                    foreach ($node_tr as $key => $tr) {

                        // Lấy giờ đi
                        $startTime = $tr->getElementsByTagName("td")->item(0)->getElementsByTagName("td")->item(1)->nodeValue;
                        $startTime = substr($startTime, 0, 5);

                        // Lấy giờ đến
                        $stopTime = $tr->getElementsByTagName("td")->item(0)->getElementsByTagName("td")->item(2)->nodeValue;
                        $stopTime = substr($stopTime, 0, 5);

                        // Lấy mã chuyến bay - thời gian bay
                        $flight_no_duration =$tr->getElementsByTagName("td")->item(0)->getElementsByTagName("td")->item(3)->nodeValue;
                        $flight_no = substr($flight_no_duration, 0, 6);
                        $duration =  substr($flight_no_duration, 6);

                        // Lấy giá chuyến bay
                         // Lấy giá chuyến bay
                        if ($tr->getElementsByTagName("td")->item(6)->nodeValue == trim("Hết vé")) {
                            if ($tr->getElementsByTagName("td")->item(7)->nodeValue == trim("Hết vé")) {
                                $price = $tr->getElementsByTagName("td")->item(8)->nodeValue;
                            }else{
                                $price = $tr->getElementsByTagName("td")->item(7)->nodeValue;
                            }
                        }else{
                            $price = $tr->getElementsByTagName("td")->item(6)->nodeValue;
                        }

                        $flight['dep'][$key]["dep"]=$depcode;
                        $flight['dep'][$key]["arv"]=$descode;
                        $flight['dep'][$key]["deptime"]=trim($startTime);
                        $flight['dep'][$key]["arvtime"]=trim($stopTime);
                        $flight['dep'][$key]["flightno"]=trim($flight_no);
                        $flight['dep'][$key]["price"]=trim(getPrice($price));
                        $flight['dep'][$key]["duration"]=trim($duration);
                        $flight['dep'][$key]["note"]=$note;

                    }
                    #### KẾT THÚC LẤY CHUYẾN BAY ĐI

                    #### LẤY THÔNG TIN CHUYẾN BAY VỀ
                    $class_gridFlightEvenchecked = "gridFlightEvenchecked";
                    $class_gridFlightEven = "gridFlightEven";
                    $class_gridFlightOdd = "gridFlightOdd";
                    $id_gridTravelOptRet = "gridTravelOptRet";
                    $node_tr=$finder->query(".//tr[contains(concat(' ', normalize-space(@class), ' '), ' $class_gridFlightEven ') and contains(@id,'$id_gridTravelOptRet')] | .//tr[contains(concat(' ', normalize-space(@class), ' '), ' $class_gridFlightOdd ') and contains(@id,'$id_gridTravelOptRet')] | .//tr[contains(concat(' ', normalize-space(@class), ' '), ' $class_gridFlightEvenchecked ') and contains(@id,'$id_gridTravelOptRet')]", $node_tbl->item(1));


                    foreach ($node_tr as $key => $tr) {

                        // Lấy giờ đi
                        $startTime = $tr->getElementsByTagName("td")->item(0)->getElementsByTagName("td")->item(1)->nodeValue;
                        $startTime = substr($startTime, 0, 5);

                        // Lấy giờ đến
                        $stopTime = $tr->getElementsByTagName("td")->item(0)->getElementsByTagName("td")->item(2)->nodeValue;
                        $stopTime = substr($stopTime, 0, 5);

                        // Lấy mã chuyến bay - thời gian bay
                        $flight_no_duration =$tr->getElementsByTagName("td")->item(0)->getElementsByTagName("td")->item(3)->nodeValue;
                        $flight_no = substr($flight_no_duration, 0, 6);
                        $duration =  substr($flight_no_duration, 6);

                        // Lấy giá chuyến bay
                        $price = $tr->getElementsByTagName("td")->item(6)->nodeValue;
                         // Lấy giá chuyến bay
                        if ($tr->getElementsByTagName("td")->item(6)->nodeValue == trim("Hết vé")) {
                            if ($tr->getElementsByTagName("td")->item(7)->nodeValue == trim("Hết vé")) {
                                $price = $tr->getElementsByTagName("td")->item(8)->nodeValue;
                            }else{
                                $price = $tr->getElementsByTagName("td")->item(7)->nodeValue;
                            }
                        }else{
                            $price = $tr->getElementsByTagName("td")->item(6)->nodeValue;
                        }

                        $flight['ret'][$key]["dep"]=$descode;
                        $flight['ret'][$key]["arv"]=$depcode;
                        $flight['ret'][$key]["deptime"]=trim($startTime);
                        $flight['ret'][$key]["arvtime"]=trim($stopTime);
                        $flight['ret'][$key]["flightno"]=trim($flight_no);
                        $flight['ret'][$key]["price"]=trim(getPrice($price));
                        $flight['ret'][$key]["duration"]=trim($duration);
                        $flight['ret'][$key]["note"]=$note;

                    }
                    #### KẾT THÚC LẤY CHUYẾN BAY VỀ

            }

    }

    return $flight;
}
function getFlightVietJet($data) {
    $html = postVietJet($data); /*Lấy file html*/
    /*Đổi loại chuyến bay cho phù hợp*/
    if ($data['STRUCTURE']=='RoundTrip') {
        $data['STRUCTURE'] = 0;
        $flights = getVietJet($html, $data['FROM'], $data['TO'], $data['STRUCTURE']); /*Lọc*/
    } else {
        $data['STRUCTURE'] = 1;
        $flights = array("dep" => getVietJet($html, $data['FROM'], $data['TO'], $data['STRUCTURE'])); /*Lọc*/
    }
    return json_encode($flights);
}
?>