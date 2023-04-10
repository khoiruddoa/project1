@extends('layouts.main')

@section('container')
    <div class="container mx-auto p-5 sm:p-10 lg:p-20 bg-[#3d68ff] min-h-screen">
        <div class="flex flex-col lg:flex-col justify-end items-center ">
            <div class="font-mono md:text-5xl text-xl font-extrabold text-white text-center lg:mt-6 mt-16 mb-6 ">
                Bank Sampah Faida Cendikia
            </div>
            <div class="flex flex-col gap-10 items-center">




                <div
                    class="lg:w-[500px] w-[300px] p-6 bg-white border border-gray-200 rounded-lg shadow flex md:flex-col justify-center flex-row-reverse gap-10">
                    <div>
                       
                        <a href="/" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 font-mono">Home</a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 font-mono m-4 ">Profil Anda : </p>


                    </div>
                    <div class="flex flex-col items-center">
                        <img class="w-16 h-16 rounded-full item-center mb-2" src="{{asset('public/' . auth()->user()->photo )}}" alt="user photo">
                         <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 font-mono ">
                            {{ auth()->user()->name }}</p>
                         <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 font-mono ">
                            {{ auth()->user()->email }}</p>
                         <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 font-mono ">
                            {{ auth()->user()->phone_number }}</p>
                         <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 font-mono ">
                            {{ auth()->user()->address }}</p>
                    </div>

                    <div>

                        <button data-modal-target="authentication-modal4" data-modal-toggle="authentication-modal4"
                        class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group p-2 bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800 font-mono"
                        type="button">
                        Ganti Photo
                    </button>
    
                    <!-- Main modal -->
                    <div id="authentication-modal4" tabindex="-1" aria-hidden="true"
                        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                        <div class="relative w-full h-full max-w-md md:h-auto">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button"
                                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                    data-modal-hide="authentication-modal4">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="px-6 py-6 lg:px-8">
                                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Ganti Photo</h3>
    
                                    <div class="flex items-center justify-center w-full h-full flex">
    
                                        <div x-data="photoUploader()" class="flex flex-col gap-2">
    
                                            <div>
                                                <form action="{{ route('uploadPhoto') }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="file" id="photo" name="photo"
                                                        @change="previewPhoto">
                                                    <div x-show="photoPreview" class="my-2">
                                                        <img :src="photoPreview" alt="Photo Preview" class="my-2">
                                                        <button type="submit"
                                                            class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Upload</button>
    
                                                    </div>
    
                                                </form>
                                            </div>
    
                                        </div>
    
    
                                    </div>
    
                                    <script>
                                        function photoUploader() {
                                            return {
                                                photoPreview: null,
    
                                                previewPhoto(event) {
                                                    const file = event.target.files[0];
                                                    const reader = new FileReader();
    
                                                    reader.readAsDataURL(file);
    
                                                    reader.onload = () => {
                                                        this.photoPreview = reader.result;
                                                    };
                                                }
                                            };
                                        }
                                    </script>
    
                                </div>
    
                            </div>
                        </div>
                    </div>
    
    
    
                    <!-- Modal toggle -->
                    <button data-modal-target="authentication-modal5" data-modal-toggle="authentication-modal5"
                    class="relative p-2 inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800 font-mono"
                    type="button">
                        Ganti Password
                    </button>
    
                    <!-- Main modal -->
                    <div id="authentication-modal5" tabindex="-1" aria-hidden="true"
                        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                        <div class="relative w-full h-full max-w-md md:h-auto">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button"
                                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                    data-modal-hide="authentication-modal5">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="px-6 py-6 lg:px-8">
                                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Ganti Password</h3>
                                    <form class="space-y-6" action="{{ route('changePassword') }}" method="post">
                                        @csrf
                                        <div>
                                            <label for="password"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                Password Lama</label>
                                            <input type="password" name="current_password" id="current_password"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                required>
    
                                            <label for="password"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password
                                                Baru</label>
                                            <input type="password" name="password" id="password"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                required>
                                        </div>
    
                                        <button type="submit"
                                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ganti
                                            Password</button>
    
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    
    

                    </div>
                </div>
            </div>
        </div>











    </div>
    </div>
@endsection
