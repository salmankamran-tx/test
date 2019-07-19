<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>


<body>



  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js" type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue" type="text/javascript" ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js" type="text/javascript"></script>
  <script src="./js/main.js" type="text/javascript"></script>
    <br><br>
  <div class="container">
  <article class="message is-primary">
    <div class="message-header">
      <p>Laravel Vue CRUD</p>
      <button class="delete" aria-label="delete"></button>
    </div>
    <div class="message-body">
    Lets Start
  </article><br><br>


  <div class="field">
    <label class="label">Ttile</label>
    <div class="control">
      <input class="input" type="text" placeholder="Title">
    </div>
  </div>


  <div class="field">
    <label class="label">Description</label>
    <div class="control">
      <textarea class="textarea" placeholder="Description"></textarea>
    </div>
  </div>


  <div class="field is-grouped">
    <div class="control">
      <button class="button is-success">Submit</button>
    </div>
  </div>

</body>
