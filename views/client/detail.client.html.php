<div class="p-4 sm:ml-48">
            <div class="p-2  rounded-lg dark:border-gray-700 mt-10 h-full">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                        <li class="inline-flex items-center">
                            <a href="<?= WEBROOT?>/?controller=client&action=client"
                                class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                Liste Clients
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <span class="material-symbols-outlined">
                                    chevron_right
                                </span>
                                <a href="#"
                                    class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">
                                    Ajout Client
                                </a>
                            </div>
                        </li>
                    </ol>
                </nav>

            </div>
            <div class="flex align-center justify-around  w-full mb-2  ">
                <div class="w-24 h-24 rounded-full border">
                    <img class="mt-2" src="../public/assets/user.png" alt="user">
                </div>
                <div class="w-96 h-28 border border-gray-200 rounded-lg shadow flex-col align-center justify-around ">
                    <div class="w-64 flex-col mx-3">
                        <h1 class="font-bold text-xl  mb-2">Identification</h1>
                        <h5 class="mb-2">Nom: Ba </h5>
                        <h5>Tel: 778087261 </h5>
                    </div>
                </div>
                <div class="p-4">
    <h1 class="text-xl font-bold">Détails du Client</h1>
    <p>Nom : <?= $client['nom'] ?></p>
    <p>Prénom : <?= $client['prenom'] ?></p>
    <p>Téléphone : <?= $client['telephone'] ?></p>
    <p>Email : <?= $client['email'] ?></p>
    <p>Adresse : <?= $client['adresse'] ?></p>
</div>

            </div>
            <div class="flex">
                <span class="text-red-800 material-symbols-outlined">
                    folder_open
                </span>
                <h5 class="font-bold text-red-800 ">Fiche de Renseignement</h5> 
            </div>
            <div class=" w-full h-72 mt-2 flex align-center justify-between ">
                <div class=" w-60 border bg-gray-300 flex-col">
                    <div class="flex mt-2">
                        <span class="text-red-800 mx-2  material-symbols-outlined">
                            change_circle
                        </span>
                        <a class="font-bold" href="">Changer de Catégorie</a>
                    </div>
                    <div class="flex mt-2">
                        <span class="text-red-800 mx-2  material-symbols-outlined">
                            change_circle
                        </span>
                        <a class="font-bold" href="">Faire Dépot</a>
                    </div>
                </div>
                <div class="w-4/5 mx-2">
                        <h5 class="font-medium text-lg text-center">Listes Dettes Non soldées</h5>
                    <div class="mt-2">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-white uppercase bg-indigo-400 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Date
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Montant
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            M.Verse
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            M.Due
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        class=" odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-1.5 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            12/06/2024
                                        </th>
                                        <td class="px-6 py-1.5 ">
                                            20000
                                        </td>
                                        <td class="px-6 py-1.5">
                                            15000
                                        </td>
                                        <td class="px-6 py-1.5">
                                            5000
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="w-full mt-2 flex align-center justify-center">
                            <nav aria-label="Page navigation example">
                                <ul class="inline-flex -space-x-px text-base h-10 ">
                                    <li>
                                        <a href="#"
                                            class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                                    </li>
                                    <li>
                                        <a href="#" aria-current="page"
                                            class="flex items-center justify-center px-4 h-10 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
          
        </div>

    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>

