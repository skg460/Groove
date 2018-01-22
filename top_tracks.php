<?php

  $service_url = 'http://ws.audioscrobbler.com/2.0/?method=chart.gettoptracks&api_key=7d9f8229c0938ebad0e26bdda23cb5a4&format=json';
  $ch = curl_init(); 

        // set url 
        curl_setopt($ch, CURLOPT_URL, $service_url); 

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $output = curl_exec($ch); 
        $new_output = json_decode($output,true);
        // close curl resource to free up system resources 
        curl_close($ch);
        
        //print_r($new_output);
        //echo $new_output['tracks']['track'][0]['name'];
        $i=0;


        
  $service_url = 'http://ws.audioscrobbler.com/2.0/?method=chart.gettopartists&api_key=7d9f8229c0938ebad0e26bdda23cb5a4&format=json';
  $ch = curl_init(); 

        // set url 
        curl_setopt($ch, CURLOPT_URL, $service_url); 

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $output = curl_exec($ch); 
        $top_artists = json_decode($output,true);
        // close curl resource to free up system resources 
        curl_close($ch);
        
        //print_r($top_artists);
        //echo $top_artists['artists']['artist'][0]['image'][2]['#text'];
        $j=0;

    $service_url = 'http://ws.audioscrobbler.com/2.0/?method=artist.gettoptracks&artist=cher&api_key=7d9f8229c0938ebad0e26bdda23cb5a4&format=json';
  $ch = curl_init(); 

        // set url 
        curl_setopt($ch, CURLOPT_URL, $service_url); 

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $output = curl_exec($ch); 
        $artist_tracks = json_decode($output,true);
        // close curl resource to free up system resources 
        curl_close($ch);
        
        //print_r($top_artists);
        //echo $top_artists['artists']['artist'][0]['image'][2]['#text'];
        $k=0;
?>