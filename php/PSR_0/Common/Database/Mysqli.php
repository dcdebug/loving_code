<?php
namespace  Common\Database;

use Common\IDatabase;

/*class Mysqli implements  IDatabase{

    protected  $conn;

    function connect($host,$user,$password,$dbname){
        try{
            $this->conn = mysqli_connect($host,$user,$password,$dbname);

        }catch (\Exception $e){

            echo "This message is :".$e->getMessage().PHP_EOL;

        }
    } //数据库链接
    function query($sql){
        return mysqli_query($this->conn,$sql);
    } //数据库查询
    function close(){
        mysqli_close($this->conn);

    } //数据库关闭

}*/
//danlimoshi

class Mysqli implements IDatabase{

    protected  static  $instance;
    protected    $conn;
    protected  $origin_result;
    private  function __construct()
    {
            //将数据库的配置文件,可以放到config文件中

            $this->connect("localhost","root","iServer123","upmngr");
    }

    static  function getInstance(){
        if(self::$instance){
            return self::$instance;
        }
        self::$instance = new self();
        return self::$instance;

    }
    public  function connect($host, $user, $password, $dbname)
    {
        // TODO: Implement connect() method.
        try{
            $this->conn = mysqli_connect($host,$user,$password,$dbname);
            if(!$this->conn){
                die('Connect Error (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
            }
            return $this->conn;
        }catch (\Exception $e){
            echo "This message is :".$e->getMessage().PHP_EOL;
        }
    }

    /**
     * 执行sql语句
     * @param $sql
     * @return bool|\mysqli_result
     */
    public  function query($sql){
         $this->origin_result =mysqli_query($this->conn,$sql);
         return $this; //使用链式查询
    }

    /**
     * 整理打印的结果
     *
     * @return array
     */
    public function get_array(){
        if($this->origin_result){
            while($row = $this->origin_result->fetch_object()){
                $result_arr[] = $row;
            }
            $this->origin_result->close();
            return $result_arr;
        }else{
            return [];
        }
    }

    /**
     * 关闭链接
     */
    public  function close(){
            mysqli_close($this->conn);
    }
}