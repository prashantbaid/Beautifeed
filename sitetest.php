<!DOCTYPE html> 
<!--
  Copyright 2010 Google Inc.
 
  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at
 
     http://www.apache.org/licenses/LICENSE-2.0
 
  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License.
 
  Original slides: Marcin Wichary (mwichary@google.com)
  Modifications: Chrome Developer Relations <chrome-devrel@googlegroups.com>
--> 

<?php
include('simple_html_dom.php');
$html = file_get_html($_POST['url']);
foreach($html->find('link') as $element) {
if ($element->rel=="alternate") {
  if($element->type=="application/rss+xml")
    break;
    else 
      echo "Feeds not available";
}}
/*$cache = dirname(__FILE__) . "/cache/feed";

if(filemtime($cache) < (time() - 10800))
{
 
   if ( !file_exists(dirname(__FILE__) . '/cache') ) {
      mkdir(dirname(__FILE__) . '/cache', 0777);
   }
 




  if ( is_object($feed) && $feed->query->count ) {
      $cachefile = fopen($cache, 'wb');
      fwrite($cachefile, $feed);
      fclose($cachefile);
   }
}
else
{
   $feed = file_get_contents($cache);
}
*/
   $path = "http://query.yahooapis.com/v1/public/yql?q=";
   $path .= urlencode("SELECT * FROM feed WHERE url='http://fulltextrssfeed.com/"."$element->href"."'");
   $path .= "&format=json";
    $feed = file_get_contents($path, true);
$feed = json_decode($feed);

?>
<html> 
  <head> 
    <meta charset="utf-8" /> 
    <meta http-equiv="X-UA-Compatible" content="IE=Edge;chrome=1" /> 
    <title>Beautifeed</title> 

         <link href="common.css" rel="stylesheet" media="screen" /> 
         <!-- <link href="presentation.css" rel="stylesheet" media="screen" />  -->
        <!-- <link href="http://fonts.googleapis.com/css?family=Droid+Sans|Droid+Sans+Mono" rel="stylesheet" type="text/css" /> -->
        <!-- <link href="default.css" rel="stylesheet" class="theme"  /> -->
        <link href="moon2.css" rel="stylesheet" class="theme" /> 
        <!-- <link id="prettify-link" href="prettify.css" rel="stylesheet" disabled /> -->
        
<style>
      @font-face
{
font-family: ChunkFive;
src: url('Chunkfive.ttf')
    ,url('Chunkfive.otf'); /* IE9+ */
}
      #gohome {
color: rgba(0, 0, 0, 0.2);
text-align: center;  
border:none 4px #000000;
padding-top:4px;
padding-bottom: 4px;
padding-right: 4px;
padding-left: 4px;
-moz-border-radius: 4px;
-webkit-border-radius: 4px;
border-radius: 4px;
background-color: rgba(0, 0, 0, 0.2);
background: rgba(0, 0, 0, 0.2);
background-color: black;
font-family:  ChunkFive, Verdana;
-moz-box-shadow: 4px 5px 14px #000000;
-webkit-box-shadow: 4px 5px 14px #000000;
box-shadow: 4px 5px 14px #000000;
font-style: bold;
font-size: 40px;
margin: 0 auto;
text-align: center;
text-shadow: 1px 1px 1px #DEDBDB;

}
#bottom {
position: absolute; bottom: 0; 
font-color: white;
width: 600px;
font-size: 18px;
padding-bottom: 10px;
font-family: verdana;
text-align: center;
font-family:  Georgia, Verdana;
padding-left: 100px;
}
#all {
  margin-bottom: 100px;
}
    </style> 
  </head>
  <body>
    <div class="presentation"> 
      <div id="presentation-counter"></div> 
      <div class="slides"> 
        <div class="slide"> 
          <section class="middle"> 
           <center> <img src="images/logob.png">
       <h2>Full Text Rss Feeds.</h2> 
            <p>Click here, Press <span class="key">&rarr;</span> key to advance.</p> 
      <p>If using Google Chrome, press left arrow key first, then right arrow key <br/> (This is a bug i've already reported to Google team)</p>
      <br/><br/></br>
      <p>Press 3 to zoom out</center></p>
          </section> 
        </div> 
        
      <ul id="feeder">
      <?php     $i=0;       foreach($feed->query->results->item as $item) {

               
            ?>
      <div class="slide" id="news-item<?php echo $i ?>"> 
          <section class="middle"> 
              <li><h2>
           
                 <?php echo $item->title; ?></br>
              </h2>
             
  <?php echo $item->description; ?> </br></br></br></li>
  </section> 
        </div> 
  <?php 
   $i++;} ?>
  </ul>
           <div class="slide">
        <section>
         <center> <i><p id="all">That's All!</p></i>
         <span id="gohome"><a href="index.htm">Go Home<a/></span></center>
         <div id="bottom"><i>By Prashant Baid</i></div>
        </section>    
    </div>     
 
  </div> <!-- slides --> 
 </div>
  <script src="utils.js"></script>

<!--<script src="prettify.js" onload="prettyPrint();" defer></script> --> 
    <!--[if lt IE 9]>
    <script 
      src="http://ajax.googleapis.com/ajax/libs/chrome-frame/1/CFInstall.min.js">
    </script>
    <script>CFInstall.check({ mode: "overlay" });</script>
    <![endif]--> 
    
  </body> 
</html>