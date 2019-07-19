

Vue.component('message', {

  props: ['title','body'],

  template: `
              <article class="message is-primary">
              <div class="message-header">
              {{title}}
              </div>

              <div class="message-body">
              {{body}}
              </div>
            </article>
   `
});

new Vue({
  el:'#test',

  data:{
    skills:[]
  },

  mounted (){
  // mounted() launches whenever page starts
  axios.get('/skills').then(response => console.log(response));
  }
});
