#include <stdio.h>
#include <string.h>
//函数指针
int max(int x,int y){
    return x>y?x:y;
}

int main(void){
    //int (*p)(int,int) = max; //或者&max
    int a,b,c,d;

    printf("请输入三个数字:");
    scanf("%d %d %d",&a,&b,&c);
    d = max(max(a,b),c);
    printf("最大的数字是：%d\n",d);
    return 1;
}