<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

    <br><br>

  <div class="container">
    <section class="hero is-medium is-primary is-bold">
    <div class="hero-body">
      <div class="container">
        <h1 class="title">
          Laravel Vue CRUD
        </h1>
        <h2 class="subtitle">
        Lets Start!
        </h2>
      </div>
    </div>
  </section>

  <div id="test">

  @csrf

  <div class="field">
    <label class="label">Ttile</label>
    <div class="control">
      <input class="input" type="text" placeholder="Title" name="title" id="title" v-model="newPost.title">
    </div>
  </div>

  <div class="field">
    <label class="label">Body</label>
    <div class="control">
      <textarea class="textarea" placeholder="Body" name="body" id="body" v-model="newPost.body"></textarea>
    </div>
  </div>

    <article class="message is-danger" v-show="hasError">
      <div class="message-body">
          Please fill all the fields
      </div>
    </article>

  <div class="field is-grouped">
    <div class="control">
      <button type="submit" class="button is-success" @click.prevent="createPost()">Submit</button>
    </div>
  </div>

  <div class="field">
  <label class="label">Search</label>
    <input class="input is-success" type="text" placeholder="Search Posts" v-model="search">
  </div>

<table class="table" id="table">
<thead class="thead-light">
  <tr>
    <th scope="col">ID</th>
    <th scope="col">Title</th>
    <th scope="col">Body</th>
    <th scope="col">Action</th>
  </tr>
</thead>
  <tbody>
  <tr v-for="post of posts">
    <td>@{{post.id}}</td>
    <td>@{{post.title}}</td>
    <td>@{{post.body}}</td>
    <td>
      <button type="button" class="btn btn-warning" @click="showModal=true; setVal(post.id, post.title, post.body)">Edit</button>
      <button type="button" class="btn btn-danger" @click.prevent="deletePost(post)">Delete</button>
    </td>
  </tr>
  </tbody>
</table>


<!--edited script for vue modal template -->
<modal v-if="showModal" @close="showModal=false">
  <h3 slot="header">Edit Post</h3>
  <div slot="body">
      <input type="hidden" disabled id="e_id" name="id" :value="this.e_id">
      <input class="input" type="text" name="title" id="e_title" :value="this.e_title"> <br><br>
      <textarea class="textarea" name="body" id="e_body" :value="this.e_body"></textarea>
  </div>

  <div slot="footer">
    <button class="btn btn-primary" @click="showModal=false">Cancel</button>
    <button class="btn btn-info" @click="editPost()">Update</button>
  </div>
</modal>


</div>

</div>



<script src="/js/main.js" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.js" type="text/javascript"></script>
<script src="https://unpkg.com/vue" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/vue" type="text/javascript" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js" type="text/javascript"></script>


<!--script for vue modal template -->
<script type="text/x-template" id="modal-template">
<transition name="modal">
  <div class="modal-mask">
    <div class="modal-wrapper">
      <div class="modal-container">

        <div class="modal-header">
          <slot name="header">
            default header
          </slot>
        </div>

        <div class="modal-body">
          <slot name="body">
            default body
          </slot>
        </div>

        <div class="modal-footer">
          <slot name="footer">
            default footer
            <button class="modal-default-button" @click="$emit('close')">
              OK
            </button>
          </slot>
        </div>
      </div>
    </div>
  </div>
</transition>
</script>


<!--style for vue modal template -->
<style>
.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, .5);
  display: table;
  transition: opacity .3s ease;
}

.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}

.modal-container {
  width: 300px;
  margin: 0px auto;
  padding: 20px 30px;
  background-color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
  transition: all .3s ease;
  font-family: Helvetica, Arial, sans-serif;
}

.modal-header h3 {
  margin-top: 0;
  color: #42b983;
}

.modal-body {
  margin: 20px 0;
}

.modal-default-button {
  float: right;
}

/*
 * The following styles are auto-applied to elements with
 * transition="modal" when their visibility is toggled
 * by Vue.js.
 *
 * You can easily play with the modal transition by editing
 * these styles.
 */

.modal-enter {
  opacity: 0;
}

.modal-leave-active {
  opacity: 0;
}

.modal-enter .modal-container,
.modal-leave-active .modal-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}
</style>


</body>
