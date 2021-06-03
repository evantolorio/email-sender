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
            /* CSS Preloader */
            .sk-cube-grid {
                width: 30px;
                height: 30px;
            }

            .sk-cube-grid .sk-cube {
                width: 33%;
                height: 33%;
                background-color: #1E40AF;
                float: left;
                -webkit-animation: sk-cubeGridScaleDelay 1.3s infinite ease-in-out;
                        animation: sk-cubeGridScaleDelay 1.3s infinite ease-in-out; 
            }
            .sk-cube-grid .sk-cube1 {
                -webkit-animation-delay: 0.2s;
                        animation-delay: 0.2s; }
                .sk-cube-grid .sk-cube2 {
                -webkit-animation-delay: 0.3s;
                        animation-delay: 0.3s; }
                .sk-cube-grid .sk-cube3 {
                -webkit-animation-delay: 0.4s;
                        animation-delay: 0.4s; }
                .sk-cube-grid .sk-cube4 {
                -webkit-animation-delay: 0.1s;
                        animation-delay: 0.1s; }
                .sk-cube-grid .sk-cube5 {
                -webkit-animation-delay: 0.2s;
                        animation-delay: 0.2s; }
                .sk-cube-grid .sk-cube6 {
                -webkit-animation-delay: 0.3s;
                        animation-delay: 0.3s; }
                .sk-cube-grid .sk-cube7 {
                -webkit-animation-delay: 0s;
                        animation-delay: 0s; }
                .sk-cube-grid .sk-cube8 {
                -webkit-animation-delay: 0.1s;
                        animation-delay: 0.1s; }
                .sk-cube-grid .sk-cube9 {
                -webkit-animation-delay: 0.2s;
                        animation-delay: 0.2s; }

                @-webkit-keyframes sk-cubeGridScaleDelay {
                    0%, 70%, 100% {
                        -webkit-transform: scale3D(1, 1, 1);
                                transform: scale3D(1, 1, 1);
                    } 35% {
                        -webkit-transform: scale3D(0, 0, 1);
                                transform: scale3D(0, 0, 1); 
                }
            }

            @keyframes sk-cubeGridScaleDelay {
                0%, 70%, 100% {
                    -webkit-transform: scale3D(1, 1, 1);
                            transform: scale3D(1, 1, 1);
                } 35% {
                    -webkit-transform: scale3D(0, 0, 1);
                            transform: scale3D(0, 0, 1);
                } 
            }

            /* Tooltip */
            .tooltip .tooltip-text {
                visibility: hidden;
                text-align: center;
                padding: 2px 6px;
                position: absolute;
                z-index: 100;
            }

            .tooltip:hover .tooltip-text {
                visibility: visible;
            }

        </style>
    </head>
    <body>
        <header>
            <nav class="flex items-center justify-center flex-wrap bg-gradient-to-r from-green-500 to-blue-700 p-6">
                <div class="flex items-center flex-shrink-0 text-white mr-6">
                    <!--div>Icons made by <a href="http://www.freepik.com/" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div-->
                    <svg class="fill-current h-8 w-8 mr-2" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg">
                        <g>
                            <path d="m238.142 320.36 82.858 82.858 132.859-395.718z" fill="#e4fbef"/></g><g><path d="m378.287 232.589c-15.684 11.906-33.217 22.71-52.337 31.941-21.654 10.455-43.622 18.059-65.131 22.941l-22.676 32.888 82.857 82.859z" fill="#d3effb"/></g><g><path d="m140.999 223.216-82.858-82.858 395.718-132.858z" fill="#e4fbef"/></g><g><path d="m146.713 314.645-5.714-91.429 312.86-215.716z" fill="#d3effb"/></g><g><path d="m146.713 314.645 307.146-307.145-215.717 312.86z" fill="#b1e4f9"/></g><g><path d="m459.164 2.196c-2.015-2.014-4.991-2.71-7.691-1.807l-273.051 91.68c-3.926 1.319-6.041 5.571-4.723 9.498 1.318 3.926 5.567 6.04 9.498 4.723l222.541-74.721-263.854 181.927-69.881-69.879 78.015-26.198c3.927-1.318 6.041-5.57 4.722-9.497-1.318-3.927-5.567-6.044-9.497-4.722l-89.49 30.051c-2.461.826-4.32 2.867-4.914 5.395-.593 2.527.162 5.183 1.998 7.019l80.855 80.854 5.326 85.218-1.849 1.85c-2.929 2.93-2.929 7.678.001 10.606 1.465 1.464 3.384 2.196 5.303 2.196 1.92 0 3.84-.732 5.304-2.197l1.849-1.849 85.217 5.326 80.856 80.855c1.423 1.423 3.338 2.196 5.304 2.196.571 0 1.146-.065 1.715-.199 2.528-.594 4.568-2.452 5.396-4.914l61.42-182.929c1.318-3.927-.797-8.18-4.723-9.498-3.926-1.317-8.18.795-9.498 4.724l-57.566 171.453-69.88-69.88 181.928-263.864-43.346 129.11c-1.318 3.927.797 8.179 4.724 9.497.792.266 1.596.392 2.388.392 3.134 0 6.057-1.98 7.109-5.115l60.3-179.611c.906-2.698.207-5.676-1.806-7.69zm-224.788 310.414-70.607-4.413 237.196-237.196zm155.98-252.215-237.195 237.194-4.412-70.606z"/><path d="m121.392 399.014h-12.783c-4.143 0-7.5 3.357-7.5 7.5s3.357 7.5 7.5 7.5h12.783c4.143 0 7.5-3.357 7.5-7.5s-3.357-7.5-7.5-7.5z"/><path d="m186.239 425.349c-3.962-1.188-8.148 1.055-9.342 5.023-.593 1.971-1.686 3.763-3.25 5.326l-1.964 1.964c-2.929 2.93-2.929 7.678 0 10.607 1.465 1.464 3.385 2.196 5.304 2.196s3.839-.732 5.304-2.196l1.964-1.964c3.336-3.336 5.693-7.244 7.008-11.615 1.192-3.965-1.057-8.147-5.024-9.341z"/><path d="m89.473 370.082c-3.619-2.01-8.188-.704-10.197 2.918-2.226 4.009-3.401 8.562-3.401 13.166 0 1.289.092 2.594.272 3.876.529 3.746 3.74 6.452 7.417 6.452.35 0 .703-.024 1.059-.074 4.102-.58 6.957-4.374 6.378-8.476-.084-.59-.126-1.188-.126-1.778 0-2.093.51-4.073 1.517-5.887 2.009-3.621.703-8.188-2.919-10.197z"/><path d="m109.328 359.531c1.919 0 3.839-.732 5.304-2.196l9.039-9.039c2.929-2.93 2.929-7.678 0-10.607-2.93-2.928-7.678-2.928-10.607 0l-9.039 9.039c-2.929 2.93-2.929 7.678 0 10.607 1.464 1.463 3.384 2.196 5.303 2.196z"/><path d="m175.637 408.077c.698-4.083-2.046-7.959-6.129-8.656-1.576-.27-3.206-.406-4.843-.406h-9.186c-4.143 0-7.5 3.357-7.5 7.5s3.357 7.5 7.5 7.5h9.186c.793 0 1.571.064 2.315.191.428.073.853.108 1.272.108 3.588 0 6.76-2.582 7.385-6.237z"/><path d="m147.581 461.766-9.039 9.039c-2.929 2.93-2.929 7.678 0 10.607 1.465 1.464 3.385 2.196 5.304 2.196s3.839-.732 5.304-2.196l9.039-9.039c2.929-2.93 2.929-7.678 0-10.607-2.93-2.928-7.678-2.928-10.608 0z"/><path d="m114.393 494.954-4.242 4.242c-2.929 2.93-2.929 7.678 0 10.607 1.465 1.464 3.385 2.196 5.304 2.196s3.839-.732 5.304-2.196l4.242-4.242c2.929-2.93 2.929-7.678 0-10.607-2.93-2.928-7.678-2.928-10.608 0z"/>
                        </g>
                    </svg>
                    <span class="font-semibold text-xl tracking-tight">Victory Laguna Giving Acknowledgement</span>
                </div>
            </nav>
        </header>
        <main id="app" class="container min-h-screen mx-auto py-12">
            {{-- Logout --}}
            <div class="flex justify-end">
                <a class="inline-block align-baseline text-sm text-blue-500 hover:text-blue-800 inline-flex items-center" 
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                >
                    <!--div>Icons made by <a href="https://www.flaticon.com/authors/pixel-perfect" title="Pixel perfect">Pixel perfect</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div-->
                    <svg class="fill-current w-4 h-4 mr-2" height="512pt" viewBox="0 0 512.00533 512" width="512pt" xmlns="http://www.w3.org/2000/svg">
                        <path d="m320 277.335938c-11.796875 0-21.332031 9.558593-21.332031 21.332031v85.335937c0 11.753906-9.558594 21.332032-21.335938 21.332032h-64v-320c0-18.21875-11.605469-34.496094-29.054687-40.554688l-6.316406-2.113281h99.371093c11.777344 0 21.335938 9.578125 21.335938 21.335937v64c0 11.773438 9.535156 21.332032 21.332031 21.332032s21.332031-9.558594 21.332031-21.332032v-64c0-35.285156-28.714843-63.99999975-64-63.99999975h-229.332031c-.8125 0-1.492188.36328175-2.28125.46874975-1.027344-.085937-2.007812-.46874975-3.050781-.46874975-23.53125 0-42.667969 19.13281275-42.667969 42.66406275v384c0 18.21875 11.605469 34.496093 29.054688 40.554687l128.386718 42.796875c4.351563 1.34375 8.679688 1.984375 13.226563 1.984375 23.53125 0 42.664062-19.136718 42.664062-42.667968v-21.332032h64c35.285157 0 64-28.714844 64-64v-85.335937c0-11.773438-9.535156-21.332031-21.332031-21.332031zm0 0"/><path d="m505.75 198.253906-85.335938-85.332031c-6.097656-6.101563-15.273437-7.9375-23.25-4.632813-7.957031 3.308594-13.164062 11.09375-13.164062 19.714844v64h-85.332031c-11.777344 0-21.335938 9.554688-21.335938 21.332032 0 11.777343 9.558594 21.332031 21.335938 21.332031h85.332031v64c0 8.621093 5.207031 16.40625 13.164062 19.714843 7.976563 3.304688 17.152344 1.46875 23.25-4.628906l85.335938-85.335937c8.339844-8.339844 8.339844-21.824219 0-30.164063zm0 0"/>
                    </svg>
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        @verbatim
            <!-- Google Sheet ID input -->
            <div class="w-full max-w-lg mb-10">
                <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-md font-bold mb-2" for="sheet-id">
                            Google Sheet ID
                        </label>
                        <input v-model="googleSheetId"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                            id="sheet-id" 
                            type="text" 
                            placeholder="Sheet ID"
                        >
                    </div>
                    <div class="w-full inline-block inline-flex justify-between">
                        <div class="inline-block">
                            <!-- Get Data button -->
                            <button @click.prevent="getData"
                                class="bg-blue-500 text-white font-bold mr-4 py-2 px-4 rounded"
                                :class="googleSheetId.trim().length == 0  || (isGettingData || isSendingEmails)
                                    ? 'opacity-50 cursor-not-allowed' 
                                    : 'hover:bg-blue-700'"
                            >
                                {{ isGettingData ? 'Getting...' : 'Get Data' }}
                            </button>
    
                            <!-- Send Emails button -->
                            <button @click.prevent="sendEmail"
                                class="bg-transparent text-blue-700 font-semibold py-2 px-4 border border-blue-500 rounded"
                                :class="givingData.length == 0 || (isGettingData || isSendingEmails)
                                    ? 'opacity-50 cursor-not-allowed' 
                                    : 'hover:bg-blue-500 hover:text-white hover:border-transparent'"
                            >
                                {{ isSendingEmails ? 'Sending...' : 'Send Emails' }}
                            </button>
                        </div>
                        <!-- CSS Preloader -->
                        <div v-show="isGettingData || isSendingEmails" 
                            class="sk-cube-grid mt-2 mr-2"
                        >
                            <div class="sk-cube sk-cube1"></div>
                            <div class="sk-cube sk-cube2"></div>
                            <div class="sk-cube sk-cube3"></div>
                            <div class="sk-cube sk-cube4"></div>
                            <div class="sk-cube sk-cube5"></div>
                            <div class="sk-cube sk-cube6"></div>
                            <div class="sk-cube sk-cube7"></div>
                            <div class="sk-cube sk-cube8"></div>
                            <div class="sk-cube sk-cube9"></div>
                        </div>
                    </div>
                </form>
            </div>

            <div v-show="isGettingData || isSendingEmails"
                class="w-full flex justify-center py-8"
            >
                <!-- CSS Preloader -->
                <div class="sk-cube-grid mt-2 mr-2" style="width:50px; height:50px;">
                    <div class="sk-cube sk-cube1"></div>
                    <div class="sk-cube sk-cube2"></div>
                    <div class="sk-cube sk-cube3"></div>
                    <div class="sk-cube sk-cube4"></div>
                    <div class="sk-cube sk-cube5"></div>
                    <div class="sk-cube sk-cube6"></div>
                    <div class="sk-cube sk-cube7"></div>
                    <div class="sk-cube sk-cube8"></div>
                    <div class="sk-cube sk-cube9"></div>
                </div>
            </div>

            <div v-show="isError"
                class=" max-w-4xl mx-auto bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md" 
                role="alert"
            >
                <!-- Error message -->
                <div class="flex">
                    <div class="py-1">
                        <svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold">An error occured</p>
                        <p class="text-sm">Make sure inputs are correct. If error still persists, please contact administrator for support.</p>
                    </div>
                </div>
            </div>

            <table v-show="givingData.length > 0" 
                class="w-full max-w-4xl mx-auto table-auto shadow rounded"
            >
                <thead>
                <tr>
                    <th class="px-4 py-2">Person Details</th>
                    <th class="px-4 py-2">Giving Details</th>
                    <th class="px-4 py-2 text-right">Total</th>
                </tr>
                </thead>
                <tbody>
                    <template v-if="givingData.length > 0">
                        <tr v-for="(data, index) in givingData"
                            class="hover:bg-gray-100"
                        >
                            <!-- Person details -->
                            <td class="border-t-2 px-4 py-2">
                                <span class="inline-block align-baseline inline-flex items-center font-bold">
                                    <span @click.prevent="viewHtmlTemplate(index)"
                                        class="hover:text-purple-700 cursor-pointer"
                                    >
                                        {{ data.fullName }}
                                    </span>
                                    <span v-if="data.dateAcknowledged"
                                        class="tooltip"
                                    >
                                        <svg 
                                            class="fill-current w-4 h-4 ml-2 text-purple-700 tooltip" xmlns="http://www.w3.org/2000/svg" 
                                            viewBox="0 0 20 20"
                                        >
                                            <path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM6.7 9.29L9 11.6l4.3-4.3 1.4 1.42L9 14.4l-3.7-3.7 1.4-1.42z"/>
                                        </svg>
                                        <span class='tooltip-text bg-purple-200 p-3 -mt-6 ml-8 rounded text-sm'>Acknowledged on {{ data.dateAcknowledged }}</span>
                                    </span>
                                </span> <br> 
                                <span class="text-sm">
                                    {{ data.firstName }}
                                </span> <br>
                                <span class="inline-block align-baseline inline-flex items-center text-gray-600 text-sm">
                                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M18 2a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4c0-1.1.9-2 2-2h16zm-4.37 9.1L20 16v-2l-5.12-3.9L20 6V4l-10 8L0 4v2l5.12 4.1L0 14v2l6.37-4.9L10 14l3.63-2.9z"/>
                                    </svg>
                                    {{ data.emailTo }}
                                </span> <br>
                                <span class="inline-block align-baseline inline-flex items-center text-gray-600 text-sm">
                                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M2 2c0-1.1.9-2 2-2h12a2 2 0 0 1 2 2v18l-8-4-8 4V2zm2 0v15l6-3 6 3V2H4z"/>
                                    </svg>
                                    {{ data.givingMethod }}
                                </span> <br>
                                <span class="inline-block align-baseline inline-flex items-center text-gray-600 text-sm">
                                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M1 4c0-1.1.9-2 2-2h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4zm2 2v12h14V6H3zm2-6h2v2H5V0zm8 0h2v2h-2V0zM5 9h2v2H5V9zm0 4h2v2H5v-2zm4-4h2v2H9V9zm0 4h2v2H9v-2zm4-4h2v2h-2V9zm0 4h2v2h-2v-2z"/>
                                    </svg>
                                    {{ data.timestamp }}
                                </span>
                            </td>
                            <!-- Giving details -->
                            <td class="border-t-2 px-4 py-2">
                                <div class="flex flex-col">
                                    <div v-for="detail in data.givingDetails"
                                        class="inline-flex justify-between"
                                    >
                                        <p>
                                            <span class="text-sm text-gray-600">{{ detail[0] }}</span>
                                        </p>
                                        <span class="text-sm">
                                            PHP {{ detail[1] }}
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <!-- Total Amount -->
                            <td class="border-t-2 px-4 py-2 text-right font-semibold">
                                PHP {{ data.total }}
                            </td>
                        </tr>
                    </template>
                    <tr v-else>
                        <td class="border-t-2 px-4 py-2 text-center">None yet</td>
                        <td class="border-t-2 px-4 py-2 text-center">None yet</td>
                        <td class="border-t-2 px-4 py-2 text-right">None yet</td>
                    </tr>
                </tbody>
            </table>
        @endverbatim

            <div id="form-container"></div>
        </main>
        <!-- Scripts -->
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script>

            window.laravelCsrfToken = @json(csrf_token());

            const app = new Vue({
                el: '#app',

                data: {
                    googleSheetId: '',
                    givingData: [],
                    isGettingData: false,
                    isSendingEmails: false,
                    isError: false,
                },

                methods: {
                    sendEmail() {
                        const vm = this;

                        if (vm.givingData.length == 0) return;

                        vm.givingData = [];
                        vm.isSendingEmails = true;
                        vm.isError = false;

                        axios.post('api/v1/send-emails', {
                            googleSheetId: vm.googleSheetId
                        })
                        .then(function (response) {
                            // handle success
                            vm.givingData = response.data;
                            vm.isSendingEmails = false;
                        })
                        .catch(function (error) {
                            // handle error
                            console.log(error);
                            vm.isError = true;
                            vm.isSendingEmails = false;
                        });

                    },

                    getData() {
                        const vm = this;

                        if (vm.googleSheetId.trim().length == 0) return;

                        vm.givingData = [];
                        vm.isGettingData = true;
                        vm.isError = false;

                        axios.post('api/v1/get-data', {
                            googleSheetId: vm.googleSheetId
                        })
                        .then(function (response) {
                            // handle success
                            vm.givingData = response.data;
                            vm.isGettingData = false;
                        })
                        .catch(function (error) {
                            // handle error
                            console.log(error);
                            vm.isError = true;
                            vm.isGettingData = false;
                        });
                    },

                    viewHtmlTemplate(index) {
                        let data = this.givingData[index];
                        let csrfToken = window.laravelCsrfToken;
                        let givingDetails = JSON.stringify(data.givingDetails).replace('"', '&quot;');; 

                        let form = document.createElement('form');
                        form.action = '/html-template';
                        form.method = 'POST';
                        form.target = '_blank';

                        form.innerHTML = `
                            <input type="hidden" name="_token" value="${csrfToken}">
                            <input type="hidden" name="emailTo" value="${data.emailTo}">
                            <input type="hidden" name="fullName" value="${data.fullName}">
                            <input type="hidden" name="firstName" value="${data.firstName}">
                            <input type="hidden" name="total" value="${data.total}">
                            <input type="hidden" name="timestamp" value="${data.timestamp}">
                            <input type="hidden" name="givingMethod" value="${data.givingMethod}">
                            <input type="hidden" name="givingDetails" value='${givingDetails}'>
                        `;

                        // the form must be in the document to submit it
                        document.querySelector('#form-container').append(form);

                        form.submit();
                    }
                }
            });
        </script>
    </body>
</html>
