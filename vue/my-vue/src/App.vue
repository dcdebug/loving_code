<template>
  <div id="app">
    <img src="./assets/logo.png">
    <p>bootstrap 有用吗？</p>
    <button class="btn btn-primary">确定</button>
    <button class="btn btn-success">使用</button>
    <button class="btn btn-danger">危险</button>
    <hr/>
    <div class="myclass">
      {{content}} ,我是自定义的class格式
    </div>
    <router-view/>

  </div>
</template>

<script>
  //引入自定义的css文件
  import './assets/my.css'

  export default {
    name: 'App'
  }
</script>

<style>
  #app {
    font-family: 'Avenir', Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
    margin-top: 60px;
  }
</style>
