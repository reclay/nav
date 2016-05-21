<?php
namespace Home\Controller;
use Think\Controller;
class RobotController extends Controller {
    public function index(){
      $robot=M('robot');
      $re=$robot->select();
      //var_dump($re);
      for($i=0;$i<count($re);$i++){
        $data['id']=$re[$i]['id'];
        $data['url']=$re[$i]['url'];
        $site=M('site');
        $site->data($data)->save();
        //$this->getPage($url,$id);
      }

    }
    private function getPage($url,$id){
        $str=$this->curl($url);
        //var_dump($str);
        $filename='F:/program/wamp/www/nav/Public/robot/'.$id.".html";
        //echo $filename;
        $myfile = fopen($filename, "w") or die("Unable to open file!");
        fwrite($myfile, $str);
        fclose($myfile);
      }

      private function get_info(){
        $doc=phpQuery::newDocumentFileHTML('html/0.html');

      }

      private function curl($url){
        $ch = curl_init();
        $timeout = 100;
        curl_setopt ($ch, CURLOPT_URL, $url);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0");
        //curl_setopt($ch, CURLOPT_PROXY, 'https://pkupac.org/pku_z1ks/9657740.pac');
        $file_contents = curl_exec($ch);

        if (curl_errno($ch)) {
          echo 'Curl error: ' . curl_error($ch);
        }
        curl_close($ch);
        return $file_contents;
      }

      private function strFilter($str){
        $str = str_replace('`', '', $str);
        $str = str_replace('·', '', $str);
        $str = str_replace("'", '', $str);
        $str = str_replace('"', '', $str);
        $str = str_replace('“', '', $str);
        $str = str_replace('”', '', $str);
        $str = str_replace('|', '', $str);
        return strip_tags($str);
    }

}
