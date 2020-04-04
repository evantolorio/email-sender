<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Acknowledgement Receipt</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
        <style>

        </style>
    </head>
    <body>
    @verbatim
        <main id="app">
            <button @click.prevent="sendEmail"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
            >
                Send Email
            </button>
        </main>
    @endverbatim
        <!-- Scripts -->
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script>
            const app = new Vue({
                el: '#app',

                data: {
                    message: 'Hello Vue!'
                },

                methods: {
                    sendEmail() {

                        axios.get('api/v1/send-email')
                        .then(function (response) {
                            // handle success
                            console.log(response);
                        })
                        .catch(function (error) {
                            // handle error
                            console.log(error);
                        });

                    }
                }
            });
        </script>
    </body>
</html>
