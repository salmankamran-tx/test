
require('./bootstrap');

window.Vue = require('vue');
window.vueRouter=require('vue-router').default;
window.vueAxios=require('vue-axios').default;
window.Axios=require('axios').default;


Vue.component('modal', {
  template: '#modal-template'
})

var test = new Vue({
  el: '#test',
  data: {
   newPost:{'title': '' , 'body': ''},
   hasError: false,
   posts: [],
   showModal: false,
   e_id: '',
   e_title: '',
   e_body: '',
   },
    mounted: function mounted(){
        this.getPosts();
    },
   methods: {
        getPosts: function getPosts(){
          var _this = this;
           axios.get('/posts')
            .then(function (response){
              _this.posts = response.data;
           })
      },
    setVal(val_id, val_title, val_body){
      this.e_id = val_id;
      this.e_title = val_title;
      this.e_body = val_body;
    },
    createPost: function createPost(){
       var input = this.newPost;
       var _this = this;
       if(input['title'] == '' || input['body'] == ''){
         this.hasError = true;
     }
     else {
      this.hasError = false;
        axios.post('/posts', input)
          .then(function (response){
            _this.newPost = {'title': '' , 'body': ''}
            _this.getPosts();
          });
        }
      },
      deletePost: function deletePost(post){
        var _this = this;
        axios.post('/deletePost/' + post.id)
          .then(function response(){
            _this.getPosts();
          });
       },
      editPost: function editPost(post){
        var _this = this;
        var p_id = document.getElementById('e_id');
        var p_title = document.getElementById('e_title');
        var p_body = document.getElementById('e_body');

        axios.post('/editPost/' + p_id.value,{ val1: p_title.value, val2: p_body.value})
          .then(function response(){
            _this.getPosts();
            _this.showModal= false;
          });
      }
  }
});
