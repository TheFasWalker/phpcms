<?php
include __DIR__ . '/../components/header.php';

?>
<main class="p-4 md:ml-64 h-auto pt-20" style="height:100vh">
<form class="max-w-sm mx-auto flex flex-col gap-2" method="post" action=''>
        <h1 class=" pb-5 text-xl text-center"><?= $titleH1 ?></h1>

        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                <span>Login</span>
                <input required name="login" type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
            </label>
        </div>
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                <span>Password</span>
                <input required name="password" type="password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
            </label>
        </div>


        <button type="submit" name="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
</main>

<?php include __DIR__ . '/../components/footer.php'; ?>