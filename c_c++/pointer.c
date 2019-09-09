#include <stdio.h>

//指针是一个变量，其值为另一个变量的地址，即，内存位置的直接地址。就像其他变量或常量一样，您必须在使用指针存储其他变量地址之前，对其进行声明。指针变量声明的一般形式为：


int main(){
     int var1; //定义一个整型变量

     char var2[10]; //定一个char类型的数组

     printf("var1 的变量的地址:%p\n",&var1); //&var1代表变量在内存中地址
     printf("var1 变量的大小：%ld\n",sizeof(int)); //int类型在平台上的占用的内存大小
     printf("var2 变量的地址:%p\n",&var2);//var2在内存中的地址


     int var  =20;
     int *ip;
     ip =&var;
     printf("var 的变量的值是：%d\n",var);
     printf("var 变量的地址是：%p\n",&var);
     var = 30;
     *ip = 40;
     printf("*p 代表的是：%d\n",*ip);
     printf("p 代表的是：%p\n",ip);
      printf("var 的变量的值是：%d\n",var);
     printf("var 变量的地址是：%p\n",&var);


     printf("==============================\n");
     printf("c语言null指针\n");

     int *ptr_test;
     int *ptr_null = NULL;
     printf("*ptr_testd的变量的地址：%p\n",ptr_test);
     printf("*ptr_null的变量的地址：%p\n",ptr_null); 
     //在同一个平台上，结果相同，说明初始化指针的时候，可以省略 =NULL;

     //printf("*ptr_testd的变量的value：%d\n",*ptr_test);
     //printf("*ptr_null的变量的value：%d\n",*ptr_null); 
     if(ptr_test){
          printf("is not null\n");
     }else{
          printf("is null\n");
     }
     if(ptr_null){
          printf("ptr_null is not null\n");
     }else{
          printf("ptr_null is null\n");
     }
     return  1;
}