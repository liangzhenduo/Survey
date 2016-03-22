<?php
date_default_timezone_set('Asia/Shanghai');
class Excel
{
    function Start()
    {
        ob_start();
    }
    function Save($path)
    {
        $data=ob_get_contents();
        ob_end_clean();
        $this->WriteToExcel($path,$data);
    }
    function WriteToExcel($fn,$data)
    {
        $fp=fopen($fn,"wb");
        fwrite($fp,$data);
        fclose($fp);
    }
}

