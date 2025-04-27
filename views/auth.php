<?php
include __DIR__ . '/../components/header.php';

?>
<main class="p-4 md:ml-64 h-auto pt-20" style="height:100vh">
    <?php if (!isset($_SESSION['name'])): ?>
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
    <?php else: ?>
        <div class="flex flex-col gap-2 items-center">
            <h1 class=" pb-5 text-xl text-center">Welcon to Hell!</h1>
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 m-y-auto">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">UserLogin : <?= $userDataFromDB->getLogin(); ?> </h5>

                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">UserName : <?= $userDataFromDB->getName(); ?></p>
                <a href="/?controller=auth&logout" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    LogOut
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            </div>
        </div>

    <?php endif; ?>
</main>

<?php include __DIR__ . '/../components/footer.php'; ?>