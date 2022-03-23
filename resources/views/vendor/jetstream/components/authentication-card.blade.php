<div class="min-h-screen flex flex-col sm:justify-center  pt-6 sm:pt-0 bg-transparent ">

    <div class=" mr-72">
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-gray shadow-md overflow-hidden sm:rounded-lg ml-auto mr-28">
        {{ $slot }}
    </div>
    <body>
    </body>
</div>
<style>
body {
  background-image: url("/images/bg2.jpg");
  background-size: 850px;
  background-repeat: no-repeat;
  background-color: rgba(243, 244, 246);
}
</style>
