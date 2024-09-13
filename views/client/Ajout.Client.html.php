<div class="p-4 sm:ml-48 mt-5">
    <div class="p-2 rounded-lg border-gray-200 ">
        <div class="flex justify-center w-full">
            <div class="w-3/4 h-auto border border-gray-300 rounded-lg shadow-lg p-6 bg-white">
                <form action="<?= WEBROOT; ?>" method="post" class="space-y-4">
                    
                    <div class="flex justify-between space-x-6">
                        <div class="w-1/2">
                            <label for="prenom" class="block text-sm font-medium text-gray-700">Prénom</label>
                            <input type="text" name="prenom" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm p-2.5 focus:ring-blue-500 focus:border-blue-500" />
                        </div>
                        <div class="w-1/2">
                            <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
                            <input type="text" name="nom" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm p-2.5 focus:ring-blue-500 focus:border-blue-500" />
                        </div>
                    </div>
                   
                    <div class="flex justify-between space-x-6">
                        <div class="w-1/2">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm p-2.5 focus:ring-blue-500 focus:border-blue-500" />
                        </div>
                        <div class="w-1/2">
                            <label for="telephone" class="block text-sm font-medium text-gray-700">Téléphone</label>
                            <input type="tel" name="telephone" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm p-2.5 focus:ring-blue-500 focus:border-blue-500" />
                        </div>
                    </div>
                    
                    <div class="flex justify-between space-x-6">
                        <div class="w-1/2">
                            <label for="adresse" class="block text-sm font-medium text-gray-700">Adresse</label>
                            <input type="text" name="adresse" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm p-2.5 focus:ring-blue-500 focus:border-blue-500" />
                        </div>
                        <div class="w-1/2">
                            <label for="image" class="block text-sm font-medium text-gray-700">Photo</label>
                            <input type="file" name="image" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm p-2.5 focus:ring-blue-500 focus:border-blue-500" />
                        </div>
                    </div>
                    
                    <div class="flex justify-center mt-6">
                        <input type="hidden" name="controller" value="client">
                        <button type="submit" name="action" value="SaveClient"
                            class="bg-gray-700 w-full sm:w-1/2 py-3 text-white text-sm font-medium rounded-lg shadow-md hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Ajouter
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="../path/to/flowbite/dist/flowbite.min.js"></script>
