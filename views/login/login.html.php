<?php
if (!isset($errors)) {
  $errors = [];
}
?>

<div class="w-2/5 h-5/6 mx-auto ">
    <div class="w-full h-5/6 flex-col align-center justify-center rounded shadow">
       
        <h5 class="text-xl text-center mb-2 font-bold">Connexion</h5>
        <?php if (isset($errors['connect'])) { ?>
            <div class=" w-96 mx-auto p-4 mb-4 text-sm text-red-800 rounded-lg bg-gray-50 " role="alert">
                <span class="font-medium"></span>
                <?php echo $errors['connect'] ?? ''; ?>
            </div>
        <?php } ?>
        <form action="<?= WEBROOT?>" method="post" class="w-full align-center justify-center">
            <div class="mb-5 w-96 mx-auto flex-col">
                <label for="email" class="  block mb-2 text-sm font-medium text-gray-900 dark:text-white <?= isset($errors['email'])?'is-invalid':'' ?>">
                    Login
                </label>
                <input type="text" id="email" name="login"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
                <div class="email-error" class=" w-96 invalid-feedback text-danger" role="alert"> <?= $errors['email']??"" ?> </div>
                </div>
                <div class="mb-5 w-96 mx-auto flex-col">
                    <label for="password"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white <?= isset($errors['mdp'])?'is-invalid':'' ?>">
                        Password
                    </label>
                    <input type="password" id="password"  name="mdp" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <div class="password-error" class="invalid-feedback" role="alert"> <?= $errors['mdp']??"" ?> </div>
                    <input type="hidden" name="controller" value="login">
                    <div class="w-full flex align-center justify-center mt-5">
                            <button type="submit" name="action" value="login"
                                class=" w-64 mb-5 text-white bg-gray-900  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Se Connecter
                            </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

