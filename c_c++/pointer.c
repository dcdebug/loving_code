#include <stdio.h>

//指针是一个变量，其值为另一个变量的地址，即，内存位置的直接地址。就像其他变量或常量一样，您必须在使用指针存储其他变量地址之前，对其进行声明。指针变量声明的一般形式为：


int main(){
    int var1;

     char var2[10];

     printf("var1 的变量的地址:%p\n",&var1);
     printf("var1 变量的大小：%ld\n",sizeof(int));
     printf("var2 变量的地址:%p\n",&var2);


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
     return  1;
}