#include <stdio.h>

//参考文档：https://www.runoob.com/cprogramming/c-structures.html
//define the struct 
/* struct struct_name{
        type variable1;
        type variable2;
        ....
}[strucct_variable_of_struct_name_type];
struct 结构体名称(算是一种类型){
     type variable1;
     
}该结构体名称类型的变量;
*/
struct books {
        char title[50];
        char author[50];
        char subject[100];
        int book_id;
}book1;
int main(){

    return 0;
}