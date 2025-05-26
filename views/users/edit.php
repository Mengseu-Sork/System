<div class="mx-auto flex-1 h-full overflow-x-hidden overflow-y-auto">
    <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
        <div x-data="{ bgColor: 'white' }" class="rounded-lg p-6">
            <div class="shadow-lg rounded-lg p-6 mb-12 bg-white transition duration-300">
                <h2 class="text-3xl font-bold text-green-500 mb-6">Edit User</h2>
                <form action="/users/update" method="POST" enctype="multipart/form-data" class="space-y-4">
                    <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xl text-gray-600 mb-1">First Name</label>
                            <input type="text" name="first_name" value="<?= $user['first_name'] ?>" class="w-full border border-green-300 p-2 rounded-md">
                        </div>

                        <div>
                            <label class="block text-xl text-gray-600 mb-1">Last Name</label>
                            <input type="text" name="last_name" value="<?= $user['last_name'] ?>" class="w-full border border-green-300 p-2 rounded-md">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xl text-gray-600 mb-1">Email</label>
                            <input type="email" name="email" value="<?= $user['email'] ?>" class="w-full border border-green-300 p-2 rounded-md">
                        </div>

                        <div>
                            <label class="block text-xl text-gray-600 mb-1">Password</label>
                            <input type="password" name="password" value="<?= $user['password'] ?>" placeholder="Leave blank to keep current password" class="w-full border border-green-300 p-2 rounded-md">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xl text-gray-600 mb-1">Phone Number</label>
                            <input type="text" name="phone_number" value="<?= $user['phone_number'] ?>" class="w-full border border-green-300 p-2 rounded-md">
                        </div>

                        <div>
                            <label class="block text-xl text-gray-600 mb-1">Role</label>
                            <input type="text" name="role" value="<?= $user['role'] ?>" class="w-full border border-green-300 p-2 rounded-md">
                        </div>
                    </div>

                    <div class="flex flex-col mb-6">
                        <label class="block text-gray-700 text-xl text-gray-600 mb-2">User Image</label>
                        <div class="border border-green-300 rounded-lg p-4 w-full bg-white">
                            <input type="file" name="image" id="imageInput" accept="image/*" onchange="previewImage(this)">
                            <div 
                                class="border-dashed border-2 border-green-300 rounded-lg p-4 text-center hover:border-green-500 transition bg-white">
                                <div class="flex flex-col items-center">
                                    <img id="image-preview" src="<?php echo !empty($user['image']) ? '/Assets/images/uploads/' . $user['image'] : '#'; ?>" alt="Image Preview"
                                    class="w-24 h-24 object-cover rounded ">
                                    <h4 class="font-semibold text-xl mt-2 text-gray-600">Drag and drop a file or choose one above</h4>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="flex gap-6">
                        <button type="submit" name="update" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                            Update
                        </button>
                        <a href="/users" class="bg-red-400 hover:bg-red-500 text-white px-6 py-2 rounded text-lg text-xl">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>