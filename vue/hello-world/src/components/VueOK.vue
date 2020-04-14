<template>
    <div style="display:block;">
        <h1>Title</h1>
        <p>Paragraph 1</p>
        <p style="color:red;">Tips : {{msg}}</p>
        <button @click="handleAChange">Change data.a</button>
        <button @click="handleBChange">Change data.b</button>
        <button @click="handleCName"> Get my Name</button>
        <p>
            data.b: {{b}}
        </p>
        <p>
            data.a:{{a}}
        </p>
        <p>
            My Name is : {{name}}
        </p>
        <p>
            msg is :{{msg}}
        </p>
    </div>
</template>
<script>
    export  default {
        props:{
            msg:String,
        },
        data(){
            //this.name =name; //name并不能更新
            return {
                a:"example",
                b:"hello",
                name:name,
                msg:msg,
            };
        },
        methods:{
            handleAChange(){
                this.msg="data.a 发生了变化";
                this.a  = 5;
                console.log("data.a 发生了变化");
            },
            handleBChange(){
                /*触发b的更新*/
                this.msg="data.b 发生了变化";
                this.b = "vue"+(Date.now());
                console.log("data.b 发生了变化，但是并没有触发组件更新",this.b);
            },
            handleCName(){
                this.msg="Jeau ，I love You ";
                this.name="Jeau";
                console.log("Jeau ,I love You");
            }
        }
    };
</script>