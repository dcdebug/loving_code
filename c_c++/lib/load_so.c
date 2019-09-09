#include <stdio.h>
#include <dlfcn.h>
int main(int argc, char* argv[]){
    void* handler = dlopen("./libhelloworld.so",RTLD_LAZY);
    char* error = dlerror();
    if(!handler ||error){
        printf(" load so error \n");
        return 0;
    }   

    void (*func)() = dlsym(handler,"helloworld");
    if(!func){
        printf("load func error !\n");
        dlclose(handler);
        return 1;
    }
    func();
    dlclose(handler);
    return 0;

}