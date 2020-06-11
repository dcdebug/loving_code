#include <stdio.h>
#include "msg.c"
int main(void){
    extern char a;
    printf("%c \n ",a);
    (void)msg();
    return 0;
}