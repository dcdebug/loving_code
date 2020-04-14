<template>
  <div id="app">
    <img alt="Vue logo" src="./assets/logo.png">
    <HelloWorld msg="Welcome to Your Vue.js App"/>
    <VueOK msg="test"/>
    <!--1.组件的html-->
    <ButtonCounter msg="Button counter"/>
  </div>
</template>

<script>
import HelloWorld from './components/HelloWorld.vue'
import VueOK from './components/VueOK.vue'
/*2. import 组件*/
import ButtonCounter from './components/ButtonCounter.vue'
export default {
  name: 'App',
  components: {
    HelloWorld,
    VueOK,
    /*3.组件列表*/
    /*4. components 目录创建 组件.vue文件*/
    ButtonCounter,
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
