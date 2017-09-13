<?php defined('BASEPATH') OR exit('No direct script access allowed.');

if ( ! function_exists('count_visitor')) 
{
    function count_visitor()
    {

    $tz_object = new DateTimeZone('Europe/Rome');
    //date_default_timezone_set('Europe/Rome');
    $datetime = new DateTime();
    $datetime->setTimezone($tz_object);
    $date= $datetime->format('Y-m-d');



        $filecounter=(APPPATH . '/counter.txt');
        $counter=file($filecounter);
        $counter = explode('/',$counter[0]);

// echo '<script type="text/javascript"> alert("'. $date . '")</script>';

        $counter[0]++;
        $file=fopen($filecounter, 'w');
        fputs($file, $counter[0] . '/' . $date );
        fclose($file);


        return ;
    }
}

if ( ! function_exists('counter_init')) 

{

    function counter_init()
    {


       $filecounter=(APPPATH . '/counter.txt');
       $counter=file($filecounter);

    $tz_object = new DateTimeZone('Europe/Rome');
    //date_default_timezone_set('Europe/Rome');
    $datetime = new DateTime();
    $datetime->setTimezone($tz_object);
    $date= $datetime->format('Y-m-d');


       $counter = explode('/',$counter[0]);

       $date_file= str_replace(array("\r", "\n"), '',$counter[1]);



//               echo '<script type="text/javascript"> alert("'. $date . '")</script>';

       if ($date != $date_file)
       {
       $file=fopen($filecounter, 'w');
       fputs($file, '0' . '/' . $date  );
       fclose($file);
       //        echo '<script type="text/javascript"> alert("'. $counter[1] . '")</script>';
   
       }
       return;
    }


}

if ( ! function_exists('count_dashboard'))
{

    function count_dashboard()
    {

        $filecounter=(APPPATH . '/counter.txt');
        $counterdash=file($filecounter);
        $counterdash=explode('/',$counterdash[0]);


        return $counterdash[0];
    }


}


?>
