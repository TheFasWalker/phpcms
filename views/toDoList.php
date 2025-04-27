<?php
include __DIR__ . '/../components/header.php';

?>
<main class="p-4 md:ml-64 h-auto pt-20" style="height:100vh">
    <?php var_dump( $tasksList);?>
    <?php if (isset($_SESSION['login'])): ?>
        <form class="w-full mb-5" method="post" action=''>
            <?php if ($error !== null): ?>
                <div class="flex justify-between">
                    <h1 class=" pb-5 text-xl text-red-500"><?= $titleH1 ?></h1>
                    <span class=" font-bold text-red-500 text-xl"><?= $error ?></span>
                </div>
            <?php else: ?>
                <h1 class=" pb-5 text-xl"><?= $titleH1 ?></h1>
            <?php endif; ?>

            <div class="grid grid-cols-3 w-full gap-3">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        <span>Description</span>
                        <input required name="desc" type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </label>
                </div>
                <label class="inline-flex items-center cursor-pointer">
                    <input type="checkbox" value="true" name="isDone" class="sr-only peer">
                    <div
                        class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 dark:peer-checked:bg-blue-600">
                    </div>
                    <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Toggle me</span>
                </label>
            </div>

            <button type="submit" name="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    <?php else: ?>
        <div class=" flex flex-col mx-auto w-fit  items-center  ">
        <h1 class=" text-xl text-red-500">Упс !!!</h1>
        <h1 class=" pb-5 text-xl "> Вы не авторизованы- можете только смотреть все задачи</h1>
        </div>
       
    <?php endif; ?>
    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-4 py-4">id</th>
                        <th scope="col" class="px-4 py-3">Статус</th>
                        <th scope="col" class="px-4 py-3">Описание</th>
                        <th scope="col" class="px-4 py-3"></th>
                        <th scope="col" class="px-4 py-3"></th>

                    </tr>
                </thead>
                <tbody>
                     <?php
                    foreach ($tasksList as $task): ?>
                                <tr class="border-b dark:border-gray-700">
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $task['id']?></th>
                                    <td class="px-4 py-3">
                                        <?php if ($task['isDone'] == 'true')  :?>
                                            <span class=" text-white bg-green-700 hover:bg-green-800 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600">Сделано</span>
                                            <?php else : ?>
                                        <span class=" text-white bg-red-700 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 "> Не сделано</span>
                                                <?php endif; ?>
                                    </td>
                                    <td class="px-4 py-3"><?= $task['desc']?></td>
                                    <td class="px-4 py-3 max-w-[12rem] truncate"></td>
                                    <td class="px-4 py-3">
                                        <a class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" 
                                        href="/?controller=userlist&delete="
                                        >delete
                                        </a>
                                    </td>
                                </tr>
                        <?php endforeach; ?> 
                </tbody>
            </table>
        </div>
        <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4"
            aria-label="Table navigation">

        </nav>
    </div>
</main>

<?php include __DIR__ . '/../components/footer.php'; ?>