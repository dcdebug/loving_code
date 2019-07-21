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
        //mysqli_query查询方法返回的是一个mysqli_result  对象

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
            if($this->origin_result instanceof  \mysqli_result){
                echo "mysqli_result <br/>";
            }

        /*    $result = $this->origin_result->fetch_all();

            echo "<pre>";
            var_dump($result);
            die;*/

            //$result = $this->origin_result->fetch_array(MYSQLI_BOTH);
            //$result = $this->origin_result->fetch_array(MYSQLI_NUM);//没有字段名称了
     /*       while($row= $this->origin_result->fetch_array(MYSQLI_NUM)){
                echo "<pre>";
                var_dump($row);
            }*/

            //MYSQLI_ASSOC:id,name...等别的字段都会显示, MYSQLI_NUM:字段名称去掉,用0,1,2...等替换, or MYSQLI_BOTH:前两者都有


    /*        while($row= $this->origin_result->fetch_array(MYSQLI_BOTH)){
                echo "<pre>";
                var_dump($row);
            }
            die;
            echo "<pre>";
            var_dump($result);
            die;*/
            while($row = $this->origin_result->fetch_array(MYSQLI_BOTH)){

               /* echo "<pre>";

                var_dump($row);*/
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