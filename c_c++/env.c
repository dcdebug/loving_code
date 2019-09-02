#include <stdio.h>

//定义一个枚举类型
enum WEEK{
    MON =1,TUE,WED,THU,FRI,SAT,SUN
}week;

int main(){


    //enum :枚举类型
    printf("the week 's default value is %d\n",week);
    week = MON;
    printf("the day defined value is  %d\n",week);
    week  = SUN;
    printf("the new value is %d\n",week);
    printf("hello world");

    enum WEEK day;
    //遍历枚举元素
    for(day =MON;day<=SUN;day++){
        printf("枚举元素：%d\n",day);
    }
    //return 1;
    int a ,b;
    int sum ;
    a =10;
    b = 11;
    printf("sum is %d",(a+b));
    //void *ptr = (char *)malloc(siezof(char));
    return 1;
}