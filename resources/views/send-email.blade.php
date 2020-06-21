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
        <main id="app">
        @verbatim
            <table class="table-auto">
                <thead>
                <tr>
                    <th class="px-4 py-2">Person Details</th>
                    <th class="px-4 py-2">Giving Details</th>
                </tr>
                </thead>
                <tbody>
                    <template v-if="givingData.length > 0">
                        <tr v-for="data in givingData">
                            <td class="border px-4 py-2">
                                {{ data.fullName }} <br>
                                {{ data.emailTo }} <br>
                                {{ data.firstName }}
                            </td>
                            <td class="border px-4 py-2">
                                <template v-for="detail in data.givingDetails">
                                    <span>
                                        PHP {{ detail[3] }},
                                        {{ detail[1] }},
                                        {{ detail[2] }},
                                        {{ detail[0] }}
                                    </span> <br> 
                                </template>
                            </td>
                        </tr>
                    </template>
                    <tr v-else>
                        <td class="border px-4 py-2">None yet</td>
                        <td class="border px-4 py-2">None yet</td>
                    </tr>
                </tbody>
            </table>

            <button @click.prevent="getData"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
            >
                Get Data
            </button>
            <button @click.prevent="sendEmail"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
            >
                Send Email
            </button>
        @endverbatim

        <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" 
            href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
        >
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        </main>
        <!-- Scripts -->
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script>
            const app = new Vue({
                el: '#app',

                data: {
                    givingData: [],
                    
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

                    },

                    getData() {
                        const vm = this;

                        axios.get('api/v1/get-data')
                        .then(function (response) {
                            // handle success
                            console.log(response.data);
                            vm.givingData = response.data;
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
