<template>
    <div style="display: block;">
        <button v-on:click="count++">You clicked me {{ count }} times.</button>
    </div>
</template>
<script>
    export default {
      props:{
          msg:String,
          list:Array,
          age:undefined
      },
        data:function(){
          return {
              count:0
          }
        }
    };
</script>