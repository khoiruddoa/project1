@extends('layouts.main')

@section('container')
<div class="container mx-auto p-5 sm:p-10 lg:p-20 bg-[#3d68ff] min-h-screen">
    <div class="flex flex-col lg:flex-col justify-end items-center ">
      <div class="font-mono md:text-6xl text-5xl font-extrabold text-white text-center lg:mt-20 mt-16 mb-6 ">
        Login
      </div>
     <div class="md:w-1/2">

        <form action="/login" method="POST">
            @csrf
            <div class="mb-6 ">
                <label for="email" class="block mb-2 text-lg font-medium text-white">Email</label>
                <input type="email" id="email" name="email"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
            </div>
            <div class="mb-6">
                <label for="password" class="block mb-2 text-lg font-medium text-white">
                    password</label>
                <input type="password" id="password" name="password"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    required>
            </div>
            
            
            <button type="submit"
                class="bg-[white] hover:bg-blue-700 text-[#3d68ff] hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>
        </form>
     </div>
    </div>
</div>
@endsection
