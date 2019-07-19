<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- vue css  -->
        <link href="/css/app.css" rel="stylesheet" type="text/css">

        <!-- Styles -->

        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue" type="text/javascript" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js" type="text/javascript"></script>


        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

              <div class="content" id="app">
                <example-component> </example-component>
              </div>

              <div class="content" id="test">
                @{{message}}
              </div>


              <div id="app2">
                <span v-bind:title="message">
                  Hover your mouse over me for a few seconds
                  to see my dynamically bound title!
                </span>
              </div>

              <div id="app3">
                <ol>
                  <li v-for = "todo in todos">
                    @{{todo.text}}
                  </li>
                </ol>
             </div>

             <div id="app4">
               @{{message}}
                <input v-model = "message">
            </div>

          </div>
        </div>

    </body>

            <script type="text/javascript" src="/js/app.js"> </script>

    <script>

    var test = new Vue({
      el: '#test',
      data: {
        message: 'Testing Vue!'
      }
    })

    var app2 = new Vue({
      el: '#app2',
      data:{
        message: 'you loaded this page' + new Date().toLocaleString()
      }
    })

    var app3 = new Vue({
        el: '#app3',
        data: {
          todos: [
            { text: 'Learn LARAVEL' },
            { text: 'Learn VUE' },
            { text: 'Build something awesome' }
          ]
        }
      })

      var app4 = new Vue({
        el: '#app4',
        data:{
        message: 'Hello Vue!'
        }
      })


    </script>

</html>
