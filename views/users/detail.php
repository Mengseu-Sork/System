<div class="mx-auto flex-1 h-full overflow-x-hidden overflow-y-auto">
    <div class="grid grid-cols-1 md:grid-cols-1 gap-2">
        <div x-data="{ bgColor: 'white' }" class="rounded-lg p-4">
            <div class="shadow-lg rounded-lg mb-12 p-6 bg-white transition duration-300"
                 :style="{ backgroundColor: bgColor }">
                    <h3 class="text-2xl text-green-500 font-bold mb-2">User Details</h3>
                    <div class="flex gap-6">
                        
                        <!-- Profile Image -->
                        <div class="flex flex-col items-center mt-2">
                            <div class="relative">
                                <img src="../Assets/images/uploads/<?= htmlspecialchars($user['image']) ?>" 
                                     alt="<?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) ?>" 
                                     class="w-64 h-80 border border-gray-300 shadow-md">
                            </div>
                        </div>

                        <!-- User Info -->
                        <div class="flex-1">
                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-xl mb-2">First Name</label>
                                    <div class="w-80 border border-gray-300 p-2 rounded-md bg-gray-100">
                                        <?= htmlspecialchars($user['first_name']) ?>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-xl mb-2">Last Name</label>
                                    <div class="w-80 border border-gray-300 p-2 rounded-md bg-gray-100">
                                        <?= htmlspecialchars($user['last_name']) ?>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <label class="block text-xl mb-2">Email</label>
                                <div class="flex items-center border border-gray-300 rounded-md bg-gray-100">
                                    <span class="w-full p-2"><?= htmlspecialchars($user['email']) ?></span>
                                    <span class="px-2 text-green-600">✔</span>
                                </div>
                            </div>

                            <div class="mt-4">
                                <label class="block text-xl mb-2">Phone</label>
                                <div class="flex items-center border border-gray-300 rounded-md bg-gray-100">
                                    <span class="w-full p-2"><?= htmlspecialchars($user['phone_number']) ?></span>
                                    <span class="px-2 text-green-600">✔</span>
                                </div>
                            </div>

                            <div class="mt-4">
                                <label class="block text-xl mb-2">Role</label>
                                <div class="flex items-center border border-gray-300 rounded-md bg-gray-100">
                                    <span class="w-full p-2"><?= htmlspecialchars($user['role']) ?></span>
                                    <span class="px-2 text-green-600">✔</span>
                                </div>
                            </div>

                            <div class="flex justify-end">
                                <a href="/users" class="inline-block bg-yellow-500 text-white mt-4 px-4 py-2 rounded-lg hover:opacity-90">
                                    Cancel
                                </a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>