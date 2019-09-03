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

//三个地方，必须要有2个

struct {
        int a;
        char b;
        double c;
}s1;
struct simple{
        int a;
        char b;
        double c;
}simple1;

struct {
        int a;
        char b;
        double c;
};

typedef struct {
        int a;
        char b;
        double c;
}simple2;
//simple2就是定义的结构体类型
simple2 u1,u2,u3;


/*
struct Books{
        char title[50];
        char author[50];
        char subject[100];
        int book_id;
}book = {"Ｃ语言","Runoob","编程语言" ,1};
*/
typedef struct{
        char title[50];
        char author[50];
        char subject[100];
        int book_id;
}Books;
 Books book = {"Ｃ语言","Runoob","编程语言" ,1};

 // 
int main(){

        printf("title :%s\n author:%s\n subject: %s\n book_id:%d",book.title,
        book.author,
        book.subject,
        book.book_id
        );
    return 0;
}