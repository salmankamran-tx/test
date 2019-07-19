
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>


<body>



  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js" type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue" type="text/javascript" ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js" type="text/javascript"></script>
  <script src="./js/main.js" type="text/javascript"></script>


    <div class="container" id="test" >

      <message title="Laravel Vue" body="Lets Start"></message>

      <ul>
      <li v-for="name in names" v-text="name"></li>
     </ul>

      <input id="input" type="text" v-model="newName">
       <button v-on:click="addName"> submit</button><br><br>

    </div>


</body>
<script>

 var app1 = new Vue({
   el: '#test',
   data:{
     newName: '',
     names: ['sajid', 'zair', 'salman' , 'talha' , 'asim']
   },

   methods: {
     addName(){
       this.names.push(this.newName);
       this.newName = ''
     }
   },

 })

</script>
